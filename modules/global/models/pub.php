<?php

defined(	'SYSPATH'	)	OR	die(	'No direct access allowed.'	);

/**
	* Créer des pubs sur les panneaux
	*
	* @package Sort
	* @author Pasquelin Alban
	* @copyright (c) 2011
	* @license http://www.openrpg.fr/license.html
	* @version 2.0.0
	*/
class	Pub_Model	extends	Model	{

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
				if(	Pub_Model::$instance	===	NULL	)
						return	new	Pub_Model;

				return	Pub_Model::$instance;
		}

		/**
			* Faire une sélection sur la table pub.
			*
			* @param mixe les valeur du where
			* @param integer limit de la requête
			* @return mixe retourne un object sinon false
			*/
		public	function	select(	$array	=	FALSE,	$limit	=	FALSE	)
		{
		
				if(parent::model_select(	'pub',	$array,	$limit	)){
				return	parent::model_select(	'pub',	$array,	$limit	)->current();
				}else{
				return false;
				}
		}
		
			/**
			* Faire une sélection sur la table pub.
			*
			* @param mixe les valeur du where
			* @param integer limit de la requête
			* @return mixe retourne un object sinon false
			*/
		public	function	select_all(	$array	=	FALSE,	$limit	=	FALSE	)
		{
		
				if(parent::model_select(	'pub',	$array,	$limit	)){
				return	parent::model_select(	'pub',	$array,	$limit	);
				}else{
				return false;
				}
		}

		/**
			* Faire une mise à jour d'une ligne.
			*
			* @param array valeur à mettre à jour
			* @param integer ID de la ligne
			* @return mixe retourne un object sinon false
			*/
		public	function	update(	array	$set,	$pub_id	)
		{
				return	parent::model_update(	'pub',	$set,	array(	'pub_id'	=>	$pub_id	)	);
		}

		/**
			* Faire une insertion d'une ligne SQL.
			*
			* @param array valeur à insérer
			* @return	 mixe retourne soit  un ID sinon false
			*/
		public	function	insert(	array	$set	)
		{
				return	parent::model_insert(	'pub',	$set	);
		}

		/**
			* Supprimer une ligne.
			*
			* @param integer ID de la ligne
			* @return	 bool retour false ou true
			*/
		public	function	delete(	$pub_id	)
		{
				return	parent::model_delete(	'pub',	array(	'pub_id'	=>	$pub_id	)	);
		}
}

?>
