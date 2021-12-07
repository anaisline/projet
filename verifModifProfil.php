<?php
session_start();
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

//Vérifier que tous les champs sont bien remplis. Dans le cas contraire, afficher un message d’erreur indiquant quel champ est vide.


//verifier que si tous les champs sont remplies email+mdp = a un compte contenu dans la BDD
if ($db_found) {


 
}



?>