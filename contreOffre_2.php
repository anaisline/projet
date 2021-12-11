<?php
session_start();
$id_vendeur=$_SESSION['id_vendeur'];
$id_article=$_SESSION['id_article'];
$id_acheteur=$_SESSION['id_acheteur'];

$database = "shopping";
//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

?>

<?php


if (isset($_POST["envoyer"])) {
	
	if ($db_found) {

		$offre=isset($_POST['offre'])?$_POST['offre']:"";

		//Vérifier que tous les champs sont bien remplis. Dans le cas contraire, afficher un message d’erreur indiquant quel champ est vide.//blindage
		$erreur = "";
		if ($offre == "") {
			$erreur .= "Le champ offre est vide. <br>";
		}
		if ($erreur == "") {
			echo "Toutes les informations sont rentrees";//a voir pour remplacer

			if($offre!="")
       		{
        	//on cherche si un article avec ce nom existe bien
			$sqlL = "SELECT * FROM nego WHERE id_article LIKE '%$id_article%' and id_vendeur LIKE '%$id_vendeur%' and id_acheteur LIKE '%$id_acheteur%'";
			$resultL = mysqli_query($db_handle, $sqlL);
        	$data=mysqli_fetch_assoc($resultL);
        	
        	if (mysqli_num_rows($resultL) != 0 ) {
            
            $sql="UPDATE nego SET offre='$offre' WHERE id_acheteur='$id_acheteur' AND id_article='$id_article' ";
            $result = mysqli_query($db_handle,$sql);

            $compt=$data['compteur'];
            $compt++;

            $sqlCompt="UPDATE nego SET compteur='$compt' WHERE id_acheteur='$id_acheteur' AND id_article='$id_article' ";
            $resultCompt = mysqli_query($db_handle,$sqlCompt);
        	}

       		}

 		header('Location: notifVendeur.php?');/*verifier que ce soit le bon lien*/
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






