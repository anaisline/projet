<?php
session_start();
$id_admin=$_SESSION['id_admin'];
$id_article=$_GET['id_article'];
$id_acheteur=$_GET['id_acheteur'];

$database = "shopping";
//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

?>

<?php


	if ($db_found) {

		$sqlL = "SELECT * FROM nego WHERE id_article LIKE '%$id_article%' and id_vendeur LIKE '%$id_admin%' and id_acheteur LIKE '%$id_acheteur%'";
			$resultL = mysqli_query($db_handle, $sqlL);
        	$data=mysqli_fetch_assoc($resultL);
        	
        	if (mysqli_num_rows($resultL) != 0 ) {

        	$accepte=2;


            $sql="UPDATE nego SET accepte='$accepte' WHERE id_acheteur='$id_acheteur' AND id_article='$id_article' AND id_vendeur='$id_admin'";
            $result = mysqli_query($db_handle,$sql);

            $compt=5;

            $sqlCompt="UPDATE nego SET compteur='$compt' WHERE id_acheteur='$id_acheteur' AND id_article='$id_article' AND id_vendeur='$id_admin' ";
            $resultCompt = mysqli_query($db_handle,$sqlCompt);
        	

        	header('Location: notifAdmin.php?');/*verifier que ce soit le bon lien*/

        	}
        	else
        	{
        		echo "Ne trouve pas l article a negocier";
        	}
	
	}
	else{
		echo "Probleme de connexion";
	}




?>