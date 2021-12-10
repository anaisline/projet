<?php
session_start();
$id_acheteur=$_SESSION['id_acheteur'];
?>

<?php

$database = "shopping";
//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$nom=isset($_POST['nom'])?$_POST['nom']:"";
	$prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
	$adresse_l1=isset($_POST['adresse_l1'])?$_POST['adresse_l1']:"";
	$adresse_l2=isset($_POST['adresse_l2'])?$_POST['adresse_l2']:"";
	$ville=isset($_POST['ville'])?$_POST['ville']:"";
	$code_postal=isset($_POST['code_postal'])?$_POST['code_postal']:"";
	$tel=isset($_POST['tel'])?$_POST['tel']:"";
	$type=isset($_POST['type'])?$_POST['type']:"";
	$numero_cb=isset($_POST['numero_cb'])?$_POST['numero_cb']:"";
	$nomCarte=isset($_POST['nomCarte'])?$_POST['nomCarte']:"";
	$dateExp=isset($_POST['dateExp'])?$_POST['dateExp']:"";
	$code_secu=isset($_POST['code_secu'])?$_POST['code_secu']:"";

if (isset($_POST["acheter"])) {


	if ($db_found) {

	//Vérifier que tous les champs sont bien remplis. Dans le cas contraire, afficher un message d’erreur indiquant quel champ est vide.//blindage
	$erreur = "";
	if ($nom == "") {
		$erreur .= "Le champ nom est vide. <br>";
	}
	if ($prenom == "") {
		$erreur .= "Le champ prenom est vide. <br>";
	}
	if ($adresse_l1 == "") {
		$erreur .= "Le champ adresse 1 est vide. <br>";
	}
	if ($ville == "") {
		$erreur .= "Le champ ville est vide. <br>";
	}
	if ($code_postal == "") {
		$erreur .= "Le champ code postal est vide. <br>";
	}
	if ($tel == "") {
		$erreur .= "Le champ telephone est vide. <br>";
	}
	if ($type == "") {
		$erreur .= "Le champ type de carte est vide. <br>";
	}
	if ($numero_cb == "") {
		$erreur .= "Le champ numero de carte est vide. <br>";
	}
	if ($nomCarte == "") {
		$erreur .= "Le champ nom de la carte est vide. <br>";
	}
	if ($dateExp == "") {
		$erreur .= "Le champ date d expiration est vide. <br>";
	}
	if ($code_secu == "") {
		$erreur .= "Le champ code de securite est vide. <br>";
	}
	if ($erreur == "") {
		echo "Toutes les informations sont rentrees";//a voir pour remplacer

		if($nom!="")
        {
            $sql="UPDATE acheteur SET nom='$nom' WHERE id_acheteur='$id_acheteur' ";
            $result = mysqli_query($db_handle,$sql);
        }
        if($prenom!="")
        {
            $sql="UPDATE acheteur SET prenom='$prenom' WHERE id_acheteur='$id_acheteur' ";
            $result = mysqli_query($db_handle,$sql);
        }
        if($adresse_l1!="")
        {
            $sql="UPDATE adresse SET adresse_l1='$adresse_l1' WHERE id_adresse=(select id_adresse from acheteur where id_acheteur='$id_acheteur') ";
            $result = mysqli_query($db_handle,$sql);
        }
        if($adresse_l2!="")
        {
            $sql="UPDATE adresse SET adresse_l2='$adresse_l2' WHERE id_adresse=(select id_adresse from acheteur where id_acheteur='$id_acheteur') ";
            $result = mysqli_query($db_handle,$sql);
        }
        if($ville!="")
        {
            $sql="UPDATE adresse SET ville='$ville' WHERE id_adresse=(select id_adresse from acheteur where id_acheteur='$id_acheteur') ";
            $result = mysqli_query($db_handle,$sql);
        }
        if($code_postal!="")
        {
            $sql="UPDATE adresse SET code_postal='$code_postal' WHERE id_adresse=(select id_adresse from acheteur where id_acheteur='$id_acheteur') ";
            $result = mysqli_query($db_handle,$sql);
        }
        if($tel!="")
        {
            $sql="UPDATE acheteur SET tel='$tel' WHERE id_acheteur='$id_acheteur' ";
            $result = mysqli_query($db_handle,$sql);
        }
        if($type!="")
        {
            $sql="UPDATE cb SET type='$type' WHERE id_acheteur='$id_acheteur' ";
            $result = mysqli_query($db_handle,$sql);
        }
        if($numero_cb!="")
        {
            $sql="UPDATE cb SET numero_cb='$numero_cb' WHERE id_acheteur='$id_acheteur' ";
            $result = mysqli_query($db_handle,$sql);
        }
        if($nomCarte!="")
        {
            $sql="UPDATE cb SET nom='$nomCarte' WHERE id_acheteur='$id_acheteur' ";
            $result = mysqli_query($db_handle,$sql);
        }
        if($dateExp!="")
        {
            $sql="UPDATE cb SET dateExp='$dateExp' WHERE id_acheteur='$id_acheteur' ";
            $result = mysqli_query($db_handle,$sql);
        }
        if($code_secu!="")
        {
            $sql="UPDATE cb SET code_secu='$code_secu' WHERE id_acheteur='$id_acheteur' ";
            $result = mysqli_query($db_handle,$sql);
        }

		do
		{
			$sql = "SELECT * FROM panier";
        	if ($id_acheteur != " ") {
				$sql .= " WHERE id_acheteur LIKE '%$id_acheteur%'";					
			}
			$resultPanier = mysqli_query($db_handle, $sql);
			if(mysqli_num_rows($resultPanier) != 0)
			{
				$sql= "DELETE FROM panier";
				if ($id_acheteur != " ") {
					$sql .= " WHERE id_acheteur LIKE '%$id_acheteur%'";	

				}
				$result =mysqli_query($db_handle, $sql);
				echo "<p>Suppression des articles du panier successfull.</p>";
			}
				
		}while(mysqli_num_rows($resultPanier) != 0);

		
        header('Location: Panier_Acheteur.php?');/*verifier que ce soit le bon lien*/
        

	}
	else
	{
		echo "erreur: " .$erreur;
	}

	}
	else
	{
		echo "pb de connexion";
	}


}

?>