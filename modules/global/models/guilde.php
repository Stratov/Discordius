<?php

defined(	'SYSPATH'	)	OR	die(	'No direct access allowed.'	);

/**
	* Créer/Rejoindre une guilde
	*
	* @package Guilde
	* @author Med5
	*/
class	Guilde_Model	extends	Model	{

		/**
			* Permet de créer une instance et donc de ne pas faire des doublons.
			* 
			* @var object protected
			*/
		protected	static	$instance;

		/**
			* Permet de ne pas faire des multi appel d'object.
			*
			* @return class return la classe construite
			*/
		public	static	function	instance()
		{
				if(	Guilde_Model::$instance	===	NULL	)
						return	new	Guilde_Model;

				return	Guilde_Model::$instance;
		}
		
		/**
			* Verifier si un nom de guilde est déjà prit
			*
			* @param Nom de la guilde
			* @return true or false
			*/
		public	function	exist( $nom )
		{		
				if(parent::model_select(	'guilde', array('nom' => $nom)	)){
					return true;
				}else{
					return false;
				}
		}
		
		/**
			* Permet de creer une guilde
			*
			* @param Nom de la guilde
			* @param Joueur créant le guilde
			* @return True
			*/
		public	function	insert(	$nom,	$fondateur	)
		{		
				$Gid = parent::model_insert(	'guilde', array(	'nom'	=>	$nom, 'fondateur_id' => $fondateur	));
				parent::model_insert(	'guilde_user', array(	'guilde_id'	=> $Gid , 'user_id' => $fondateur)	);
				return true;
		}

		/**
			* Ajouter un joueur dans une guilde
			*
			* @param Nom de la guilde
			* @param Joueur rejoignant la guilde
			* @return True
			*/
		public	function	joinGuilde(	$nom,	$Jid	)
		{		
				if( $this->exist($nom) ){
					$Gid = parent::model_select(	'guilde', array('nom' => $nom)	)->current()->guilde_id;
					parent::model_insert(	'guilde_user', array(	'guilde_id'	=> $Gid , 'user_id' => $Jid)	);
					return true;
				}else{
					return false;
				}
				
		}
		
		/**
			* Verifier si le joueur est dans une guilde
			*
			* @param ID du joueur
			* @return true or false
			*/
		public	function	inGuilde( $Jid )
		{		
				if(parent::model_select(	'guilde_user', array('user_id' => $Jid)	)){
					return true;
				}else{
					return false;
				}
		}
		
		/**
			* Verifier si je joueur est fondateur d'une guilde
			*
			* @param ID du joueur
			* @return true or false
			*/
		public	function	isFondateur( $Jid )
		{		
				if(parent::model_select(	'guilde', array('fondateur_id' => $Jid)	)){
					return true;
				}else{
					return false;
				}
		}

		/**
			* Retourne un liste de toute les guilde
			*
			* @return liste de toute les guilde
			*/
		public	function	listeGuilde( )
		{		
				if(parent::model_select( 	'guilde'	)){
					$liste = parent::model_select( 	'guilde'	);	
					return $liste;
				}else{
					return false;
				}
		}	

		/**
			* Retourne les infos de la guilde
			*
			* @param ID du joueur
			* @return Nom de la guilde
			*/
		public	function	guilde( $Gid )
		{		
				return parent::model_select(	'guilde', array('guilde_id' => $Gid)	)->current();			
		}	
		
		/**
			* Retourne l'ID del a guilde
			*
			* @param ID du joueur
			* @return ID de la guilde
			*/
		public	function	idGuilde( $Jid )
		{		
				return parent::model_select(	'guilde_user', array('user_id' => $Jid)	)->current()->guilde_id;		
		}
		
		/**
			* Retourne le nom de la guilde
			*
			* @param ID du joueur
			* @return Nom de la guilde
			*/
		public	function	nomGuilde( $Jid )
		{		
				$Gid = $this->idGuilde($Jid);
				return parent::model_select(	'guilde', array('guilde_id' => $Gid)	)->current()->nom;			
		}		

		/**
			* Retourne le nom d'un membre à partir de l'id
			*
			* @param ID du joueur
			* @return Nom de du joueur
			*/
		public	function	nomMembre( $Jid )
		{		
				return parent::model_select(	'users', array('id' => $Jid)	)->current()->username;			
		}
		
		/**
			* Nombre de membres dans la guilde
			*
			* @param ID du joueur
			* @param False = nombre membre par id joueur, True par id de guilde
			* @return Nombre de membres dans la guilde
			*/
		public	function	nbMembre( $Jid , $mode = False)
		{		
				if(!$mode){
					$Gid = $this->idGuilde($Jid);
				}else{
					$Gid = $Jid;
				}
				return parent::model_select(	'guilde_user', array('guilde_id' => $Gid)	)->count();			
		}
		
		/**
			* Permet de quitter la guilde ou de la dissoudre si l'on est fondateur
			*
			* @param ID du joueur
			*/
		public	function	quit( $Jid )
		{		
				if(!$this->isFondateur($Jid)){
					parent::model_delete(	'guilde_user', array('user_id' => $Jid)	);
				}else{
					$Gid = $this->idGuilde($Jid);
					parent::model_delete(	'guilde', array('fondateur_id' => $Jid)	);
					parent::model_delete(	'guilde_user', array('guilde_id' => $Gid)	);
				}

		}
		/**
			* Permet de suprimmer une guilde
			*
			* @param ID guilde
			*/
		public	function	delete( $Gid )
		{		
					parent::model_delete(	'guilde', array('guilde_id' => $Gid)	);
					parent::model_delete(	'guilde_user', array('guilde_id' => $Gid)	);
		}

		/**
			* Faire une mise à jour d'une ligne.
			*
			* @param array valeur à mettre à jour
			* @param integer ID de la ligne
			* @return mixe retourne un object sinon false
			*/
		public	function	update(	array	$set,	$Gid	)
		{
				return	parent::model_update(	'guilde',	$set,	array(	'guilde_id'	=>	$Gid	)	);
		}
}

?>
