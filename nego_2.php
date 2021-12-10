<?php
session_start();
$id_acheteur=$_SESSION['id_acheteur'];
$id_article=$_GET['id_article'];

$database = "shopping";
//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

?>

<?php

$offre=isset($_POST['offre'])?$_POST['offre']:"";

if (isset($_POST["envoyer"])) {


	if ($db_found) {

	//Vérifier que tous les champs sont bien remplis. Dans le cas contraire, afficher un message d’erreur indiquant quel champ est vide.//blindage
	$erreur = "";
	if ($offre == "") {
		$erreur .= "Le champ offre est vide. <br>";
	}
	if ($erreur == "") {
		echo "Toutes les informations sont rentrees";//a voir pour remplacer

		if($offre!="")
        {
            $sql="UPDATE nego SET offre='$offre' WHERE id_acheteur='$id_acheteur' AND id_article='$id_article' ";
            $result = mysqli_query($db_handle,$sql);
        }

		
        header('Location: Panier_Acheteur.php?');/*verifier que ce soit le bon lien*/
        
		}
		else
		{
		echo "erreur: " .$erreur;
		}

	}
	else
	{
		echo "pb de connexion";
	}


}

?>