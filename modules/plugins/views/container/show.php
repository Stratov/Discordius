<?php defined( 'SYSPATH' ) OR die( 'No direct access allowed.' ); ?>

<?php if( $data->image ) : ?>
  <div class="avatarAction" id="avatarAction" style="background-image:url('<?php echo url::base(); ?>images/modules/<?php echo $data->image; ?>');">
  </div>
<?php endif ?>
	 <h1 style="text-align: center;color:#8D1E19;"><?php echo $name ?>
       <?php if( $admin ) : ?>
         <a href="<?php echo url::base(); ?>admin/index.php/containers/show/<?php echo $id; ?>"  title="<?php echo Kohana::lang('form.edit'); ?>" target="blank"><img src="<?php echo url::base(); ?>images/orther/edit.png"  alt="<?php echo Kohana::lang('form.edit'); ?>"/></a>
	   <?php endif; ?>
	   - <small>Voir le contenu</small></h1><br />
	 <div style="text-align: center;" >
	 <?php if ($allow_put): ?>
	   <input type="button" class="button button_bleu" id="show_container_user" value="Déposer un objet"/>
	 <?php endif ?>
     </div>
<?php if (isset($message)): ?>
	 <b class="vert" ><?php echo $message; ?></b><br />
	 <?php endif; ?>

<?php if (isset($error)): ?>
	 <b class="rouge" ><?php echo $error; ?></b><br />
	 <?php endif; ?>

<br />


<?php if (!count($list_object)): ?>
  <p><b>Il n'y a aucun objet ici. :'(</b></p>
<?php else: ?>
  <div class="inventaire">
  <table width="95%">
  <?php foreach( $list_object as $key => $row ) : ?>
	 <tr>
	 <td>
     <div class="element-item" >
	   <div class="nombre" ><?php echo $row->nbr ?></div>
       <img src="<?php echo url::base(); ?>images/items/<?php echo $row->image; ?>" width="24" height="24" class="imgItem" id="objet_<?php echo $row->id; ?>"/>
     </div>
     </td>
	 <td>
	 <h2>
	   <?php echo $row->name; ?> 
	 </h2>
	 <p><?php echo $row->comment; ?></p></td>
	 <td valign="middle" align="right">
	   <?php if ($allow_get): ?>
	     <input type="button" data-id-object="<?php echo $row->id; ?>" class="button button_vert container_take" value="<?php echo Kohana::lang( 'object.button_take_object' ); ?>"/>
	   <?php endif ?>
	 </td>
	 </tr>

  <?php endforeach ?>
  </table>
  </div>
<?php endif ?>
<script>
	   $(function(){
		   $('#show_container_user').click(function() {
			   $('#commandActionContent').load( url_script+'actions/container/show_user' );
			 });
		   $('.container_take').click(function() {
			   console.log(this, $(this));
			   $('#commandActionContent').load( url_script+'actions/container/take', {
				 id_item: this.getAttribute('data-id-object')
					 });
			 }); 
		 });
</script>
