<?php defined( 'SYSPATH' ) OR die( 'No direct access allowed.' ); ?>
<!DOCTYPE html>
<html lang="fr">
		<head>
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
				<title>Bienvenue sur <?php echo Kohana::config( 'game.name' ); ?></title>
				<?php echo isset( $css ) ? $css : FALSE; ?>
		</head>
		<body>
		
		
				
		
				<div id="my_body" >
				
<script type="text/javascript">
(function check(){
    $.ajax({
    	url: './index.php',
    	data: 'isAjax=1&get_user=1'})
    .done(function(data){
       $('#logged_in_users_list').html(data);
    })
    .complete(function(){
        setTimeout(check,5000);
    });
}());
</script>

				<div id="logged_in_users_list" style="float: left;
					position: absolute;
					left: -143px;
					background: url('../images/template/bg-body.png') repeat scroll 0 0 #E7E7E7;
					width: 132px;
					height: 607px;
					border: #CCC 1px solid;
					color: #7E7E7E;
					padding-left: 10px;">
				</div>
				
						<h1 class="invis"><?php echo Kohana::config( 'game.name' ); ?></h1>
						<?php if( $msg ) : ?>
								<div class="msg"><?php echo $msg; ?></div>
						<?php endif ?>
						<div id="header_bar">	
						
								<div id="bar">
										<div id="content_bar">
												<a class="logo" href="/">
														<img class="img" width="166" height="17" alt="RPG" src="<?php echo url::base(); ?>/images/template/logo2.png" />
												</a>
												<?php if( $login ) : ?>
														<?php echo html::anchor( 'logout', 'Se déconnecter', array( 'class' => 'l' ) ); ?>
														<a href="javascript:;" class="l menu_top" id="profil_menu"><?php echo Kohana::lang( 'template.profil' ); ?></a>
														<a href="javascript:;" class="l " id="job_menu"><?php echo Kohana::lang( 'template.job' ); ?></a>
														<a href="javascript:;" class="l menu_top" id="cles_menu"><?php echo Kohana::lang( 'template.cle' ); ?></a>
														<a href="javascript:;" class="l menu_top" id="stuff_menu"><?php echo Kohana::lang( 'template.stuff' ); ?></a>
														<a href="javascript:;" class="l menu_top" id="item_menu"><?php echo Kohana::lang( 'template.item' ); ?></a>
														<a href="javascript:;" class="l menu_top" id="jquetes_menu">Mes quêtes</a>
														<?php if( $admin ) : ?>
																<?php echo html::anchor( url::base().'admin', 'Administration', array( 'target' => 'blank', 'class' => 'l' ) ); ?>
														<?php endif ?>
												<?php else : ?>
														<div id="header_login"><?php echo isset( $header ) ? $header : false; ?></div>
												<?php endif ?>
												<div class="clear"></div>
										</div>	
								</div>	
						</div>
						<div id="content_body" >
								<?php if( isset( $menu ) && $menu ) : ?>
										<div class="menu">
												<div id="menu"><?php echo isset( $menu ) ? $menu : false; ?></div>
												<div class="clear"></div>
										</div>
								<?php endif ?>
								<div class="content-middle"><?php echo isset( $content ) && $content ? $content : FALSE; ?></div>
								<div class="clear"></div>
								<div id="content_footer"><?php echo isset( $bottom ) && $bottom ? $bottom : FALSE; ?></div>
								<div class="clear"></div>
						</div>
						<!--<div class="footer">
								<div style="float:left; font-weight: bold"><a href="<?php echo url::base( TRUE ); ?>" ><?php echo Kohana::lang( 'template.home' ); ?></a> - 
										<a href="http://tracker.openrpg.fr" target="blank"><?php echo Kohana::lang( 'template.bug' ); ?></a> - 
										<a href="http://docs.openrpg.fr/creer-son-jeu" target="blank"><?php echo Kohana::lang( 'template.doc' ); ?></a> - 
										<a href="http://www.openrpg.fr" target="blank">Open RPG</a></div>
								<div style="float:right">
										<strong><?php echo Kohana::lang( 'template.copyright' ); ?></strong>
								</div>
								<div class="spacer"></div>
								   <center>Un soucis ? une question ? Nous somme disponible sur skype : <br>madgames00 (admin) - Lord_pingouin (codeur) -  thunderkino (audio)<br><u>(pensez à ajouter les pseudos sur skype) </u><br><b>Meuporg 2014 ©</b></center>
						</div>
						<br />-->
						
						
				</div>
				
				<!-- Rendered in {execution_time} seconds, using {memory_usage} of memory -->
				<?php echo isset( $script ) ? $script : FALSE; ?>
		</body>
</html>