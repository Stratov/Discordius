<?php
header('Content-Type: text/html; charset=ISO-8859-1'); 
defined( 'SYSPATH' ) or die( 'No direct access allowed.' );
 
class Jquetes_Controller extends Authentic_Controller {
 
	public function index()
	{
		$dbq1 = new Database();  
		$queteencours = $dbq1->query(
			'SELECT title FROM quetes JOIN users_quetes ON quetes.id_quete = users_quetes.quete_id WHERE users_quetes.status = "1" AND users_quetes.user_id = "'.$this->user->id.'"');
		$dbq2 = new Database();  
		$quetevalidee = $dbq2->query(
			'SELECT title FROM quetes JOIN users_quetes ON quetes.id_quete = users_quetes.quete_id WHERE users_quetes.status = "2" AND users_quetes.user_id = "'.$this->user->id.'"');
		$noencours = true;
		$novalidee = true;
?>

		<div style="border-width: 2px; border-style: dashed; border-color: black; "><h1><u><center>Journal des quêtes</center></u></h1><br>
			<TABLE BORDER=5 BORDERCOLOR="red"><TR><TD><center><font color=red><b><u>Quêtes en cours :</b></u></font><br></br></center>
			<?php foreach ($queteencours as $encours) : ?>
				<?php echo "<b>".$encours->title."</b>"; $noencours = false;?>
			<?php endforeach ?>
			<?php if($noencours): ?>
				<b>Aucune quête en cours</b>
			<?php endif ?><br></TR></TD></TABLE></center>
			<br></br>
			<TABLE BORDER=5 BORDERCOLOR="green"><TR><TD><center><font color=green><u><b>Quêtes validées :</b></u></font><br></br></center>
			<?php foreach ($quetevalidee as $validee) : ?>
				<b><?php echo "".$validee->title.""; $novalidee = false;?></b>
			<?php endforeach ?>
			<?php if($novalidee): ?>
				<b>Aucune quête validée</b>
			<?php endif ?><br></TR></TD></TABLE></center><br>
		<?php
	}
} 
?>