<?php defined( 'SYSPATH' ) OR die( 'No direct access allowed.' ); ?>

<article class="module width_full relative">
		<header>
				<h3 class="tabs_involved"><?php echo $row->description; ?></h3>
		</header>
		<div class="module_content">
				<p class="form-line">
						<label for="title" class="form-label"><?php echo Kohana::lang( 'quete.title' ); ?> :</label>
						<input name="title" id="title" value="<?php echo $row->description; ?>" class="inputbox input-text" type="text" maxlength="500" />
				</p>
		</div>
		<div class="clear"></div>
</article>
