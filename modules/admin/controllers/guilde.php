<?php

defined( 'SYSPATH' ) OR die( 'No direct access allowed.' );

class Guilde_Controller extends Template_Controller {

		private $guilde;

		public function __construct()
		{
				parent::__construct();
				parent::access( 'guilde' );

				$this->guilde = Guilde_Model::instance();
		}

		/**
		 * Methode : page de listing générale
		 */
		public function index()
		{
				$this->script = array( 'jquery.dataTables', 'listing' );

				$this->template->titre = Kohana::lang( 'Toutes les guildes' );

				$this->template->contenu = new View( 'guilde/list' );
		}

		/**
		 * Methode : page de détail d'une user
		 */
		public function show( $idguilde = false )
		{
				if( !$idguilde || !is_numeric( $idguilde ) )
						return parent::redirect_erreur( 'guilde' );

				if( !$guilde = $this->guilde->guilde( $idguilde ) )
						return parent::redirect_erreur( 'guilde_id' );


				$this->script = array( 'jquery.validate', 'jquery.facebox', 'guilde' );

				$this->css = array( 'form', 'guilde', 'facebox' );

				$this->template->titre = array( 'Guilde' => 'Guilde',
						ucfirst( mb_strtolower( $guilde->nom )) => 'Guilde' );

				$this->template->button = TRUE;

				$this->template->navigation = parent::navigation( $idguilde, 'guilde_id', 'guilde' );

				$this->template->contenu = new View( 'formulaire/form' );
				$this->template->contenu->action = 'guilde/save';
				$this->template->contenu->id = $idguilde;
				$this->template->contenu->formulaire = new View( 'guilde/show' );
				$this->template->contenu->formulaire->row = $guilde;
				$this->template->contenu->formulaire->nbMembre = $this->guilde->nbMembre(  $idguilde  , 1);
				$this->template->contenu->formulaire->fondateur = $this->guilde->nomMembre(  $guilde->fondateur_id  );
		}

		/**
		 * Methode : page qui va ajouter une ligne dans la BD et renvois vers la page détail
		 */
		public function insert()
		{
				$idpub = $this->guilde->insert( array( 'description' => Kohana::lang( 'pub.no_title' ) ) );

				return url::redirect( 'pub/show/'.$idpub.'?msg='.urlencode( Kohana::lang( 'form.crea_valide' ) ) );
		}

		/**
		 * Méthode : page qui gère la sauvegarde ou le delete avec un renvois soit au détail ou listing
		 */
		public function save( $type = FALSE, $idguilde = FALSE )
		{
				if( ($save = $this->input->post() ) !== FALSE )
				{
						if( isset( $save['id_objet'] ) && $save['id_objet'] )
								$save['id_objet'] = implode( ',', $save['id_objet'] );

						
						if( $type == 'sauve' || $type == 'valid' )
						{
								$validateConf = false;
								$save['nom'] = $save['title'];
								unset($save['title']);
								$this->guilde->update( $save, $idguilde );

								if( $validateConf )
										return url::redirect( 'guilde/show/'.$idguilde.'?msg='.urlencode( Kohana::lang( 'guilde.conflit' ) ) );
						}
						elseif( $type == 'trash' )
								$this->guilde->delete( $idguilde );
				}

				$url = 'guilde/show/'.$idguilde;

				if( $type == 'annul' || $type == 'valid' || $type == 'trash' )
						$url = 'guilde';

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

				$arrayCol = array( 'guilde_id', 'nom', 'fondateur_id' );

				$searchAjax = Search_Model::instance();

				$arrayResultat = $searchAjax->indexRecherche( $arrayCol, 'guilde', $this->input );


				$display = false;

				foreach( $arrayResultat as $row )
				{
						$url = 'guilde/show/'.$row->guilde_id;

						$v[] = '<center>'.$row->guilde_id.'</center>';
						$v[] = html::anchor( $url, $row->nom );
						$v[] = $this->guilde->nomMembre(  $row->fondateur_id );
						//$v[] = '<center>'.html::anchor( $url, html::image( 'images/template/drawings.png', array( 'title' => Kohana::lang( 'form.edit' ), 'class' => 'icon_list' ) ) ).'</center>';

						$display .= '['.parent::json( $v ).'],';

						unset( $v );
				}

				echo $searchAjax->displayRecherche( $display, $this->input->get( 'sEcho' ) );
		}

}

?>
