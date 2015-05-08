<?php defined( 'SYSPATH' ) OR die( 'No direct access allowed.' ); ?>

<article class="module width_full relative">
		<header>
				<h3 class="tabs_involved"><?php echo $row->nom; ?></h3>
		</header>
		<div class="module_content">
				<p class="form-line">
						<label for="title" class="form-label"><?php echo "Nom de la Guilde"; ?> :</label>
						<input name="title" id="title" value="<?php echo $row->nom; ?>" class="inputbox input-text" type="text" maxlength="500" />
						<p><b>Fondateur:</b> <?php echo $fondateur. ' (' .$row->fondateur_id . ')'; ?></p>
						<p><b>Nombre de membres:</b> <?php echo $nbMembre; ?></p>
				</p>
		</div>
		<div class="clear"></div>
</article>
