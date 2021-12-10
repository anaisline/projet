<?php
session_start();
$id_acheteur=$_SESSION['id_acheteur'];

$id_article = $_SESSION['id_article'];
$id_vendeur = $_SESSION['id_vendeur'];
$prix_init = $_SESSION['prix_init'];
$date_fin = $_SESSION['date_fin'];

$prix_max=isset($_POST['prix_max'])?$_POST['prix_max']:"";

date_default_timezone_set('Europe/Amsterdam');
$DateAndTime = date('d-m-Y h:i:s a', time());  
echo "The current date and time are $DateAndTime.";

$database = "shopping";
//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if($db_found){
		//Enregistrement de l'entrée en enchères
	//On verifie que l'acheteur n'ai pas déjà lancé les encheres de cet article

	if ($prix_max > $prix_init) {
		$sql = "SELECT * FROM enchere where id_acheteur = $id_acheteur
		and id_article = $id_article
		and id_vendeur = $id_vendeur";
		$result = mysqli_query($db_handle, $sql);

		if (mysqli_num_rows($result) != 0) { //Si il n'est pas présent on l'ajoute dans la table enchere
			header('Location: Panier_Acheteur.php?erreur=1');
		}
		else{
			$sql = "INSERT INTO enchere (id_article, id_acheteur, id_vendeur, prix_max, prix_init, date_fin) 
			VALUES ($id_article, $id_acheteur, $id_vendeur, $prix_max, $prix_init, '$date_fin')";
			echo $sql;
			$result = mysqli_query($db_handle, $sql);

			header('Location: Panier_Acheteur.php');
		}
	}
	else{
		header('Location: EncheresAcheteurVend.php?id_article='.$id_article.'&id_vendeur='.$id_vendeur.'&prix_init='.$prix_init.'&date_fin='.$date_fin.'&erreur=1');
	}

		
}

?>

