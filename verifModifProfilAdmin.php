<?php
session_start();
$id_admin=$_SESSION['id_admin'];
// récupérer les informations envoyées depuis le formulaire 
$photo=isset($_POST['photo'])?$_POST['photo']:"";
$nom=isset($_POST['nom'])?$_POST['nom']:"";
$prenom=isset($_POST['nom'])?$_POST['nom']:"";
$description=isset($_POST['description'])?$_POST['description']:"";
$mail=isset($_POST['mail'])?$_POST['mail']:"";
$mdp=isset($_POST['mdp'])?$_POST['mdp']:"";
$tel=isset($_POST['tel'])?$_POST['tel']:"";

//identifier BDD
$database = "shopping";
//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


if (isset($_POST["bouton2"])){


    if ($db_found) {

        if($photo!="")
        {
            $sql="UPDATE administrateur SET photo='$photo' WHERE id_admin='$id_admin' ";
            $result = mysqli_query($db_handle,$sql);
        }
        if($nom!="")
        {
            $sql="UPDATE administrateur SET nom='$nom' WHERE id_admin='$id_admin' ";
            $result = mysqli_query($db_handle,$sql);
        }
        if($prenom!="")
        {
            $sql="UPDATE administrateur SET prenom='$prenom' WHERE id_admin='$id_admin' ";
            $result = mysqli_query($db_handle,$sql);
        }
        if($description!="")
        {
            $sql="UPDATE administrateur SET description='$description' WHERE id_admin='$id_admin' ";
            $result = mysqli_query($db_handle,$sql);
        }
        if($mdp!="")
        {
            $sql="UPDATE administrateur SET mdp='$mdp' WHERE id_admin='$id_admin' ";
            $result = mysqli_query($db_handle,$sql);
        }
        if($tel!="")
        {
            $sql="UPDATE administrateur SET tel='$tel' WHERE id_admin='$id_admin' ";
            $result = mysqli_query($db_handle,$sql);
        }
        if($mail!="")
        {
        $//on cherche si un compte avec cet email existe deja parmi les acheteurs
        $sql = "SELECT * FROM acheteur WHERE  (mail LIKE '%$mail%')  ";
        $resultAcheteur = mysqli_query($db_handle, $sql);
        //regarder s'il y a de resultat

        //on cherche si un compte avec cet email existe deja parmi les vendeurs
        $sql = "SELECT * FROM vendeur WHERE ( mail LIKE '%$mail%' )";
        $resultVendeur = mysqli_query($db_handle, $sql);
        //regarder s'il y a de resultat

        //on cherche si un compte avec cet email existe deja parmi les admin
        $sql = "SELECT * FROM administrateur WHERE  ( id_admin!='$id_admin' and mail LIKE '%$mail%') ";
        $resultAdmin = mysqli_query($db_handle, $sql);

        //regarder s'il y a de resultat
        if (mysqli_num_rows($resultAcheteur) != 0 || mysqli_num_rows($resultVendeur) != 0 || mysqli_num_rows($resultAdmin) != 0) {
            $erreur=1;
        }
        else
        {
            $erreur=0;
            $sql="UPDATE administrateur SET mail='$mail' WHERE id_admin='$id_admin' ";
            $result = mysqli_query($db_handle,$sql);
        }

    }
    if($erreur==0)
    {
        header('Location: profil_admin.php?erreur=0');
    }
    else
    {
         header('Location: profil_admin.php?erreur=1');
    }
    
    
}


}

if (isset($_POST["bouton3"])){

    if ($db_found) {

        $sql="UPDATE administrateur SET photo='' WHERE id_admin='$id_admin' ";
        $result = mysqli_query($db_handle,$sql);
        header('Location: profil_admin.php?');
    }
}





?>