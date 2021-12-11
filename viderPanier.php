<?php
session_start();
$id_acheteur=$_SESSION['id_acheteur'];

$database = "shopping";
//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


if ($db_found) {

	$sql = "DELETE FROM panier WHERE id_acheteur='$id_acheteur'";
			$resultArticle = mysqli_query($db_handle, $sql);

			header('Location: Panier_acheteur.php?');

}
?>