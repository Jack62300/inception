<?php 
require_once('function.php');
if(isset($_GET['action']))
{
	switch($_GET['action'])
	{
	
		// ajout du formulaire html à la base de données 
		case 'douane':
		// verification des champs post pour vérifier qu'ils ne soie pas vide .
			if(!empty($_POST['pseudo_d']) && !empty($_POST['age']) && !empty($_POST['conn']) && !empty($_POST['steam']) && !empty($_POST['pseudorp']) && !empty($_POST['agerp']) && !empty($_POST['background']) && !empty($_POST['objectif']) && !empty($_POST['powergaming']) && !empty($_POST['nofear']) && !empty($_POST['metagame']))
			{
				
				
				$form_add = $sql->prepare
				('INSERT INTO douane(pseudo_d,agehrp,conn,steamid,pseudorp,agerp,background,objectif,powergame,nofear,metagaming,status,douanier,commentaire_douane) 
				VALUES(:pseudo_d,:agehrp,:conn,:steamid,:pseudorp,:agerp,:background,:objectif,:powergame,:nofear,:metagaming,:status,:douanier,:commentaire_douane)');
				$form_add->execute(array(
				'pseudo_d' 				=> htmlentities($_POST['pseudo_d']),
				'agehrp'				=> htmlentities($_POST['age']),
				'conn'					=> htmlentities($_POST['conn']),
				'steamid'				=> htmlentities($_POST['steam']),
				'pseudorp'				=> htmlentities($_POST['pseudorp']),
				'agerp'					=> htmlentities($_POST['agerp']),
				'background'			=> htmlentities($_POST['background']),
				'objectif'				=> htmlentities($_POST['objectif']),
				'powergame'				=> htmlentities($_POST['powergaming']),
				'nofear'				=> htmlentities($_POST['nofear']),
				'metagaming'			=> htmlentities($_POST['metagame']),
				'status'				=> "0",
				'douanier'				=> "",
				'commentaire_douane'	=> ""
				
				));
				// 
				$text = "Nous confirmons ta demande de visa bon courage pour la suite des douanes, penses à bien lire le règlement et à te placer en salle d'attente quand tu sera prêt.";
				$pseudo_bot = "Service des douanes";
				
				
				postToDiscord($_POST['pseudorp'].'('.$_POST['pseudo_d'].')```'.$text.'```',$url_discord2,$pseudo_bot);
				echo '<script type="text/javascript">alert("Votre demande de visas est prise en compte merci de vous placer en salle d\'attente aprés avoir lut le réglement  ");</script>';
			}
				
		
		
		break;
		
	}
}