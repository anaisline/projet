<?php
session_start();
$id_acheteur=$_SESSION['id_acheteur'];

//identifier BDD
$database = "shopping";
		//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


if (isset($_POST["supp"])) {

	if($db_found)
	{
		$mot_cle_1=isset($_POST['mot_cle_1'])?$_POST['mot_cle_1']:"";
		$mot_cle_2=isset($_POST['mot_cle_2'])?$_POST['mot_cle_2']:"";
		$mot_cle_3=isset($_POST['mot_cle_3'])?$_POST['mot_cle_3']:"";
		$categorie_achat=isset($_POST['categorie_achat'])?$_POST['categorie_achat']:"";
		$categorie_type=isset($_POST['categorie_type'])?$_POST['categorie_type']:"";

		if($mot_cle_2=="")
		{
			$mot_cle_2=NULL;
		}
		if($mot_cle_3=="")
		{
			$mot_cle_3=NULL;
		}

		//on cherche si une alerte de la sorte n'existe pas déjà
		$sql = "SELECT * FROM alerte WHERE id_acheteur='$id_acheteur' and mot_cle_1='$mot_cle_1' and mot_cle_2='$mot_cle_2' and mot_cle_3='$mot_cle_3' and categorie_achat='$categorie_achat' and categorie_type='$categorie_type'";
		$resultArticle = mysqli_query($db_handle, $sql);
						//regarder s'il y a de resultat
		if (mysqli_num_rows($resultArticle) != 0 ) {

			$sql = "DELETE FROM alerte WHERE id_acheteur='$id_acheteur' and mot_cle_1='$mot_cle_1' and mot_cle_2='$mot_cle_2' and mot_cle_3='$mot_cle_3' and categorie_achat='$categorie_achat' and categorie_type='$categorie_type'";
			$resultArticle = mysqli_query($db_handle, $sql);

			header('Location: notifications.php?');

		}
		else
		{
			header('Location: formulaire_notifs.php?erreur=1');
		}

		

	}




}

?>