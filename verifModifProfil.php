<?php
session_start();
$id_vendeur=$_SESSION['id_vendeur'];
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
$erreur=0;

if (isset($_POST["bouton1"])){


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
        if($mdp!="")
        {
            $sql="UPDATE vendeur SET mdp='$mdp' WHERE id_vendeur='$id_vendeur' ";
        }
        if($tel!="")
        {
            $sql="UPDATE vendeur SET tel='$tel' WHERE id_vendeur='$id_vendeur' ";
        }
        if($mail!="")
        {
        $//on cherche si un compte avec cet email existe deja parmi les acheteurs
        $sql = "SELECT * FROM acheteur WHERE mail LIKE '%$mail%'";
        $resultAcheteur = mysqli_query($db_handle, $sql);
        //regarder s'il y a de resultat

        //on cherche si un compte avec cet email existe deja parmi les vendeurs
        $sql = "SELECT * FROM vendeur WHERE mail LIKE '%$mail%'";
        $resultVendeur = mysqli_query($db_handle, $sql);
        //regarder s'il y a de resultat

        //on cherche si un compte avec cet email existe deja parmi les admin
        $sql = "SELECT * FROM administrateur WHERE mail LIKE '%$mail%'";
        $resultAdmin = mysqli_query($db_handle, $sql);

        //regarder s'il y a de resultat
        if (mysqli_num_rows($resultAcheteur) != 0 || mysqli_num_rows($resultVendeur) != 0 || mysqli_num_rows($resultVendeur) != 0) {
            $erreur=1;
        }
        else
        {
            $sql="UPDATE vendeur SET description='$description' WHERE id_vendeur='$id_vendeur' ";
        }

    }
    if($erreur==0)
    {
        header('Location: profil_vendeur.php?erreur=0');
    }
    else
    {
         header('Location: profil_vendeur.php?erreur=1');
    }
    
    
}


}





?>