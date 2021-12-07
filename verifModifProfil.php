<?php
session_start();
$id_vendeur=$_SESSION['id_vendeur'];
// récupérer les informations envoyées depuis le formulaire 
$photo=isset($_POST['photo'])?$_POST['photo']:"";
$nom=isset($_POST['nom'])?$_POST['nom']:"";
$prenom=isset($_POST['nom'])?$_POST['nom']:"";
$description=isset($_POST['description'])?$_POST['description']:"";

//identifier BDD
$database = "shopping";
//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);



if ($db_found) {

    if($photo!="")
    {
        $sql="UPDATE vendeur SET photo='$photo' WHERE id_vendeur='$id_vendeur' ";
    }
    if($nom!="")
    {
        $sql="UPDATE vendeur SET nom='$nom' WHERE id_vendeur='$id_vendeur' ";
    }
    if($prenom!="")
    {
        $sql="UPDATE vendeur SET prenom='$prenom' WHERE id_vendeur='$id_vendeur' ";
    }
    if($description!="")
    {
        $sql="UPDATE vendeur SET description='$description' WHERE id_vendeur='$id_vendeur' ";
    }

    header('Location: profil_vendeur.php?');
}



?>