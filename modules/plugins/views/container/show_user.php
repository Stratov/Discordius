<?php defined( 'SYSPATH' ) OR die( 'No direct access allowed.' ); ?>

<?php if( $data->image ) : ?>
  <div class="avatarAction" id="avatarAction" style="background-image:url('<?php echo url::base(); ?>images/modules/<?php echo $data->image; ?>');">
  </div>
<?php endif ?>
	 <h1 style="text-align: center;color:#8D1E19;"><?php echo $name ?>
       <?php if( $admin ) : ?>
         <a href="<?php echo url::base(); ?>admin/index.php/containers/show/<?php echo $id; ?>"  title="<?php echo Kohana::lang('form.edit'); ?>" target="blank"><img src="<?php echo url::base(); ?>images/orther/edit.png"  alt="<?php echo Kohana::lang('form.edit'); ?>"/></a>
	   <?php endif; ?>
	 - <small>Déposer un objet</small></h1><br />
	 <div style="text-align: center;" >
  	   <input type="button" class="button button_bleu" id="show_container" value="retour au contenu"/>
	 </div>
<?php if (isset($message)): ?>
	 <b class="vert" ><?php echo $message; ?><br /></b>
	 <?php endif; ?>

<?php if (isset($error)): ?>
	 <b class="rouge" ><?php echo $error; ?><br /></b>
	 <?php endif; ?>
<br />


<?php if (!count($list_object)): ?>
	 <p><b>Vous n'avez aucun objet. :'(</b></p>
<?php else: ?>
  <div class="inventaire">
	<table width="95%">
	<?php foreach( $list_object as $key => $row ) : ?>
	<?php if (!$row->cle): ?>
	  <tr>
	  <td>
  	  <div class="element-item" >
		<div class="nombre" ><?php echo $row->nbr ?></div>
	    <img src="<?php echo url::base(); ?>images/items/<?php echo $row->image; ?>" width="24" height="24" class="imgItem" id="objet_<?php echo $row->id; ?>"/>
	  </div>
</td>
	  <td><h2>
	    <?php echo $row->name; ?> 
	  </h2>
	  <p><?php echo $row->comment; ?></p></td>
	  <td valign="middle" align="right">
	  <input type="button" data-id-object="<?php echo $row->id; ?>" class="button button_vert container_put" value="Déposer"/>
	  </td>
	  </tr>
    <?php endif ?>
    <?php endforeach ?>
	</table>
  </div>
<?php endif ?>
<script>
	   $(function(){
		   $('#show_container').click(function() {
			   $('#commandActionContent').load( url_script+'actions/container/show' );
			 });
		   $('.container_put').click(function() {
			   $('#commandActionContent').load( url_script+'actions/container/put', {
				 id_item: this.getAttribute('data-id-object')
					 });
			 }); 
		 });
</script>
