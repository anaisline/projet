<?php
session_start();
// récupérer les informations envoyées depuis le formulaire 
$id_acheteur=$_SESSION['id_acheteur'];
$id_article = $_GET['id_article'];



//identifier BDD
$database = "shopping";
//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if($id_acheteur != "" and $id_article != "")
{
		if($db_found) {

			$sql="SELECT * from panier where id_article = $id_article and id_acheteur = $id_acheteur";
			$result=mysqli_query($db_handle, $sql);
			if (mysqli_num_rows($result) == 0){
				$sql="INSERT INTO panier (id_article, id_acheteur) VALUES ($id_article, $id_acheteur)";
				$result=mysqli_query($db_handle, $sql);
				header('Location: VisiteProfilAdminCo.php');
			}
			else{
				header('Location: VisiteProfilAdminCo.php?erreur=1');
			}
		}
}
else{
	echo "Problème de passage d informations";
}


?>