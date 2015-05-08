<?php

defined( 'SYSPATH' ) or die( 'No direct access allowed.' );

/**
 * Controller public des users.
 *
 * @package Action
 * @author Pasquelin Alban
 * @copyright	 (c) 2011
 * @license http://www.openrpg.fr/license.html
 */
class User_Controller extends Template_Controller {

		/**
		 * Page de détail d'un personnage
		 * 
		 * @return  void
		 */
		public function show( $type )
		{
				parent::login();

				$this->auto_render = FALSE;

				if( !request::is_ajax() )
						return FALSE;

				$attaque = $defense = 0;

				$listingItem = $listingCle = $listingStuff = $arrayStuff = FALSE;

				if( ($stuffs = Item_Model::instance()->stuff_user( $this->user->id ) ) !== FALSE )
						foreach( $stuffs as $stuff )
						{
								$arrayStuff[$stuff->item_id] = $stuff;
								if( $stuff->attaque )
										$attaque += $stuff->attaque;
								if( $stuff->defense )
										$defense += $stuff->defense;
						}

				if( ($items = Item_Model::instance()->select( $this->user->id ) ) !== FALSE )
						foreach( $items as $item )
								if( !$item->item_position && !$item->cle && !$item->protect )
										$listingItem[$item->item_id] = $item;
								elseif( $item->protect && !$item->cle )
										$listingStuff[$item->item_id] = $item;
								elseif( $item->cle )
										$listingCle[$item->item_id] = $item;

				echo html::stylesheet( 'index.php/css_'.base64_encode( implode( '--', array( 'facebox', 'user' ) ) ) );

				$v = new View( 'user/'.$type );
				$v->stats = Statistiques_Model::instance()->user_show( $this->user->id );
				$v->user = $this->user;
				$v->modif = TRUE;
				$v->items = $listingItem;
				$v->cles = $listingCle;
				$v->stuffs = $listingStuff;
				$v->arrayStuff = $arrayStuff;
				$v->attaque = number_format( $attaque );
				$v->defense = number_format( $defense );

				$v->render( TRUE );
		}

		/**
		 * Permet de connaitre les informations sur le module ou se trouve l'user.
		 *
		 * @return void
		 */
		public function move()
		{
				parent::login();

				$this->auto_render = FALSE;

				if( !request::is_ajax() ) {
                    header('X-PHP-Response-Code: 400', true, 400);
                    return;
                }

                $current_x = $this->user->x;
                $current_y = $this->user->y;
				$this->user->x = $this->input->post( 'x', $this->user->x );
				$this->user->y = $this->input->post( 'y', $this->user->y );

                $diff = ($this->user->x > $current_x ? $this->user->x - $current_x : $current_x - $this->user->x)
                    + ($this->user->y > $current_y ? $this->user->y - $current_y : $current_y - $this->user->y);
                if ($diff > 1) {
                    //Triche: le joueur essaye de se déplacer de plus d'une case à la fois.
                    header('X-PHP-Response-Code: 403', true, 403);
                    echo "You can't move more than one case at once.";
                    return;
                }

                $map_tile = Map_Model::instance()->select_detail(array(
                    'region_id' => $this->user->region_id,
                    'x_map' => $this->user->x,
                    'y_map' => $this->user->y
                ));
                if ($map_tile && !$map_tile->passage_map) {
                    // Le joueur rentre dans un obstacle.
                    header('X-PHP-Response-Code: 403', true, 403);
                    echo "The destination is not traversable.";
                    return;
                }

				$this->user->update();
				Bot_Model::instance()->update( array( 'user_id' => NULL ), array( 'user_id' => $this->user->id ) );
		}


    /**
     * Moe the player to an arbitrary selected destination.
     * This is allowed only for admins.
     */
    public function teleport()
    {
        parent::login();
        $this->auto_render = false;

        foreach ($this->user->roles as $role)
            if ($role->name == 'admin') {

                $x = $this->input->post('x', $this->user->x);

                if (substr($x, 0, 1) == '+' or substr($x, 0, 1) == '-')
                    $this->user->x += $x;
                else
                    $this->user->x = $x;

                $y = $this->input->post('y', $this->user->x);
                if (substr($y, 0, 1) == '+' or substr($y, 0, 1) == '-')
                    $this->user->y += $y;
                else
                    $this->user->y = $y;

                $this->user->update();
                Bot_Model::instance()->update(
                    array('user_id' => NULL),
                    array('user_id' => $this->user->id));

                header('Content-Type: application/json', true);
                echo '{"x":"' . $this->user->x . '","y":"'
                    . $this->user->y . '"}';
                return;
            }
        header('X-PHP-Response-Code: 403', true, 403);
        echo "No teleport for you!";
    }


		/**
		 * Page qui affiche les avatars pour modifier
		 * 
		 * @return  void
		 */
		public function listing_avatar()
		{
				parent::login();

				$this->auto_render = FALSE;

				if( !request::is_ajax() )
						return FALSE;

				$v = new View( 'user/avatar' );
				$avatars = file::listing_dir( DOCROOT.'images/character' );
                $v->avatar = array();
                foreach ($avatars as $avatar) {
                    if (substr($avatar, 0, 7) != 'custom_')
                        $v->avatar[] = $avatar;
                }
				$v->render( TRUE );
		}

		/**
		 * SAuvegarder le nouvel avatar d'un user
		 * 
		 * @return  void
		 */
		public function update_avatar( $avatar )
		{
				if( !request::is_ajax() )
						return FALSE;

				parent::login();

				$this->auto_render = FALSE;

				$this->user->avatar = $avatar;
				$this->user->update();
		}

		/**
		 * Sauvegarder le nouvel mot de passe d'un user
		 * 
		 * @return  void
		 */
		public function update_pwd()
		{
				if( !request::is_ajax() )
						return FALSE;

				parent::login();

				$this->auto_render = FALSE;

				$new_pwd = $this->input->post( 'new_pwd' );

				if( strlen( $new_pwd ) <= 4 )
						$msg = Kohana::lang( 'user.error_pwd' );
				else
				{
						$this->user->update( array( 'password' => Auth::instance()->hash_password( $new_pwd ) ) );
						$msg = Kohana::lang( 'user.valid_change_pwd' );
				}

				echo '<div class="msg">'.$msg.'</div>';
		}

		public function information()
		{
				$this->auto_render = FALSE;

				if( !request::is_ajax() || !$this->user )
						return FALSE;

				echo '{
							"hp": '.json_encode( graphisme::BarreGraphique( $this->user->hp, $this->user->hp_max, 160, Kohana::lang( 'user.hp' ) ) ).',
							"mp": '.json_encode( graphisme::BarreGraphique( $this->user->mp, $this->user->mp_max, 160, Kohana::lang( 'user.mp' ) ) ).',
							"xp": '.json_encode( graphisme::BarreGraphique( $this->user->xp, $this->user->niveau_suivant(), 992, Kohana::lang( 'user.xp' ) ) ).',
							"niveau": "'.$this->user->niveau.'",
							"argent": "'.number_format( $this->user->argent ).' '.Kohana::config( 'game.money' ).'"
						}';
		}

		public function inventaire()
		{
				$this->auto_render = FALSE;

				if( !request::is_ajax() || !$this->user )
						return FALSE;

				$arrayItem = FALSE;
				if( ($items = Item_Model::instance()->user_quick( $this->user->id ) ) !== FALSE )
						foreach( $items as $item )
								$arrayItem[$item->item_position] = $item;

				$v = new View( 'user/inventaire' );
				$v->items = $arrayItem;
				$v->user = $this->user;
				$v->render( TRUE );
		}

}

?>