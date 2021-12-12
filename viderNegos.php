<?php
session_start();
$id_acheteur=$_SESSION['id_acheteur'];

$database = "shopping";
//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

//echo "rentre ici ";
if ($db_found) {


	$sql = "SELECT * from panier where id_acheteur='$id_acheteur' ";
	$resultArticle = mysqli_query($db_handle, $sql);
	while($data=mysqli_fetch_assoc($resultArticle))
	{
		echo "un article panier  ";
		$idart=$data['id_article'];
		$sql2 = "SELECT * from article_vendeur where (id_article='$idart' and categorie_achat='negociable')";
		$resultArticle2 = mysqli_query($db_handle, $sql2);
		
		while($data2=mysqli_fetch_assoc($resultArticle2))
		{
			echo "un article artcile vendeur  ";
			$articleSupp = $data2['id_article'];
			$sql3 = "DELETE FROM panier WHERE (id_acheteur='$id_acheteur' and id_article='$articleSupp' ) ";
			$resultArticle3 = mysqli_query($db_handle, $sql3);

			$sql4 = "DELETE FROM nego WHERE (id_acheteur='$id_acheteur' and id_article='$articleSupp') ";
			$resultArticle4 = mysqli_query($db_handle, $sql4);
		}
	}
	
	$sql = "SELECT * from panier where id_acheteur='$id_acheteur' ";
	$resultArticle = mysqli_query($db_handle, $sql);
	while($data=mysqli_fetch_assoc($resultArticle))
	{
		$idart=$data['id_article'];
		$sql2 = "SELECT * from article_admin where (id_article='$idart' and categorie_achat='negociable')";
		$resultArticle2 = mysqli_query($db_handle, $sql2);
		
		while($data2=mysqli_fetch_assoc($resultArticle2))
		{
			$articleSupp = $data2['id_article'];
			$sql3 = "DELETE FROM panier WHERE (id_acheteur='$id_acheteur' and id_article='$articleSupp' ) ";
			$resultArticle3 = mysqli_query($db_handle, $sql3);

			$sql4 = "DELETE FROM nego WHERE (id_acheteur='$id_acheteur' and id_article='$articleSupp') ";
			$resultArticle4 = mysqli_query($db_handle, $sql4);
		}
	}

	header('Location: Panier_acheteur.php?');

}
?>