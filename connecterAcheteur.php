<?php

// récupérer les informations envoyées depuis le formulaire 
$email=isset($_POST['email'])?$_POST['email']:"";
$motDePasse=isset($_POST['motDePasse'])?$_POST['motDePasse']:"";

//Vérifier que tous les champs sont bien remplis. Dans le cas contraire, afficher un message d’erreur indiquant quel champ est vide.
$erreur = "";
if ($email == "") {
$erreur .= "Le champ email est vide. <br>";
}
if ($motDePasse == "") {
$erreur .= "Le champ mot de passe est vide. <br>";
}
//blindage sur quelconque erreur sur le remplissage du formulaire
if ($erreur == "") {
echo "Bienvenue " .$email;
} else {
echo "Erreur: <br>" . $erreur;
}

//verifier que si tous les champs sont remplies email+mdp = a un compte contenu dans la BDD

                        


?>