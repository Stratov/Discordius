<?php
setlocale(LC_ALL, 'fr_FR', 'fra');
// NOTES :
// Pour mettre le nom des mois en français, il suffit de changer dans:
// views/conversation/index.php
// Ligne 168: $name = ucfirst(strftime("%B", mktime(0, 0, 0, $month, 1)));
// Ligne 181: $name = ucfirst(strftime("%B", mktime(0, 0, 0, $month, 1)));

ET::$languageInfo["FrenchPolite"] = array(
	"locale" => "fr-FR",
	"name" => "Français (Polite)",
	"description" => "Un pack de langue française avec vouvoiement et formules de politesse.",
	"version" => "1.1",
	"author" => "L2C2",
	"authorEmail" => "fabien.dupuisplanchard@l2-c2.com",
	"authorURL" => "http://www.l2-c2.com",
	"license" => "GPLv2"
);

// Define the character set that this language uses.
$definitions["charset"] = "utf-8";

$definitions["date.full"] = "D j M Y G:i:s T"; // see http://au.php.net/manual/en/function.date.php for details

$definitions["%d day ago"] = "hier";
$definitions["%d days ago"] = "il y a %d jours";
$definitions["%d hour ago"] = "il y a 1 heure";
$definitions["%d hours ago"] = "il y a %d heures";
$definitions["%d minute ago"] = "il y a 1 minute";
$definitions["%d minutes ago"] = "il y a %d minutes";
$definitions["%d month ago"] = "le mois dernier";
$definitions["%d months ago"] = "il y a %d mois";
$definitions["%d second ago"] = "il y a 1 seconde";
$definitions["%d seconds ago"] = "il y a %d secondes";
$definitions["%d week ago"] = "la semaine dernière";
$definitions["%d weeks ago"] = "il y a %d semaines";
$definitions["%d year ago"] = "l'an dernier";
$definitions["%d years ago"] = "il ya %d ans";

$definitions["%s and %s"] = "%s et %s";
$definitions["%s can view this conversation."] = "%s peut voir cette conversation.";
$definitions["%s changed %s's group to %s."] = "%s a changé le groupe de %s pour %s.";
$definitions["%s changed your group to %s."] = "%s a changé votre groupe pour %s.";
$definitions["%s conversation"] = "%s conversation";
$definitions["%s conversations"] = "%s conversations";
$definitions["%s invited you to %s."] = "%s vous invite à %s.";
$definitions["%s joined the forum."] = "%s a rejoint le forum.";
$definitions["%s post"] = "%s message";
$definitions["%s posted %s"] = "%s a posté %s";
$definitions["%s posted in %s."] = "%s a posté dans %s.";
$definitions["%s posts"] = "%s messages";
$definitions["%s reply"] = "%s réponse";
$definitions["%s replies"] = "%s réponses";
$definitions["%s Settings"] = "%s Paramètres";
$definitions["%s started the conversation %s."] = "%s a commancé la conversation %s.";
$definitions["%s tagged you in a post."] = "%s a parlé de vous dans un message.";
$definitions["%s will be able to view this conversation."] = "%s pourra voir cette conversation.";
$definitions["%s will be able to:"] = "%s pourra:";

$definitions["A new version of esoTalk (%s) is available."] = "Une nouvelle version de esoTalk (%s) est disponible.";
$definitions["a private conversation"] = "une conversation privée";
$definitions["Access the administrator control panel."] = "Accéder au panneau administrateur.";
$definitions["Account type"] = "Type de compte";
$definitions["Activate"] = "Activer";
$definitions["Activity"] = "Activité";
$definitions["Add"] = "Ajouter";
$definitions["Administration"] = "Administration";
$definitions["Administrator email"] = "Email administrateur";
$definitions["Administrator password"] = "Password administrateur";
$definitions["Administrator username"] = "Pseudo administrateur";
$definitions["Advanced options"] = "Options avancées";
$definitions["All Channels"] = "Toutes les catégories";
$definitions["Already have an account? <a href='%s' class='link-login'>Log in!</a>"] = "Déjà enregistré ? <a href='%s' class='link-login'>Se connecter !</a>";
$definitions["Appearance"] = "Apparence";
$definitions["Automatically star conversations that I reply to"] = "Suivre automatiquement une conversation à laquelle je réponds";
$definitions["Avatar"] = "Avatar";

$definitions["Back to channels"] = "Retour aux catégories";
$definitions["Back to conversation"] = "Retour à la conversation";
$definitions["Back to member"] = "Retour à la page membre";
$definitions["Back to members"] = "Retour à la liste des membres";
$definitions["Back to search"] = "Retour à la recherche";
$definitions["Base URL"] = "Base URL";
$definitions["Bold"] = "Gras";
$definitions["By %s"] = "Par %s";

$definitions["Can suspend/unsuspend members"] = "Peut suspendre/réactiver les membres";
$definitions["Cancel"] = "Annuler";
$definitions["Change %s's Permissions"] = "Changer les permissions de %s";
$definitions["Change avatar"] = "Changer l'avatar";
$definitions["Change channel"] = "Changer la catégorie";
$definitions["Change name"] = "Changer le nom";
$definitions["Change Password or Email"] = "Changer le Mot de passe ou l'Email";
$definitions["Change password"] = "Changer le mot de passe";
$definitions["Change permissions"] = "Changer les permissions";
$definitions["Change"] = "Changer";
$definitions["Channel description"] = "Description de la catégorie";
$definitions["Channel List"] = "Liste des catégories";
$definitions["Channel title"] = "Titre de la catégorie";
$definitions["Channel slug"] = "Slug";
$definitions["Channels"] = "Catégories";
$definitions["Choose a secure password of at least %s characters"] = "Choisir un mot de passe sécurisé d'au moins %s charactères";
$definitions["Choose what people will see when they first visit your forum."] = "Choisir ce que les gens vont voir en premier quand ils visiteront le forum.";
$definitions["Click on a member's name to remove them."] = "Cliquer sur le nom d'un membre pour l'enlever.";
$definitions["Close registration"] = "Inscription fermée";
$definitions["Confirm password"] = "Confirmer le mot de passe";
$definitions["Context"] = "Voir dans le contexte";
$definitions["Controls"] = "Controles";
$definitions["Conversation"] = "Conversation";
$definitions["Conversations participated in"] = "Conversations auxquelles il a participé";
$definitions["Conversations started"] = "Conversations commencées";
$definitions["Conversations"] = "Conversations";
$definitions["Copy permissions from"] = "Copier les permissions de";
$definitions["Create Channel"] = "Créer une Catégorie";
$definitions["Create Group"] = "Créer un Groupe";
$definitions["Create Member"] = "Créer un Membre";
$definitions["Customize how users can become members of your forum."] = "Choisir comment les utilisateurs peuvent s'enregistrer sur le forum.";

$definitions["Dashboard"] = "Dashboard";
$definitions["Default forum language"] = "Langue par défaut";
$definitions["<strong>Delete</strong> all conversations forever."] = "<strong>Supprimer</strong> toutes les conversations pour toujours.";
$definitions["Delete Channel"] = "Supprimer la Catégorie";
$definitions["Delete conversation"] = "Supprimer la conversation";
$definitions["Delete member"] = "Supprimer le membre";
$definitions["Delete Member"] = "Supprimer Membre";
$definitions["<strong>Delete this member's posts.</strong> All of this member's posts will be marked as deleted, but will be able to be restored manually."] = "<strong>Supprimer les messages de ce membre.</strong> Tous les messages de ce membre seront marqués comme supprimés, mais il sera possible de les restaurer manuellement.";
$definitions["Delete"] = "Supprimer";
$definitions["Deleted %s by %s"] = "Supprimé %s par %s";
$definitions["Disable"] = "Désactiver";
$definitions["Discard Draft"] = "Ignorer le Brouillon";

$definitions["Edit Channel"] = "Editer la Catégorie";
$definitions["Edit Group"] = "Editer le Groupe";
$definitions["Edit member groups"] = "Editer les groupes";
$definitions["Edit your profile"] = "Editer votre profil";
$definitions["Edit"] = "Editer";
$definitions["Edited %s by %s"] = "Edité %s par %s";
$definitions["Email me when I'm added to a private conversation"] = "M'envoyer un email lorsque je suis ajouté à une conversation privée";
$definitions["Email me when someone posts in a conversation I have starred"] = "M'envoyer un email lorsque quelqu'un poste dans une conversation que je suis";
$definitions["Email"] = "Email";
$definitions["Enable"] = "Activer";
$definitions["Enter a conversation title"] = "Entrer un titre";
$definitions["Error"] = "Erreur";
$definitions["esoTalk version"] = "Version esoTalk";
$definitions["Everyone"] = "Tout le monde";

$definitions["Fatal Error"] = "Erreur Fatale";
$definitions["Feed"] = "Flux";
$definitions["Filter by name or group..."] = "Filtrer par nom ou groupe...";
$definitions["Filter conversations..."] = "Filtrer les conversations...";
$definitions["Find this post"] = "Trouver ce message";
$definitions["First posted"] = "Premier message";
$definitions["Forgot Password"] = "Mot de passe oublié";
$definitions["Forum header"] = "En-tête du Forum";
$definitions["Forum language"] = "Langue du Forum";
$definitions["Forum Settings"] = "Paramètres du Forum";
$definitions["Forum Statistics"] = "Statistiques";
$definitions["Forum title"] = "Titre du forum";
$definitions["forumDescription"] = "%s est un forum à propos de %s, et %s.";

$definitions["Give this group the 'moderate' permission on all existing channels"] = "Assigner à ce groupe la permission 'Modérer' sur toutes les catégories existantes";
$definitions["Global permissions"] = "Permissions générales";
$definitions["Go to top"] = "Remonter";
$definitions["Group name"] = "Nom du groupe";
$definitions["group.administrator"] = "Administrateur";
$definitions["group.administrator.plural"] = "Administrateurs";
$definitions["group.guest"] = "Invité";
$definitions["group.guest.plural"] = "Invités";
$definitions["group.member"] = "Membre";
$definitions["group.member.plural"] = "Membres";
$definitions["group.Moderator"] = "Modérateur";
$definitions["group.Moderator.plural"] = "Modérateurs";
$definitions["group.suspended"] = "Suspendu";
$definitions["Groups can be used to categorize members and give them certain privileges."] = "Les Groupes peuvent être utilisés pour classer les membres et leur assigner certain droits.";
$definitions["Groups"] = "Groupes";

$definitions["Header"] = "En-tête";
$definitions["Home page"] = "Accueil";
$definitions["HTML is allowed."] = "HTML est autorisé.";

$definitions["If you run into any other problems or just want some help with the installation, feel free to ask for assistance at the <a href='%s'>esoTalk support forum</a>."] = "Si vous rencontrez d'autres problèmes ou si vous cherchez juste un peu d'aide pour l'installation, n'hésitez pas à aller voir <a href='%s'>le forum de support esoTalk</a>.";
$definitions["Install esoTalk"] = "Installer esoTalk";
$definitions["Install My Forum"] = "Installer Mon Forum";
$definitions["Installed Languages"] = "Langues installées";
$definitions["Installed Plugins"] = "Plugins installés";
$definitions["Installed plugins"] = "plugins installés";
$definitions["Installed Skins"] = "Skins installés";
$definitions["Installed skins"] = "skins installés";
$definitions["is %s"] = "est %s";

$definitions["Joined"] = "Inscrit";
$definitions["Jump to last"] = "Aller au dernier";
$definitions["Jump to unread"] = "Aller au non-lu";
$definitions["just now"] = "à l'instant";

$definitions["<strong>Keep this member's posts.</strong> All of this member's posts will remain intact, but will show [deleted] as the author."] = "<strong>Garder les messages de ce membre.</strong> Tout les messages de ce membre resteront intacts, mais [supprimé] sera marqué comme autheur.";

$definitions["label.draft"] = "Brouillon";
$definitions["label.locked"] = "Vérouillé";
$definitions["label.muted"] = "Muted";
$definitions["label.private"] = "Privée";
$definitions["label.sticky"] = "Post-it";
$definitions["Labels"] = "Etiquettes";
$definitions["Last active %s"] = "Dernière activité %s";
$definitions["Latest News"] = "Dernière nouvelles";
$definitions["Load more posts"] = "Charger plus de messages...";
$definitions["Loading..."] = "Chargement...";
$definitions["Lock"] = "Vérouiller";
$definitions["Log In"] = "Se connecter";
$definitions["Log Out"] = "Se déconnecter";
$definitions["Keep me logged in"] = "Rester connecté";
$definitions["Username or Email"] = "Pseudo ou Email";
$definitions["Password"] = "Mot de passe";
$definitions["Don't have an account? <a href='%s' class='link-join'>Sign up!</a>"] = "Vous n'avez pas de compte&nbsp;? <a href='%s' class='link-join'>Inscrivez vous!</a>";

$definitions["Make member list visible to:"] = "Rendre la liste des membres visible à :";
$definitions["Manage Groups"] = "Gérer les Groupes";
$definitions["Manage Languages"] = "Gérer les packs Langues";
$definitions["Mark as read"] = "Marquer comme lu";
$definitions["Mark all as read"] = "Marquer tout comme lu";
$definitions["Maximum size of %s. %s."] = "Taille maximum de %s. %s.";
$definitions["Member groups"] = "Groupes";
$definitions["Member List"] = "Liste des Membres";
$definitions["Members Allowed to View this Conversation"] = "Membres autorisés à voir cette Conversation";
$definitions["Members Online"] = "Membres en ligne";
$definitions["Members"] = "Membres";
$definitions["Mobile skin"] = "Mobile skin";
$definitions["Moderate"] = "Modérer";
$definitions["<strong>Move</strong> conversations to the following channel:"] = "<strong>Déplacer</strong> les conversations vers la catégorie :";
$definitions["Mute conversation"] = "Mute conversation";
$definitions["MySQL database"] = "MySQL database";
$definitions["MySQL host address"] = "MySQL addresse hôte";
$definitions["MySQL password"] = "MySQL password";
$definitions["MySQL queries"] = "MySQL queries";
$definitions["MySQL table prefix"] = "MySQL table prefix";
$definitions["MySQL username"] = "MySQL username";
$definitions["MySQL version"] = "MySQL version";

$definitions["Name"] = "Nom";
$definitions["never"] = "jamais";
$definitions["New Conversation"] = "Nouvelle Conversation";
$definitions["New conversations in the past week"] = "Nouvelles conversations durant la dernière semaine";
$definitions["New email"] = "Nouvel email";
$definitions["New members in the past week"] = "Nouveaux membres durant la dernière semaine";
$definitions["New password"] = "Nouveau mot de passe";
$definitions["New posts in the past week"] = "Nouveaux message durant la dernière semaine";
$definitions["New username"] = "Nouveau pseudo";
$definitions["Newer"] = "Plus récents";
$definitions["Next Step"] = "Etape suivante";
$definitions["Next"] = "Suivant";
$definitions["No preview"] = "Aucun aperçu";
$definitions["No"] = "Non";
$definitions["Notifications"] = "Notifications";
$definitions["Now"] = "A l'instant";

$definitions["OK"] = "OK";
$definitions["Older"] = "Plus anciens";
$definitions["Online"] = "En ligne";
$definitions["online"] = "en ligne";
$definitions["Open registration"] = "Inscriptions ouvertes";
$definitions["optional"] = "optionel";
$definitions["Order By:"] = "Classé par:";
$definitions["Original Post"] = "Premier Message";

$definitions["Page Not Found"] = "Page Non Trouvée";
$definitions["Password"] = "Mot de passe";
$definitions["PHP version"] = "PHP version";
$definitions["Plugins"] = "Plugins";
$definitions["Post a Reply"] = "Répondre";
$definitions["Post count"] = "Nombre de message";
$definitions["Posts"] = "Messages";
$definitions["Preview"] = "Aperçu";
$definitions["Previous"] = "Précédents";

$definitions["Quote"] = "Citer";
$definitions["quote"] = "citer";

$definitions["Read more"] = "Plus de messages";
$definitions["Recent posts"] = "Messages récents";
$definitions["Recover Password"] = "Réinitialiser le mot de passe";
$definitions["Registered members"] = "Membres inscrits";
$definitions["Registration"] = "Inscription";
$definitions["Remove avatar"] = "Supprimer avatar";
$definitions["Rename Member"] = "Renommer un Membre";
$definitions["Reply"] = "Réponse";
$definitions["Report a bug"] = "Soumettre un bug";
$definitions["Require users to confirm their email address"] = "Force la confirmation des adresses email par les utilisateurs";
$definitions["restore"] = "restorer";

$definitions["Save Changes"] = "Valider les modifications";
$definitions["Save Draft"] = "Sauver le Brouillon";
$definitions["Search conversations..."] = "Chercher des conversations...";
$definitions["Search within this conversation..."] = "Chercher dans cette conversation...";
$definitions["Search"] = "Chercher";
$definitions["See the private conversations I've had with %s"] = "Voir les conversations privées que j'ai eu avec %s";
$definitions["Settings"] = "Paramètres";
$definitions["Show an image in the header"] = "Afficher une image dans l'en-tête";
$definitions["Show matching posts"] = "Voir les messages correspondants";
$definitions["Show the channel list by default"] = "Montrer la liste des catégories par défaut";
$definitions["Show the conversation list by default"] = "Montrer la liste des conversations par défaut";
$definitions["Show the forum title in the header"] = "Afficher le titre du forum dans l'en-tête";
$definitions["Sign Up"] = "Inscription";
$definitions["Skins"] = "Skins";
$definitions["Specify Setup Information"] = "Renseigner les informations de configuration";
$definitions["Star to receive notifications"] = "Suivre pour recevoir des notifications";
$definitions["Starred"] = "Suivi";
$definitions["Start a conversation"] = "Démarrer une conversation";
$definitions["Start a private conversation with %s"] = "Démarrer une conversation privée avec %s";
$definitions["Start Conversation"] = "Démarrer une Conversation";
$definitions["Starting a conversation"] = "Démarre une conversation";
$definitions["Statistics"] = "Statistiques";
$definitions["statistic.conversation.plural"] = "%s conversations";
$definitions["statistic.conversation"] = "%s conversation";
$definitions["statistic.member.plural"] = "%s membres";
$definitions["statistic.member"] = "%s membre";
$definitions["statistic.online.plural"] = "%s en ligne";
$definitions["statistic.online"] = "%s en ligne";
$definitions["statistic.post.plural"] = "%s messages";
$definitions["statistic.post"] = "%s message";
$definitions["Sticky"] = "Post-it";
$definitions["Subscribed"] = "Abonné";
$definitions["Subscription"] = "Abonnement";
$definitions["Suspend member"] = "Suspendre membre";
$definitions["Suspend members."] = "Suspendre membres.";
$definitions["Suspend"] = "Suspendre";

$definitions["Uninstall"] = "Désinstaller";
$definitions["Unlock"] = "Dévérouiller";
$definitions["Unmute conversation"] = "Unmute conversation";
$definitions["Unstarred"] = "Non suivi";
$definitions["Unsticky"] = "Enlever post-it";
$definitions["Unsubscribe new users by default"] = "Désabonner les nouveaux utilisateurs par défaut";
$definitions["Unsubscribed"] = "Désabonné";
$definitions["Unsuspend member"] = "Activer membre";
$definitions["Unsuspend"] = "Activer";
$definitions["Untitled conversation"] = "Conversation sans titre";
$definitions["Upgrade esoTalk"] = "Mettre à jour esoTalk";
$definitions["Use for mobile"] = "Utiliser module pour les mobiles";
$definitions["Use friendly URLs"] = "Utiliser des URLs racourcies";
$definitions["Used to verify your account and subscribe to conversations"] = "Utilisé pour vérifier le compte et les abonnements aux conversations";
$definitions["Username"] = "Nom utilisateur";

$definitions["View %s's profile"] = "Voir le profil de %s";
$definitions["View all notifications"] = "Voir les notifications";
$definitions["View more"] = "Voir plus";
$definitions["View your profile"] = "Voir votre profil";
$definitions["View"] = "Voir";
$definitions["Viewing: %s"] = "en train de lire: %s";
$definitions["Viewing %s"] = "en train de lire %s";
$definitions["viewingPosts"] = "<b>%s-%s</b> sur %s messages";

$definitions["Warning"] = "Attention quelque chose ne va pas !";
$definitions["Write a reply..."] = "Ecrire une réponse...";

$definitions["Yes"] = "Oui";
$definitions["You can manage channel-specific permissions on the channels page."] = "Vous pouvez changer les permissions propre à une catégorie sur la page des catégories.";
$definitions["Your current password"] = "Mot de passe actuel";


// Messages.
$definitions["message.404"] = "Et zut - la page que vous cherchez ne peut être trouvée! Essaye de revenir à la page précédente et de cliquer sur un autre lien...";
$definitions["message.ajaxDisconnected"] = "Impossible de communiquer avec le serveur. Patientez quelques secondes et <a href='javascript:jQuery.ETAjax.resumeAfterDisconnection()'>essayez à nouveau</a>, ou <a href='' onclick='window.location.reload();return false'>rafraichissez la page</a>.";
$definitions["message.ajaxRequestPending"] = "Attention, une requète est en cours! Si vous quittez cette page vous pourriez perdre des changements récents que vous avez fait. Merci d'attendre un petit peu.";
$definitions["message.avatarError"] = "Il y a eu un problème durant l'envoi de votre avatar. Assurez vous d'utiliser un type d'image valide (.jpg, .png, ou .gif) et que le fichier n'est pas trop volumineux.";
$definitions["message.cannotDeleteLastChannel"] = "Attention, vous ne pouvez pas supprimer la dernière catégorie ! Elle est necessaire pour l'enregistrement de vos conversations.";
$definitions["message.changesSaved"] = "Les changements ont été effectués.";
$definitions["message.channelsHelp"] = "Les Catégories sont utilisées pour classer les conversations. Vous pouvez créer autant de catégories que vous le souhaitez, les réorganiser, et les imbriquer en les déplaçant ci dessous.";
$definitions["message.channelSlugTaken"] = "Ce slug est déjà utilisé par une autre catégorie.";
$definitions["message.confirmDelete"] = "Vous êtes bien sûr de vouloir supprimer ce message ? Vous ne pourrez pas le récupérer par la suite.";
$definitions["message.confirmDiscardReply"] = "Vous n'avez pas sauvegardé votre réponse comme brouillon. Voulez vous l'abandonner ?";
$definitions["message.confirmEmail"] = "Avant de commencer à utiliser votre nouveau compte, vous devez confirmer votre adresse email. Dans les deux prochaines minutes vous devriez recevoir un email contenant un lien d'activation.";
$definitions["message.confirmLeave"] = "Attention vous n'avez pas sauvegarder le message que vous êtes en train d'éditer ! Si vous quittez la page, vous perdrez toutes les modifications faites. Êtes vous sûr ?";
$definitions["message.connectionError"] = "esoTalk n'a pu se connecter au serveur MySQL. L'erreur est:<br/>%s";
$definitions["message.conversationDeleted"] = "La conversation a été supprimée.";
$definitions["message.conversationNotFound"] = "Pour une certaine raison cette conversation ne peut être visualisée. Peut-être a-t-elle été supprimée ? Ou alors elle est privée, dans ce cas vous devez être déconnecté ou alors vous n'y êtes pas invité.";
$definitions["message.cookieAuthenticationTheft"] = "Pour des raisons de sécurité, on n'a pas pu utilisé votre cookie 'se rappeler de moi'. Merci de vous connectez vous manuellement.";
$definitions["message.deleteChannelHelp"] = "Si vous supprimez cette catégorie vous ne pourrez pas revenir en arrière. Toutes les conversations de cette catégories seront déplacées vers une de votre choix.";
$definitions["message.emailConfirmed"] = "Voila, votre compte a été validé et vous pouvez maintenant commencer à participer aux conversations. Et pourquoi ne pas en <a href='".URL("conversation/start")."'>commencer</a> une vous-même ?";
$definitions["message.emailDoesntExist"] = "Cette adresse email ne correspond à aucun membre. Peut être vous êtes vous trompé ?";
$definitions["message.emailNotYetConfirmed"] = "Vous devez confirmer votre adresse email avant de pouvoir vous connecter avec ! Si vous n'avez pas encore reçu d'email de validation, <a href='%s'>cliquez ici pour en recevoir un autre</a>.";
$definitions["message.emailTaken"] = "Il y a déjà un membre avec cette adresse email!";
$definitions["message.empty"] = "Vous devez remplir ce champ.";
$definitions["message.emptyPost"] = "Le contenu de votre conversation ne peut pas être vide.";
$definitions["message.emptyTitle"] = "Le titre de votre conversation ne peut pas être vide.";
$definitions["message.esoTalkAlreadyInstalled"] = "<strong>esoTalk est déjà installé.</strong><br/><small>Pour le réinstaller, vous devez supprimer <strong>config/config.php</strong>.</small>";
$definitions["message.esoTalkUpdateAvailable"] = "Une nouvelle version de esoTalk, %s, est disponible.";
$definitions["message.esoTalkUpdateAvailableHelp"] = "Il est recommandé de toujours avoir la dernière version installée pour réduire les risques de sécurité. Et puis, il y a peut être des nouvelles fonctionnalités sympas !";
$definitions["message.esoTalkUpToDate"] = "Cette version de esoTalk est à jour.";
$definitions["message.esoTalkUpToDateHelp"] = "Je suis un pauvre étudiant d'université qui a passé des centaines d'heures de développement sur esoTalk. Si vous l'aimez, pensez à faire une <a href='%s' target='_blank'>donation</a> s'il vous plait.";
$definitions["message.fatalError"] = "<p>esoTalk a rencontré une méchante erreur qui rend impossible de faire quoi que ce soit que vous tentez de faire. Mais ne vous en faites pas - <strong>voici quelques trucs que vous pouvez essayer</strong>:</p>\n<ul>\n<li>Allez dehors, promènez le chien, prennez un café... et puis <strong><a href='%1\$s'>réessayez</a></strong>!</li>\n<li>ISi vous êtes administrateur du forum, vous pouvez aller faire un tour sur le <a href='%2\$s'>site de esoTalk</a></strong>.</li>\n<li>Frapper l'ordinateur - Ca marche des fois pour moi.</li>\n</ul>";
$definitions["message.fatalErrorInstaller"] = "<p>esoTalk a rencontré une méchante erreur qui rend impossible de faire quoi que ce soit que vous tentez de faire. Mais ne vous en faites pas - <strong>voici quelques trucs que vous pouvez essayer</strong>:</p>\n<ul>\n<li><p><strong>Essayez à nouveau.</strong> Tout le monde fait des erreurs - peut être que l'ordinateur en a fait une cette fois !</p></li>\n<li><p><strong>Revenez en arrière et vérifiez les paramètres.</strong> En particulier, vérifiez les informations de la base de données.</p></li>\n<li><p><strong>Demande de l'aide.</strong> Allez sur <a href='%s'>le forum de esoTalk/a> et recherchez si quelqu'un a le même problème. Sinon lancez une conversation incluant les détails ci dessous.</p></li>\n</ul>";
$definitions["message.fatalErrorUpgrader"] = "<p>esoTalk a rencontré une méchante erreur qui rend impossible de faire quoi que ce soit que vous tentez de faire. Mais ne vous en faites pas - <strong>voici quelques trucs que vous pouvez essayer</strong>:</p>\n<ul>\n<li><p><strong>Essayes à nouveau.</strong> Tout le monde fait des erreurs - peut être que l'ordinateur en a fait une cette fois !</p></li>\n<li><p><strong>Demandez de l'aide.</strong> Allez sur <a href='%s'>le forum de esoTalk/a> et recherchez si quelqu'un a le même problème. Sinon lancez une conversation incluant les détails ci dessous.</p></li>\n</ul>";
$definitions["message.fileUploadFailed"] = "Quelque chose a mal tourné et le fichier que vous avez sélectionné ne peut être envoyé. Il est peut être trop volumineux ou dans un format invalide ?";
$definitions["message.fileUploadFailedMove"] = "Le fichier que vous avez envoyé ne peut arriver à destination. Merci de contacter l'administrateur du forum.";
$definitions["message.fileUploadNotImage"] = "Le fichier que vous tentez d'envoyer n'est pas dans un format d'image accepté.";
$definitions["message.fileUploadTooBig"] = "Le fichier selectionné ne peut être envoyé car il est trop volumineux.";
$definitions["message.forgotPasswordHelp"] = "Si vous avez oublié votre mot de passe, merci de renseigner votre adresse email afin de recevoir les instructions pour en créer un nouveau.";
$definitions["message.fulltextKeywordWarning"] = "Information: les mots de moins de 4 caractères et les mots commun tel que 'le' et 'pour', sont ignorés lors de la recherche.";
$definitions["message.gambitsHelp"] = "Les Gambits sont des phrases qui décrivent ce que vous cherchez. Cliquez sur un gambit pour l'insérer dans le champs de recherche. Double-clique pour chercher immédiatement. Les mot-clés habituels fonctionnent aussi !";
$definitions["message.gdNotEnabledWarning"] = "L'<strong>extension GD</strong> n'est pas activée.<br/><small>C'est obligatoire pour sauver les avatars. Demandez à votre hébergeur ou administrateur de l'installer/activer.</small>";
$definitions["message.greaterMySQLVersionRequired"] = "<strong>MySQL 4 ou supérieur</strong> doit être installé et <a href='http://php.net/manual/en/mysql.installation.php' target='_blank'>l'extension MySQL activée dans PHP</a>.<br/><small>Installez le ou demandez à votre hébergeur/administreur de le faire.</small>";
$definitions["message.greaterPHPVersionRequired"] = "<strong>PHP 5.0.0 ou supérieur</strong> doit être installé pour faire tourner esoTalk.<br/><small>Mettez à jour votre installation PHP ou faites la demande auprès de votre hébergeur ou administrateur.</small>";
$definitions["message.incorrectLogin"] = "Indentifiants invalides.";
$definitions["message.incorrectPassword"] = "Mot de passe actuel invalide.";
$definitions["message.installerAdminHelp"] = "esoTalk utilisera ces informations pour configurer le compte administrateur du forum.";
$definitions["message.installerFilesNotWritable"] = "esoTalk ne peut écrire dans les fichiers/dossiers suivants: <strong>%s</strong>.<br/><small>Pour résoudre le problème, vous devez utiliser un client FTP et <strong>chmod 777</strong> sur ceux ci.</small>";
$definitions["message.installerMySQLHelp"] = "esoTalk nécéssite un accès a MySQL pour stocker toutes les données du forum (conversations et messages). Si vous n'êtes pas certains de ces détails, vous devez demander à votre hébergeur.";
$definitions["message.installerWelcome"] = "<p>Bienvenue dans l'installeur esoTalk ! On a besoin de certaines informations pour configurer le forum.</p>\n<p>Si vous avez besoin d'aide, rendez vous sur <a href='%s'>esoTalk support forum</a>.</p>";
$definitions["message.invalidChannel"] = "Vous avez selectionné une catégorie incorrecte !";
$definitions["message.invalidEmail"] = "Il semble que cet email n'est pas valide...";
$definitions["message.invalidUsername"] = "Vous devez choisir un nom d'utilisateur entre 3 et 20 caractères alphanumériques.";
$definitions["message.javascriptRequired"] = "Cette page nécessite JavaScript pour fonctionner correctement.";
$definitions["message.languageUninstalled"] = "Le pack de langue a été installé.";
$definitions["message.locked"] = "Hm, Il semble que cette conversation soit <strong>vérouillée</strong>, vous ne pouvez donc pas y répondre.";
$definitions["message.loginToParticipate"] = "Pour démarrer une conversation ou répondre à des message, connecte vous.";
$definitions["message.logInToReply"] = "<a href='%1\$s' class='link-login'>Se connecter</a> ou <a href='%2\$s' class='link-join'>S'incrire</a> pour répondre!";
$definitions["message.logInToSeeAllConversations"] = "<a href='".URL("user/login")."' class='link-login'>Se connecter</a> pour afficher certaines catégories qui peuvent être cachées aux invités.";
$definitions["message.memberNotFound"] = "Hm, Il n'y a personne de ce nom là ici.";
$definitions["message.memberNoPermissionView"] = "Ce membre ne peut pas être ajouté car il n'a pas la permission de voir la catégorie dans laquelle ce trouve cette conversation.";
$definitions["message.nameTaken"] = "Le nom entré est pris ou est un mot réservé.";
$definitions["message.newSearchResults"] = "Il s'est passé des choses depuis votre recherche. <a href='%s'>Rafraichir</a>";
$definitions["message.noActivity"] = "%s n'a encore rien fait sur ce forum !";
$definitions["message.noMembersOnline"] = "Aucun membre en ligne actuellement.";
$definitions["message.noNotifications"] = "Vous n'avez pas de notification.";
$definitions["message.noPermission"] = "Ho oh ! Vous n'avez pas la permission de faire cette action.";
$definitions["message.noPermissionToReplyInChannel"] = "Tu n'as pas la permission de répondre aux conversations de cette catégorie.";
$definitions["message.noPluginsInstalled"] = "Aucun plugins n'est installé actuellement.";
$definitions["message.noSearchResults"] = "Auncune conversation correspondante à la recherche n'a été trouvée.";
$definitions["message.noSearchResultsMembers"] = "Aucun membre correspondant à la recherche.";
$definitions["message.noSearchResultsPosts"] = "Aucun message correspondant à la recherche..";
$definitions["message.noSkinsInstalled"] = "Aucun skin actuellement installé.";
$definitions["message.notWritable"] = "<code>%s</code> n'est pas modifiable. Tente <code>chmod 777</code>, ou s'il n'existe pas, <code>chmod</code> le dossier qui le contient.";
$definitions["message.pageNotFound"] = "La page demandée ne peut être trouvée.";
$definitions["message.passwordChanged"] = "C'est bon, votre mot de passe a été changé. Vous pouvez vous connecter !";
$definitions["message.passwordEmailSent"] = "Un email contenant un lien pour réinitialiser votre mot de passe vient de vous être envoyé.";
$definitions["message.passwordsDontMatch"] = "Votre mot de passe ne correspond pas.";
$definitions["message.passwordTooShort"] = "Votre mot de passe est trop court.";
$definitions["message.pluginCannotBeEnabled"] = "Le plugin <em>%s</em> ne peut pas être activé: %s";
$definitions["message.pluginDependencyNotMet"] = "Pour activer ce plugin, la version %s %s doit être installéé et activée.";
$definitions["message.pluginUninstalled"] = "Le plugin a été désintallé.";
$definitions["message.postNotFound"] = "Le message est introuvable.";
$definitions["message.postTooLong"] = "Votre message est vraiment, vraiment long ! La taille maximum autorisée pour un message est de %s.";
$definitions["message.preInstallErrors"] = "Les erreurs suivantes sont apparues dans votre installation. Elles doivent être corrigées avant de poursuivre l'installation.";
$definitions["message.preInstallWarnings"] = "Les erreurs suivantes sont apparues dans votre installation. Vous pouvez les ignorer mais esoTalk ne fonctionnera peut être pas correctement.";
$definitions["message.reduceNumberOfGambits"] = "Réduisez le nombre de gambits ou mots clés pour élargir le nombre de résultats.";
$definitions["message.registerGlobalsWarning"] = "PHP's <strong>register_globals</strong> setting is enabled.<br/><small>While esoTalk can run with this setting on, it is recommended that it be turned off to increase security and to prevent esoTalk from having problems.</small>";
$definitions["message.registrationClosed"] = "L'inscription sur ce forum n'est pas ouverte au public.";
$definitions["message.removeDirectoryWarning"] = "Attention! On dirait que vous n'avez pas supprimé le répertoire <code>%s</code> comme necessaire ! Vous devriez le faire ^^";
$definitions["message.safeModeWarning"] = "<strong>Safe mode</strong> is enabled.<br/><small>This could potentially cause problems with esoTalk, but you can still proceed if you cannot turn it off.</small>";
$definitions["message.searchAllConversations"] = "Essayez de chercher ces termes dans toutes les conversations.";
$definitions["message.setNewPassword"] = "Choisissez un nouveau mot de passe";
$definitions["message.skinUninstalled"] = "Le skin a été désinstallé";
$definitions["message.suspended"] = "Aïe! Un modérateur a <strong>suspendu</strong> votre compte.";
$definitions["message.suspendMemberHelp"] = "Suspendre %s les empèchera de répondre aux conversation, en commencer de nouvelles et voir les conversations privées. Ils seront traités comme de simple invités.";
$definitions["message.tablePrefixConflict"] = "L'installeur a detecté une autre installation de EsoTalk sur la même base de donnée avec le même préfixe.<br/>Pour écraser cette installation de esoTalk, cliquez sur 'Installer mon forum' encore une fois. <strong>Toutes les données seront perdues.</strong><br/>Si vous souhaitez créer une installation en parallèle, <strong>changez le prefix des tables</strong>.";
$definitions["message.unsuspendMemberHelp"] = "Supprimer la suspension de %s les autorisera à participer aux conversations du forum à nouveau.";
$definitions["message.upgradeSuccessful"] = "esoTalk a été mis à jour avec succés.";
$definitions["message.waitToReply"] = "Vous devez attendre au moins %s secondes entre chaque message.";
$definitions["message.waitToSearch"] = "Merci d'attendre %s secondes et réessayez.";


// Emails.
$definitions["email.confirmEmail.body"] = "Bienvenu sur le forum '%1\$s'.\n\nCliquez sur le lien suivant vous activer votre compte:\n%2\$s";
$definitions["email.confirmEmail.subject"] = "%1\$s, confirmation d'adresse email";
$definitions["email.footer"] = "\n\n(Si vous ne souhaitez plus recevoir ce type d'emails, <a href='%s'>cliquez ici</a>.)";
$definitions["email.forgotPassword.body"] = "Vous avez soumit une requête de mot de passe oublié pour votre compte sur le forum '%1\$s'. Si vous ne souhaitez pas changer de mot de passe, ignorez simplement cet email et rien ne changera.\n\nCependant, si vous avez vraiment oublié votre mot de passe et que vous souhaitez en choisir un nouveau, rendez vous ici:\n%2\$s";
$definitions["email.forgotPassword.subject"] = "Mot de passe oublié, %1\$s?";
$definitions["email.header"] = "Bonjour %s!\n\n";
$definitions["email.mention.body"] = "%1\$s parle de vous dans une message dans la conversation '%2\$s'.\n\nPour voir le message:\n%3\$s";
$definitions["email.mention.subject"] = "%1\$s parle de vous";
$definitions["email.privateAdd.body"] = "Vous avez été ajouté à une conversation privée intitulée '%1\$s'.\n\nPour voir cette conversation, cliquez sur le lien suivant:\n%2\$s";
$definitions["email.privateAdd.subject"] = "Vous avez été ajouté à une conversation privée";
$definitions["email.replyToStarred.body"] = "%1\$s a répondu à une conversation que vous suivez: '%2\$s'.\n\nPour voir les nouvelles, cliquez sur le lien suivant:\n%3\$s";
$definitions["email.replyToStarred.subject"] = "Il y a une réponse à '%1\$s'";


// Translating the gambit system can be quite complex, but we'll do our best to get you through it. :)
// Note: Don't use any html entities in these definitions, except for: &lt; &gt; &amp; &#39;

// Simple gambits
// These gambits are pretty much evaluated as-they-are.
// tag:, author:, contributor:, and quoted: are combined with a value after the colon (:).
// For example: tag:video games, author:myself
$definitions["gambit.author:"] = "auteur:";
$definitions["gambit.contributor:"] = "contributeur:";
$definitions["gambit.member"] = "membre";
$definitions["gambit.myself"] = "moi";
$definitions["gambit.draft"] = "brouillon";
$definitions["gambit.has attachments"] = "a des pièces jointes";
$definitions["gambit.locked"] = "verrouillé";
$definitions["gambit.order by newest"] = "trier par date";
$definitions["gambit.order by replies"] = "trier par nombre de réponses";
$definitions["gambit.private"] = "privée";
$definitions["gambit.random"] = "au hasard";
$definitions["gambit.reverse"] = "inverser";
$definitions["gambit.starred"] = "suivie";
$definitions["gambit.muted"] = "muted";
$definitions["gambit.sticky"] = "post-it";
$definitions["gambit.unread"] = "non lu";
$definitions["gambit.more results"] = "plus de résultats";

// Aliases
// These are gambits which tell the gambit system to use another gambit.
// In other words, when you type "active today", the gambit system interprets it as if you typed "active 1 day".
// The first of each pair, the alias, can be anything you want.
// The second, however, must fit with the regular expression pattern defined below (more on that later.)
$definitions["gambit.active today"] = "active aujourd'hui"; // what appears in the gambit cloud
$definitions["gambit.active 1 day"] = "active 1 jour"; // what it actually evaluates to

$definitions["gambit.has replies"] = "a des réponses";
$definitions["gambit.has >0 replies"] = "a >0 réponses";
$definitions["gambit.has >10 replies"] = "a >10 réponses";

$definitions["gambit.has no replies"] = "a aucune réponse";
$definitions["gambit.has 0 replies"] = "a 0 réponse";

$definitions["gambit.dead"] = "mort";
$definitions["gambit.active >30 day"] = "active >30 jour";

// Units of time
// These are used in the active gambit.
// ex. "[active] [>|<|>=|<=|last] 180 [second|minute|hour|day|week|month|year]"
$definitions["gambit.second"] = "seconde";
$definitions["gambit.minute"] = "minute";
$definitions["gambit.hour"] = "heure";
$definitions["gambit.day"] = "jour";
$definitions["gambit.week"] = "semaine";
$definitions["gambit.month"] = "mois";
$definitions["gambit.year"] = "année";
$definitions["gambit.last"] = "dernière"; // as in "active last 180 days"
$definitions["gambit.active"] = "active"; // as in "active last 180 days"

// Now the hard bit. This is a regular expression to test for the "active" gambit.
// The group (?<a> ... ) is the comparison operator (>, <, >=, <=, or last).
// The group (?<b> ... ) is the number (ex. 24).
// The group (?<c> ... ) is the unit of time.
// The languages of "last" and the units of time are defined above.
// However, if you need to reorder the groups, do so carefully, and make sure spaces are written as " *".
$definitions["gambit.gambitActive"] = "/^{$definitions["gambit.active"]} *(?<a>>|<|>=|<=|{$definitions["gambit.last"]})? *(?<b>\d+) *(?<c>{$definitions["gambit.second"]}|{$definitions["gambit.minute"]}|{$definitions["gambit.hour"]}|{$definitions["gambit.day"]}|{$definitions["gambit.week"]}|{$definitions["gambit.month"]}|{$definitions["gambit.year"]})/";

// These appear in the tag cloud. They must fit the regular expression pattern where the ? is a number.
// If the regular expression pattern has been reordered, these gambits must also be reordered (as well as the ones in aliases.)
$definitions["gambit.active last ? hours"] = "{$definitions["gambit.active"]} {$definitions["gambit.last"]} ? {$definitions["gambit.hour"]}s";
$definitions["gambit.active last ? days"] = "{$definitions["gambit.active"]} {$definitions["gambit.last"]} ? {$definitions["gambit.day"]}s";

// This is similar to the regular expression for the active gambit, but for the "has n reply(s)" gambit.
// Usually you just need to change the "has" and "repl".
$definitions["gambit.gambitHasNReplies"] = "/^has *(?<a>>|<|>=|<=)? *(?<b>\d+) *repl/";