<?php

defined( 'SYSPATH' ) OR die( 'No direct access allowed.' );

$config['version'] = '1.0.9'; //Version de votre jeu

$config['name'] = 'Meuporg'; //Nom de votre jeu

$config['debug'] = FALSE; //Afficher la partie debug

$config['cache'] = FALSE; //Activer ou non le cache

$config['money'] = 'OR'; // money du jeu

$config['id_article_preambule'] = 140; //Article par defaut qui presente le jeu tout au début - Si FALSE, il n'y aura pas de préambule

$config['initialPosition'] = array( 'x' => 20, 'y' => 4, 'region' => 79 ); //position initial lors de la création d'un joueur

$config['initialArgent'] = 1000; //Argent que le joueur possède lors de son initialisation

$config['initialAvatar'] = 'default.png'; //Avatar que le joueur possède lors de son initialisation

$config['initialHP'] = 100; //HP que le joueur possède lors de son initialisation (ATTENTION la valeur vaut pour le max hp et la valeur de celui du joueur (100% au final))

$config['initialMP'] = 10; //MP que le joueur possède lors de son initialisation (ATTENTION la valeur vaut pour le max hp et la valeur de celui du joueur (100% au final))

  $config['description'] = '<center><TABLE BORDER="2">
  <TR>
 <TH> F-A-Q </TH>
 <TH> Déscription </TH>
          <TH> Nouveauté </TH>
  </TR>
  <TR>
          <TD><center><b>Question : </b>Le jeu est a t"il été créer avec RPG maker ? <br><b>Réponse : </b>Non, ce jeu a été fabriquer avec le moteur "Mon-RPG" <br><-------------------------------------------><br><b>Question : </b>Doit-on télécharger quelques choses pour jouer ? <br><b>Réponse : </b>Non plus, vous avez juste à vous inscrire en quelques secondes pour jouer. <br><-------------------------------------------><br><b>Question : </b>Ce jeu est t"il terminé ?<br><b>Réponse : </b>Non, Meuporg est actuellement en version Alpha. </center></TD>
          <TD> <br><center><b>Meuporg</b> est un nouveau RPG multijoueurs tout en 2D "rétro".<br> <br>Se déroulant dans un temps post-moderne, beaucoup d"intéraction sont possibles au seins du jeu.<br> Combattez contre des monstres ou des personnages pour gagner de l"expérience.<br> Achetez ou revendez les objets que vous souhaitez. fusionnez même plusieurs élèments entre eux pour en faire de gros objets ultra rare. <br><b>Meuporg</b> est tellement riche en activité que vous y trouverez toujours quelques choses à faire. <br>Le fait de participer à des quêtes vous permettrons d"évoluer comme bon vous semble. <br>choisissez votre métiers et faites en bon usage, <br>chacun d"entre eux ont une influence sur votre personnalité et permettent de faire évoluer l"expérience du jeu. </center></TD>
          <TD> <center><b>22/12/2014 :<br>- Editeur de personnages désormais disponible <b><br><br>14/12/2014 :<br>- Bug de sortie de map corrigé.<br>- Les pseudos des connectées sont désormais visibles. </TD></center>
  </TR>
          </TABLE></center> '; //Description du jeu
?>