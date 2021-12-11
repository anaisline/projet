<?php
session_start();
$id_acheteur=$_SESSION['id_acheteur'];

$id_article = $_GET['id_article'];
$id_vendeur = $_GET['id_vendeur'];
$prix_init = $_GET['prix_init'];
$date_fin = $_GET['date_fin'];

$database = "shopping";
//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if($db_found){

	$sql = "SELECT * FROM enchere where id_article = $id_article";
	$resultat = mysqli_query($db_handle, $sql);
	if(mysqli_num_rows($resultat) != 0){ //Si l'article a bien été lancé dans les enchères

		$sql="SELECT * FROM enchere where id_article = $id_article
		and prix_max = (SELECT max(prix_max) from enchere)";
		$resultat1 = mysqli_query($db_handle, $sql);

		if (mysqli_num_rows($resultat) > 1) { //Si il y a plus d'un seul participant

			while ($ligne = $resultat -> fetch_assoc()) {

				$recupArt = $ligne['id_article'];
				$recupAch = $ligne['id_acheteur'];
				$sql = "DELETE FROM panier where id_article = $recupArt";
				$sql = "DELETE FROM enchere where id_article = $recupArt";
				$resultat = mysqli_query($db_handle, $sql);

				echo $sql;

				if($ligne['id_acheteur'] == $id_acheteur){

					$prix_final = $ligne['prix_max'] + 1;
					header('Location: EncheresAcheteurResultVictoire.php?prix_final='.$prix_final);
				}
				else{

					header('Location: EncheresAcheteurResultDefaite.php');
				}
			}
		}
		elseif (mysqli_num_rows($resultat) == 1) { //Si il n'y a qu'un seul participant (il a forcément gagné sans ré encherir)
			$sql = "DELETE FROM panier where id_article = $id_article";
			$resultat2 = mysqli_query($db_handle, $sql);
			$sql = "DELETE FROM enchere where id_article = $id_article";
			$resultat2 = mysqli_query($db_handle, $sql);

			header('Location: EncheresAcheteurResultVictoire.php?prix_final='.$prix_init);
		}
	}
	else{
		header('Location: Panier_Acheteur.php?erreur=2');
	}
}


?>

