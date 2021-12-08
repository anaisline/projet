<?php
session_start();
$id_acheteur=$_SESSION['id_acheteur'];
// récupérer les informations envoyées depuis le formulaire 
$photo=isset($_POST['photo'])?$_POST['photo']:"";
$nom=isset($_POST['nom'])?$_POST['nom']:"";
$prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
$mail=isset($_POST['mail'])?$_POST['mail']:"";
$mdp=isset($_POST['mdp'])?$_POST['mdp']:"";
$tel=isset($_POST['tel'])?$_POST['tel']:"";

$ville=isset($_POST['ville'])?$_POST['ville']:"";
$code=isset($_POST['codepostal'])?$_POST['codepostal']:"";
$adresse=isset($_POST['adresse'])?$_POST['adresse']:"";

$codeCarte=isset($_POST['codeCarte'])?$_POST['codeCarte']:"";
$numCB=isset($_POST['numCB'])?$_POST['numCB']:"";
$carteType=isset($_POST['carteType'])?$_POST['carteType']:"";
$carteNom=isset($_POST['carteNom'])?$_POST['carteNom']:"";
$dateExp=isset($_POST['dateExp'])?$_POST['dateExp']:"";

//identifier BDD
$database = "shopping";
//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


if (isset($_POST["bouton1"])){


    if ($db_found) {

        if($photo!="")
        {
            $sql="UPDATE acheteur SET photo='$photo' WHERE id_acheteur='$id_acheteur' ";
            $result = mysqli_query($db_handle,$sql);
        }
        if($codeCarte!="")
        {
            $sql="UPDATE cb SET code_secu='$codeCarte' WHERE id_cb=(select id_cb from acheteur where id_acheteur='$id_acheteur') ";
            $result = mysqli_query($db_handle,$sql);
        }
        if($numCB!="")
        {
            $sql="UPDATE cb SET numero_cb='$numCB' WHERE id_cb=(select id_cb from acheteur where id_acheteur='$id_acheteur') ";
            $result = mysqli_query($db_handle,$sql);
        }
        if($carteNom!="")
        {
            $sql="UPDATE cb SET nom='$carteNom' WHERE id_cb=(select id_cb from acheteur where id_acheteur='$id_acheteur') ";
            $result = mysqli_query($db_handle,$sql);
        }
        if($dateExp!="")
        {
            $sql="UPDATE cb SET dateExp='$dateExp' WHERE id_cb=(select id_cb from acheteur where id_acheteur='$id_acheteur') ";
            $result = mysqli_query($db_handle,$sql);
        }
        if($carteType!="")
        {
            if($carteType=="visa" || $carteType=="mastercard" || $carteType=="american express" || $carteType=="paypal" ||$carteType=="Visa" || $carteType=="VISA" || $carteType=="Mastercard" || $carteType=="MASTERCARD" ||  $carteType=="American express" ||  $carteType=="American Express" ||  $carteType=="AMERICAN EXPRESS" ||  $carteType=="PAYPAL" || $carteType=="Paypal")
            {
                $sql="UPDATE cb SET type='$carteType' WHERE id_cb=(select id_cb from acheteur where id_acheteur='$id_acheteur') ";
                $result = mysqli_query($db_handle,$sql);
            }
            
        }
        if($ville!="")
        {
            $sql="UPDATE adresse SET ville='$ville' WHERE id_adresse=(select id_adresse from acheteur where id_acheteur='$id_acheteur') ";
            $result = mysqli_query($db_handle,$sql);
        }
        if($code!="")
        {
            $sql="UPDATE adresse SET code_postal='$code' WHERE id_adresse=(select id_adresse from acheteur where id_acheteur='$id_acheteur') ";
            $result = mysqli_query($db_handle,$sql);
        }
        if($adresse!="")
        {
            $sql="UPDATE adresse SET adresse_l1='$adresse' WHERE id_adresse=(select id_adresse from acheteur where id_acheteur='$id_acheteur') ";
            $result = mysqli_query($db_handle,$sql);
        }
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
        if($mdp!="")
        {
            $sql="UPDATE acheteur SET mdp='$mdp' WHERE id_acheteur='$id_acheteur' ";
            $result = mysqli_query($db_handle,$sql);
        }
        if($tel!="")
        {
            $sql="UPDATE acheteur SET tel='$tel' WHERE id_acheteur='$id_acheteur' ";
            $result = mysqli_query($db_handle,$sql);
        }
        if($mail!="")
        {
        $//on cherche si un compte avec cet email existe deja parmi les acheteurs
        $sql = "SELECT * FROM acheteur WHERE  (id_acheteur!='$id_acheteur' and mail LIKE '%$mail%')  ";
        $resultAcheteur = mysqli_query($db_handle, $sql);
        //regarder s'il y a de resultat

        //on cherche si un compte avec cet email existe deja parmi les vendeurs
        $sql = "SELECT * FROM vendeur WHERE ( mail LIKE '%$mail%' )";
        $resultVendeur = mysqli_query($db_handle, $sql);
        //regarder s'il y a de resultat

        //on cherche si un compte avec cet email existe deja parmi les admin
        $sql = "SELECT * FROM administrateur WHERE  (mail LIKE '%$mail%') ";
        $resultAdmin = mysqli_query($db_handle, $sql);

        //regarder s'il y a de resultat
        if (mysqli_num_rows($resultAcheteur) != 0 || mysqli_num_rows($resultVendeur) != 0 || mysqli_num_rows($resultAdmin) != 0) {
            $erreur=1;
        }
        else
        {
            $erreur=0;
            $sql="UPDATE acheteur SET mail='$mail' WHERE id_acheteur='$id_acheteur' ";
            $result = mysqli_query($db_handle,$sql);
        }

    }
    if($erreur==0)
    {
        header('Location: profil_acheteur.php?erreur=0');
    }
    else
    {
       header('Location: profil_acheteur.php?erreur=1');
   }


}




}

if (isset($_POST["bouton3"])){

    if ($db_found) {

        $sql="UPDATE acheteur SET photo='' WHERE id_acheteur='$id_acheteur' ";
        $result = mysqli_query($db_handle,$sql);
        header('Location: profil_acheteur.php?');
    }
}

if (isset($_POST["bouton4"])){

    if ($db_found) {
        $sql="UPDATE cb SET nom=NULL,code_secu=NULL,numero_cb=NULL,type=NULL,dateExp=NULL WHERE id_cb=(select id_cb from acheteur where id_acheteur='$id_acheteur') ";
        $result = mysqli_query($db_handle,$sql);
        header('Location: profil_acheteur.php?');
    }
}




?>