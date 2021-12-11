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

	$sql="SELECT * FROM enchere where id_article = $id_article
	and prix_max = (SELECT max(prix_max) from enchere)";
	$resultat = mysqli_query($db_handle, $sql);

	if (mysqli_num_rows($resultat) != 0) {

		while ($ligne = $resultat -> fetch_assoc()) {

			$sql = "DELETE FROM enchere, panier where enchere.id_article = panier.id_article
			and enchere.id_acheteur = panier.id_acheteur";
			$resultat = mysqli_query($db_handle, $sql);

			if($ligne['id_acheteur'] == $id_acheteur){
				$prix_final = $ligne['prix_max'];
				header('Location: EncheresAcheteurResultVictoire.php?prix_final='.$prix_final);
			}
			else{
				header('Location: EncheresAcheteurResultDefaite.php');
			}
		}
	}
}


?>

