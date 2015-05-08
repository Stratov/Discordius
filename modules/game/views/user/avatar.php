<?php defined( 'SYSPATH' ) or die( 'No direct access allowed.' ); ?>

<div class="titreForm">
		<div class="titreCentent"><?php echo Kohana::lang('user.modif_avatar'); ?></div>
		<div class="spacer"></div>
</div>
            		</div>
		<div class="footerForm" id="footerForm">
            <center><div style="padding:5px; border:2px solid #ff3924; -moz-border-radius:9px; -khtml-border-radius:9px; -webkit-border-radius:9px; border-radius:9px;">
Aucun personnage ne vous convient ?
            <br><a href="javascript: return false;" id="generate_avatar" >Faites le votre à l'aide de l'éditeur de personnage <br> >> en cliquant ici ! <<</a><br></div></center>
		</div>
<form id="formInscript" method="post" action="user/avatar" >
		<div class="contentForm">
				<?php foreach( $avatar as $row ) : ?>
						<div class="avatar_modif close" id="<?php echo $row; ?>" style="background-image:url('<?php echo url::base(); ?>images/character/<?php echo $row; ?>');"></div>
				<?php endforeach ?>
				<div class="spacer"></div>
		</div>
		<div class="footerForm" id="footerForm">
            
            <center><input type="button" class="button close" value="<?php echo Kohana::lang( 'form.close' ); ?>"/></center>
		</div>
</form>
