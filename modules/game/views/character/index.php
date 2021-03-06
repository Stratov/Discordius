<?php defined( 'SYSPATH' ) OR die( 'No direct access allowed.' ) ?>

<script src="<?php echo url::base(); ?>js/character.js"></script>
<link rel="stylesheet" href="<?php echo url::base(); ?>css/character.css" />
<article class="module width_3_quarter">
    <header class="titreForm">
        <center><div class="titreContent">Génerer un avatar</div></center>
        <div class="spacer"></div>
    </header>
    <?php if(!$chmod_map): ?>
        <h4 class="alert_error"><?php echo Kohana::lang( 'menu.chmod_character' ); ?></h4>
    <?php endif ?>
		<div class="module_content">
				<ul id="accordion">
						<li>
								<center><div style="padding:5px; border:2px solid #ff3924; -moz-border-radius:9px; -khtml-border-radius:9px; -webkit-border-radius:9px; border-radius:9px;"><a href="javascript:;" class="heading"><?php echo Kohana::lang( 'character.hair' ); ?></a> 
								<ul class="invis"> 
										<li class="arcordeon_li">
												<?php if( $hair ) : ?>
														<?php foreach( $hair as $row ) : ?>
																<div onclick="set_hair('<?php echo $row['front']; ?>','<?php echo $row['back']; ?>','<?php echo $row['top']; ?>')"  class="vignette_character_face">
																		<div class="vignette_character top" style="background-image: url('<?php echo url::base(); ?>admin/images/character/hair/top/<?php echo $row['top']; ?>')"></div>
																		<div class="vignette_character front" style="background-image: url('<?php echo url::base(); ?>admin/images/character/hair/front/<?php echo $row['front']; ?>')"></div>
																		<div class="vignette_character none" style="background-image: url('<?php echo url::base(); ?>admin/images/character/none.png')"></div>
																		<div class="vignette_character back" style="background-image: url('<?php echo url::base(); ?>admin/images/character/hair/back/<?php echo $row['back']; ?>')"></div>
																</div>
														<?php endforeach ?>
												<?php endif ?>
												<div class="clear"></div>
										</li> 
								</ul>
						</li> 
						<li> 
								<center><div style="padding:5px; border:2px solid #ff3924; -moz-border-radius:9px; -khtml-border-radius:9px; -webkit-border-radius:9px; border-radius:9px;"><a href="javascript:;" class="heading"><?php echo Kohana::lang( 'character.body' ); ?></a> 
								<ul class="invis"> 
										<li class="arcordeon_li">
												<?php if( $body ) : ?>
														<?php foreach( $body as $row ) : ?>
																<div onclick="set_body('<?php echo $row['front']; ?>')"  class="vignette_character_face">
																		<div class="vignette_character front" style="background-image: url('<?php echo url::base(); ?>admin/images/character/body/front/<?php echo $row['front']; ?>')"></div>
																		<div class="vignette_character none" style="background-image: url('<?php echo url::base(); ?>admin/images/character/none.png')"></div>
																</div>
														<?php endforeach ?>
												<?php endif ?>
												<div class="clear"></div>
										</li> 
								</ul>
						</li> 
						<li> 
								<center><div style="padding:5px; border:2px solid #ff3924; -moz-border-radius:9px; -khtml-border-radius:9px; -webkit-border-radius:9px; border-radius:9px;"><a href="javascript:;" class="heading"><?php echo Kohana::lang( 'character.hairop' ); ?></a> 
								<ul class="invis"> 
										<li class="arcordeon_li">
												<?php if( $hairop ) : ?>
														<?php foreach( $hairop as $row ) : ?>
																<div onclick="set_hairop('<?php echo $row['front']; ?>','<?php echo $row['back']; ?>')"  class="vignette_character_face">
																		<div class="vignette_character front" style="background-image: url('<?php echo url::base(); ?>admin/images/character/hairop/front/<?php echo $row['front']; ?>')"></div>
																		<div class="vignette_character none" style="background-image: url('<?php echo url::base(); ?>admin/images/character/none.png')"></div>
																		<div class="vignette_character back" style="background-image: url('<?php echo url::base(); ?>admin/images/character/hairop/back/<?php echo $row['back']; ?>')"></div>
																</div>
														<?php endforeach ?>
												<?php endif ?>
												<div class="clear"></div>
										</li> 
								</ul>
						</li> 
						<li> 
								<center><div style="padding:5px; border:2px solid #ff3924; -moz-border-radius:9px; -khtml-border-radius:9px; -webkit-border-radius:9px; border-radius:9px;"><a href="javascript:;" class="heading"><?php echo Kohana::lang( 'character.option' ); ?></a> 
								<ul class="invis"> 
										<li class="arcordeon_li">
												<?php if( $option ) : ?>
														<?php foreach( $option as $row ) : ?>
																<div onclick="set_option('<?php echo $row['front']; ?>','<?php echo $row['back']; ?>')"  class="vignette_character_face">
																		<div class="vignette_character front" style="background-image: url('<?php echo url::base(); ?>admin/images/character/option/front/<?php echo $row['front']; ?>')"></div>
																		<div class="vignette_character none" style="background-image: url('<?php echo url::base(); ?>admin/images/character/none.png')"></div>
																		<div class="vignette_character back" style="background-image: url('<?php echo url::base(); ?>admin/images/character/option/back/<?php echo $row['back']; ?>')"></div>
																</div>
														<?php endforeach ?>
												<?php endif ?>
												<div class="clear"></div>
										</li> 
								</ul>
						</li> 
						<li> 
								<center><div style="padding:5px; border:2px solid #ff3924; -moz-border-radius:9px; -khtml-border-radius:9px; -webkit-border-radius:9px; border-radius:9px;"><a href="javascript:;" class="heading"><?php echo Kohana::lang( 'character.mante' ); ?></a> 
								<ul class="invis"> 
										<li class="arcordeon_li">
												<?php if( $mante ) : ?>
														<?php foreach( $mante as $row ) : ?>
																<div onclick="set_mante('<?php echo $row['front']; ?>','<?php echo $row['back']; ?>')"  class="vignette_character_face">
																		<div class="vignette_character front" style="background-image: url('<?php echo url::base(); ?>admin/images/character/mante/front/<?php echo $row['front']; ?>')"></div>
																		<div class="vignette_character none" style="background-image: url('<?php echo url::base(); ?>admin/images/character/none.png')"></div>
																		<div class="vignette_character back" style="background-image: url('<?php echo url::base(); ?>admin/images/character/mante/back/<?php echo $row['back']; ?>')"></div>
																</div>
														<?php endforeach ?>
												<?php endif ?>
												<div class="clear"></div>
										</li> 
								</ul>
						</li> 
						<li> 
								<center><div style="padding:5px; border:2px solid #ff3924; -moz-border-radius:9px; -khtml-border-radius:9px; -webkit-border-radius:9px; border-radius:9px;"><a href="javascript:;" class="heading"><?php echo Kohana::lang( 'character.acce1' ); ?></a> 
								<ul class="invis"> 
										<li class="arcordeon_li">
												<?php if( $acce1 ) : ?>
														<?php foreach( $acce1 as $row ) : ?>
																<div onclick="set_acce1('<?php echo $row['front']; ?>','<?php echo $row['back']; ?>','<?php echo $row['top']; ?>')"  class="vignette_character_face">
																		<div class="vignette_character front" style="background-image: url('<?php echo url::base(); ?>admin/images/character/acce1/front/<?php echo $row['front']; ?>')"></div>
																		<div class="vignette_character none" style="background-image: url('<?php echo url::base(); ?>admin/images/character/none.png')"></div>
																		<div class="vignette_character back" style="background-image: url('<?php echo url::base(); ?>admin/images/character/acce1/back/<?php echo $row['back']; ?>')"></div>
																</div>
														<?php endforeach ?>
												<?php endif ?>
												<div class="clear"></div>
										</li> 
								</ul>
						</li> 
						<li> 
								<center><div style="padding:5px; border:2px solid #ff3924; -moz-border-radius:9px; -khtml-border-radius:9px; -webkit-border-radius:9px; border-radius:9px;"><a href="javascript:;" class="heading"><?php echo Kohana::lang( 'character.acce2' ); ?></a> 
								<ul class="invis"> 
										<li class="arcordeon_li">
												<?php if( $acce2 ) : ?>
														<?php foreach( $acce2 as $row ) : ?>
																<div onclick="set_acce2('<?php echo $row['front']; ?>','<?php echo $row['back']; ?>')"  class="vignette_character_face">
																		<div class="vignette_character front" style="background-image: url('<?php echo url::base(); ?>admin/images/character/acce2/front/<?php echo $row['front']; ?>')"></div>
																		<div class="vignette_character none" style="background-image: url('<?php echo url::base(); ?>admin/images/character/none.png')"></div>
																		<div class="vignette_character back" style="background-image: url('<?php echo url::base(); ?>admin/images/character/acce2/back/<?php echo $row['back']; ?>')"></div>
																</div>
														<?php endforeach ?>
												<?php endif ?>
												<div class="clear"></div></div></center>
										</li> 
								</ul>
						</li> 
				</ul>
		</div>
</article>
<center><article class="module width_quarter apercu_vignette"></center>
		<header><h3><?php echo Kohana::lang( 'character.vign' ); ?></h3></header>
		<div class="module_content">
				<div id="ym" class="content_apercu">
						<img src="<?php echo url::base(); ?>admin/images/character/none.png">
						<img src="<?php echo url::base(); ?>admin/images/character/default.png" id="option_b" class="sup_character">
						<img src="<?php echo url::base(); ?>admin/images/character/default.png" id="acce1_b" class="sup_character">
						<img src="<?php echo url::base(); ?>admin/images/character/default.png" id="hairop_b" class="sup_character">
						<img src="<?php echo url::base(); ?>admin/images/character/default.png" id="hair_b" class="sup_character">
						<img src="<?php echo url::base(); ?>admin/images/character/default.png" id="mante_b" class="sup_character">
						<img src="<?php echo url::base(); ?>admin/images/character/default.png" id="acce2_b" class="sup_character">
						<img src="<?php echo url::base(); ?>admin/images/character/none.png" id="body">
						<img src="<?php echo url::base(); ?>admin/images/character/default.png" id="hair_f" class="sup_character">
						<img src="<?php echo url::base(); ?>admin/images/character/default.png" id="acce2_m" class="sup_character">
						<img src="<?php echo url::base(); ?>admin/images/character/default.png" id="mante_f" class="sup_character">
						<img src="<?php echo url::base(); ?>admin/images/character/default.png" id="acce1_f" class="sup_character">
						<img src="<?php echo url::base(); ?>admin/images/character/default.png" id="hair_t" class="sup_character">
						<img src="<?php echo url::base(); ?>admin/images/character/default.png" id="acce2_f" class="sup_character">
						<img src="<?php echo url::base(); ?>admin/images/character/default.png" id="hairop_f" class="sup_character">
						<img src="<?php echo url::base(); ?>admin/images/character/default.png" id="acce1_t" class="sup_character">
						<img src="<?php echo url::base(); ?>admin/images/character/default.png" id="option_f" class="sup_character">
				</div>
				<div class="clear"></div>
		</div>
		<footer>
				<div class="submit_link">
						<center><input type="button" value="<?php echo Kohana::lang( 'form.reset' ); ?>" id="reset"/>
						<input type="button" value="<?php echo Kohana::lang( 'character.submit' ); ?>" id="generate"/></center>
				</div>
		</footer>
</article>