<?php
session_start();
$id_acheteur=$_SESSION['id_acheteur'];
$id_article=$_SESSION['id_article'];
$id_vendeur=$_SESSION['id_vendeur'];

$database = "shopping";
//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

?>

<?php

	
	if ($db_found) {


			$sqlL = "SELECT * FROM nego WHERE id_article LIKE '%$id_article%' and id_vendeur LIKE '%$id_vendeur%' and id_acheteur LIKE '%$id_acheteur%'";
			$resultL = mysqli_query($db_handle, $sqlL);
        	$data=mysqli_fetch_assoc($resultL);
        	
        	if (mysqli_num_rows($resultL) != 0 ) {


            $sql="DELETE from nego WHERE (id_acheteur = '$id_acheteur') AND (id_article='$id_article') AND (id_vendeur='$id_vendeur')";
            $result = mysqli_query($db_handle,$sql);

            $sql="DELETE from panier WHERE (id_acheteur = '$id_acheteur') AND (id_article='$id_article')";
            $result = mysqli_query($db_handle,$sql);


        	header('Location: Panier_Acheteur.php?');/*verifier que ce soit le bon lien*/

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