<?php
session_start();
// récupérer les informations envoyées depuis le formulaire 
$mail=isset($_POST['mail'])?$_POST['mail']:"";
$mdp=isset($_POST['mdp'])?$_POST['mdp']:"";

//identifier BDD
$database = "shopping";
//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

//Vérifier que tous les champs sont bien remplis. Dans le cas contraire, afficher un message d’erreur indiquant quel champ est vide.

if ($mail == "") {
    header('Location: connexionAcheteur.php?erreur=1');
}
else if ($mdp == "") {
    header('Location: connexionAcheteur.php?erreur=1');
}
else
{

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

                header('Location: connexionAcheteur.php?erreur=1');
            }
            else
            {
                $sql = "SELECT id_vendeur as ida FROM vendeur WHERE (mdp='$mdp' and mail='$mail') ";
                $result = mysqli_query($db_handle, $sql);
                $data = mysqli_fetch_array($result);
                $_SESSION['id_vendeur']=$data['ida'];
                header('Location: accueilVendeur.php?');
                exit();
            }

        }
        else {
            $sql = "SELECT id_admin as ida FROM administrateur WHERE (mdp='$mdp' and mail='$mail') ";
            $result = mysqli_query($db_handle, $sql);
            $data = mysqli_fetch_array($result);
            $_SESSION['id_admin']=$data['ida'];
            header('Location: accueilAdmin.php?');
            exit();

        }

    } else {
        $sql = "SELECT id_acheteur as ida FROM acheteur WHERE (mdp='$mdp' and mail='$mail') ";
        $result = mysqli_query($db_handle, $sql);
        $data = mysqli_fetch_array($result);
        $_SESSION['id_acheteur']=$data['ida'];
        header('Location: accueilAcheteur.php?' );
    }
}else
{
    echo "BDD ne fonctionne pas ";
}

 
}



?>