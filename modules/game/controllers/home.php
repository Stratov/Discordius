<?php

defined( 'SYSPATH' ) or die( 'No direct access allowed.' );

/**
 * Controller public de la page par défaut (homepage).
 *
 * @package	 Home
 * @author Pasquelin Alban
 * @copyright	 (c) 2011
 * @license http://www.openrpg.fr/license.html
 */
class Home_Controller extends Template_Controller {

		public function __construct()
		{
				parent::__construct();
		}

		/**
		 * Page par défaut du jeu (homepage).
		 *
		 * @param bool Afficher directement ou return la vue
		 * @return  void
		 */
		public function index()
		{
			if(isset($_POST)){
				if(isset($_POST['post_pub'])){
					$Opub = new Pub_Model;
					$Apub = array('description' => htmlentities($_POST['description'],ENT_QUOTES, "UTF-8"),
								  'id_element' => $_POST['id_element']);
					$Opub->insert($Apub);
				}
				
				if(isset($_POST['post_guildec'])){
					$Oguilde = new Guilde_Model;
					if(!$Oguilde->exist(htmlentities($_POST['nom'],ENT_QUOTES, "UTF-8")))
						$Oguilde->insert(substr(htmlentities($_POST['nom'],ENT_QUOTES, "UTF-8"),0,16), $this->user->id);					
				}				

				if(isset($_POST['post_guildeq'])){
					$Oguilde = new Guilde_Model;
					$Oguilde->quit($this->user->id);					
				}	
				if(isset($_POST['post_guildej'])){
					$Oguilde = new Guilde_Model;
					$Oguilde->joinGuilde(htmlentities($_POST['nom'],ENT_QUOTES, "UTF-8"), $this->user->id);					
				}				
			}


			if (isset($_GET['isAjax']) && isset($_GET['get_user'])) {
                $users = new User_Model();
				$statistics = Statistiques_Model::instance();
				
				$connected_record = $statistics->get_statistic("connected_record");
				
                $connected_players = $users->get_connected_users_by_region();
                $nb_players_total = 0;
                foreach ($connected_players as $players)
                    $nb_players_total += count($players);

				if ($connected_record && $connected_record < $nb_players_total) {
					$statistics->update_statistic("connected_record",$nb_players_total);
					$connected_record = $nb_players_total;
				}
				
				if ($connected_record)
					echo "<h4>Record de joueurs : $connected_record</h4>";
				
                if ($nb_players_total)
    				echo "<h4><center>Connectés : $nb_players_total</center></h4>";
                foreach ($connected_players as $region => $players) {
                    $nb_players_region = count($players);
                    echo "<b><i>$region ($nb_players_region):</i></b><br>";
                    foreach ($players as $player) {
                        $pseudo = htmlspecialchars($player[0]);
                        if ($player[1]) {
                            echo " - <span style=\"color: #FF358B\">$pseudo</span><br>";
                        } else {
                            echo " - $pseudo<br>";
                        }
                    }
                    echo '<br>';
                }
				die;
			}

            if( !$this->user )
            {
                    Router_Core::$controller = 'logger';
                    return Logger_Controller::index();
            }

            $list_js[] = 'jquery.facebox';
            $list_js[] = 'jquery.easing';
            $list_js[] = 'jquery.coda';

            foreach( file::listing_dir( DOCROOT.'js' ) as $row )
                    if( is_file( DOCROOT.'js/'.$row ) && $row != 'logger.js' )
                            $list_js[] = str_replace( '.js', '', $row );

            $this->script = $list_js;
            $this->script_no_compress = array( Kohana::config( 'url.websocket_user' ).':'.Kohana::config( 'url.websocket_port' ).'/socket.io/socket.io.js' );

            $this->css = array( 'map', 'facebox' );

            $this->template->content = new View( 'home/index' );
            $this->template->content->map = Map_Controller::word( FALSE );



            }

}

?>