<?php defined( 'SYSPATH' ) OR die( 'No direct access allowed.' ); ?>
<?php if( $data->image ) : ?>
  <div class="avatarAction" id="avatarAction" style="background-image:url('<?php echo url::base(); ?>images/modules/<?php echo $data->image; ?>');">
  </div>
<?php endif ?>

<div class="contenerActionStat">

	 <h1 style="text-align: center;" ><?php echo isset($name) ? $name : '*Coffre partagé*'; ?>
       <?php if( $admin ) : ?>
         <a href="<?php echo url::base(); ?>admin/index.php/containers/show/<?php echo $id; ?>"  title="<?php echo Kohana::lang('form.edit'); ?>" target="blank"><img src="<?php echo url::base(); ?>images/orther/edit.png"  alt="<?php echo Kohana::lang('form.edit'); ?>"/></a>
	   <?php endif; ?>
     </h1>

	 <p>
	 <? if (empty($description)): ?>
	 Il semblerait qu'il y a quelque chose à l'intérieur.
	 Si vous le souhaitez vous pouvez voir ça de plus près
	 <?php else: ?>
	   <?php echo $description; ?>
	 <?php endif ?>
	 </p>
</div>
<div class="spacer"></div>
<div style="text-align: center;" >
	 <input type="button" class="button button_vert" id="show_container" value="Voir les objets à l'intérieur"/>
	 <?php if ($allow_put): ?>
 	 <input type="button" class="button button_bleu" id="show_container_user" value="Déposer un objet"/>
	 <?php endif ?>
</div>
<div class="spacer" ></div>
<script>
  $(function(){
	$('#show_container').click(function() {
		$('#commandActionContent').load( url_script+'actions/container/show' );
	});
	$('#show_container_user').click(function() {
		$('#commandActionContent').load( url_script+'actions/container/show_user' );
	});

  });
</script>
