<?php

defined( 'SYSPATH' ) OR die( 'No direct access allowed.' );

class Pub_Controller extends Template_Controller {

		private $pub;

		public function __construct()
		{
				parent::__construct();
				parent::access( 'pub' );

				$this->pub = Pub_Model::instance();
		}

		/**
		 * Methode : page de listing générale
		 */
		public function index()
		{
				$this->script = array( 'jquery.dataTables', 'listing' );

				$this->template->titre = Kohana::lang( 'Toutes les pub' );

				$this->template->contenu = new View( 'pub/list' );
		}

		/**
		 * Methode : page de détail d'une user
		 */
		public function show( $idpub = false )
		{
				if( !$idpub || !is_numeric( $idpub ) )
						return parent::redirect_erreur( 'pub' );

				if( !$pub = $this->pub->select_all( array( 'pub_id' => $idpub ), 1 ) )
						return parent::redirect_erreur( 'pub' );


				$this->script = array( 'jquery.validate', 'jquery.facebox', 'pub' );

				$this->css = array( 'form', 'pub', 'facebox' );

				$this->template->titre = array( Kohana::lang( 'pub.all_pub' ) => 'pub',
						Kohana::lang( 'pub.show_title', ucfirst( mb_strtolower( $pub->description ) ) ) => NULL );

				$this->template->button = TRUE;

				$this->template->navigation = parent::navigation( $idpub, 'pub_id', 'pub' );

				$this->template->contenu = new View( 'formulaire/form' );
				$this->template->contenu->action = 'pub/save';
				$this->template->contenu->id = $idpub;
				$this->template->contenu->formulaire = new View( 'pub/show' );
				$this->template->contenu->formulaire->row = $pub;
				$this->template->contenu->formulaire->pub = $this->pub->select( array( 'pub_id !=' => $idpub ) );
		}

		/**
		 * Methode : page qui va ajouter une ligne dans la BD et renvois vers la page détail
		 */
		public function insert()
		{
				$idpub = $this->pub->insert( array( 'description' => Kohana::lang( 'pub.no_title' ) ) );

				return url::redirect( 'pub/show/'.$idpub.'?msg='.urlencode( Kohana::lang( 'form.crea_valide' ) ) );
		}

		/**
		 * Méthode : page qui gère la sauvegarde ou le delete avec un renvois soit au détail ou listing
		 */
		public function save( $type = FALSE, $idpub = FALSE )
		{
				if( ($save = $this->input->post() ) !== FALSE )
				{
						if( isset( $save['id_objet'] ) && $save['id_objet'] )
								$save['id_objet'] = implode( ',', $save['id_objet'] );

						
						if( $type == 'sauve' || $type == 'valid' )
						{
								$validateConf = false;
								$save['description'] = $save['title'];
								unset($save['title']);
								$this->pub->update( $save, $idpub );

								if( $validateConf )
										return url::redirect( 'pub/show/'.$idpub.'?msg='.urlencode( Kohana::lang( 'pub.conflit' ) ) );
						}
						elseif( $type == 'trash' )
								$this->pub->delete( $idpub );
				}

				$url = 'pub/show/'.$idpub;

				if( $type == 'annul' || $type == 'valid' || $type == 'trash' )
						$url = 'pub';

				return parent::redirect( $url, $type );
		}

		/**
		 * Methode : gestion du listing en ajax
		 */
		public function resultatAjax()
		{
				$this->auto_render = FALSE;

				if( !request::is_ajax() )
						return FALSE;

				$arrayCol = array( 'pub_id', 'description', 'id_element' );

				$searchAjax = Search_Model::instance();

				$arrayResultat = $searchAjax->indexRecherche( $arrayCol, 'pub', $this->input );


				$display = false;

				foreach( $arrayResultat as $row )
				{
						$url = 'pub/show/'.$row->pub_id;

						$v[] = '<center>'.$row->pub_id.'</center>';
						$v[] = html::anchor( $url, $row->description );
						$v[] = $row->id_element;
						//$v[] = '<center>'.html::anchor( $url, html::image( 'images/template/drawings.png', array( 'title' => Kohana::lang( 'form.edit' ), 'class' => 'icon_list' ) ) ).'</center>';

						$display .= '['.parent::json( $v ).'],';

						unset( $v );
				}

				echo $searchAjax->displayRecherche( $display, $this->input->get( 'sEcho' ) );
		}

}

?>
