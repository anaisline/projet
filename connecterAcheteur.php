<?php

// récupérer les informations envoyées depuis le formulaire 
$mail=isset($_POST['mail'])?$_POST['mail']:"";
$mdp=isset($_POST['mdp'])?$_POST['mdp']:"";

//identifier BDD
$database = "shopping";
//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

//Vérifier que tous les champs sont bien remplis. Dans le cas contraire, afficher un message d’erreur indiquant quel champ est vide.
$erreur = "";
if ($mail == "") {
    $erreur .= "Le champ email est vide. <br>";
}
if ($mdp == "") {
    $erreur .= "Le champ mot de passe est vide. <br>";
}
//blindage sur quelconque erreur sur le remplissage du formulaire
if ($erreur == "") {
} else {
    echo "Erreur: <br>" . $erreur;
}

//verifier que si tous les champs sont remplies email+mdp = a un compte contenu dans la BDD
if ($db_found) {


    $sql = "SELECT * FROM acheteur";
    if ($mail != "") {
        //on cherche l'email
        $sql .= " WHERE mail LIKE '%$mail%'";
//et le mdp
        if ($mdp != "") {
            $sql .= " AND mdp LIKE '%$mdp%'";
        }
    }
    $result = mysqli_query($db_handle, $sql);
//regarder s'il y a des resultats  : si pas de resultats
    if (mysqli_num_rows($result) == 0) {
        //on regarde pr les admin
        $sql = "SELECT * FROM administrateur";
        if ($mail != "") {
        //on cherche l'email
            $sql .= " WHERE mail LIKE '%$mail%'";
//et le mdp
            if ($mdp != "") {
                $sql .= " AND mdp LIKE '%$mdp%'";
            }
        }
        $result = mysqli_query($db_handle, $sql);
        if (mysqli_num_rows($result) == 0) {
            //on regarde chez les vendeurs
            $sql = "SELECT * FROM vendeur";
            if ($mail != "") {
                //on cherche l'email
                $sql .= " WHERE mail LIKE '%$mail%'";
                //et le mdp
                if ($mdp != "") {
                    $sql .= " AND mdp LIKE '%$mdp%'";
                }
            }
            $result = mysqli_query($db_handle, $sql);
             if (mysqli_num_rows($result) == 0) {
                echo "connexion échouée";
             }
             else
             {
               header('Location: accueilVendeur.html');
             }

        }
        else {
            header('Location: accueilAdmin.html');

        }

    } else {
        header('Location: accueilAcheteur.html');
  exit();
    }
}else
{
    echo "BDD ne fonctionne pas ";
}



?>