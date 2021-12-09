<?php
session_start();
$id_admin=$_SESSION['id_admin'];

//identifier BDD
$database = "shopping";
//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$nom=isset($_POST['nom'])?$_POST['nom']:"";
$categorie_type=isset($_POST['categorie_type'])?$_POST['categorie_type']:"";
$categorie_achat=isset($_POST['categorie_achat'])?$_POST['categorie_achat']:"";

if (isset($_POST["buton5"])){
	if($db_found)
	{
		$erreur=0;
		$sql = "SELECT id_admin as ida from article_admin WHERE (nom='$nom' and categorie_type='$categorie_type' and categorie_achat='$categorie_achat' )";
		$result = mysqli_query($db_handle, $sql);
		$data = mysqli_fetch_array($result);
		if (mysqli_num_rows($result) == 0) {

			$erreur= 1;
		}
		else
		{
			$_SESSION['id_articleAModifAdmin']=$data['ida'];
		}
		if($erreur==0)
		{
			header('Location: pageModifArticleAdmin.php?');

		}
		else
		{
			header('Location: modifierArticlesAdmin.php?erreur=1');
		}
	}

}


?>