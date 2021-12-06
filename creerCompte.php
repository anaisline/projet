<?php

//identifier BDD
$database = "shopping";
//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

//voir pour l ID = compter le nombre de vendeur par ex si il choisit vendeur.
$nom=isset($_POST['nom'])?$_POST['nom']:"";
$prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
$adresse=isset($_POST['adresse'])?$_POST['adresse']:"";
$mail=isset($_POST['mail'])?$_POST['mail']:"";
$tel=isset($_POST['tel'])?$_POST['tel']:"";
$mdp=isset($_POST['mdp'])?$_POST['mdp']:"";
$typeDeCompte=isset($_POST['typeDeCompte'])?$_POST['typeDeCompte']:"";
$clause=isset($_POST['clause'])?$_POST['clause']:"";

//Vérifier que tous les champs sont bien remplis. Dans le cas contraire, afficher un message d’erreur indiquant quel champ est vide.
$erreur = "";
if ($nom == "") {
$erreur .= "Le champ nom est vide. <br>";
}
if ($prenom == "") {
$erreur .= "Le champ prenom est vide. <br>";
}
if ($adresse == "") {
$erreur .= "Le champ adresse est vide. <br>";
}
if ($mail == "") {
$erreur .= "Le champ mail est vide. <br>";
}
if ($tel == "") {
$erreur .= "Le champ telephone est vide. <br>";
}
if ($mdp == "") {
$erreur .= "Le champ mot de passe est vide. <br>";
}
if(in_array('oui', $_POST['clause']==" "){
$erreur .= "Le champ clause est vide. <br>";
}
//blindage sur quelconque erreur sur le remplissage du formulaire
if ($erreur == "") {
echo "Formulaire valide.";
} else {
echo "Erreur: <br>" . $erreur;
}

if (isset($_POST["button1"])) {
	if ($db_found) {
		//on cherche si un compte avec cet email existe deja parmi les acheteurs
		$sql = "SELECT * FROM acheteur";
		//avec son email
		if ($mail != "") {
			$sql .= " WHERE mail LIKE '%$mail%'";
		}
		$resultAcheteur = mysqli_query($db_handle, $sql);
		//regarder s'il y a de resultat

		//on cherche si un compte avec cet email existe deja parmi les vendeurs
		$sql = "SELECT * FROM vendeur";
		//avec son email
		if ($mail != "") {
			$sql .= " WHERE mail LIKE '%$mail%'";
		}
		$resultVendeur = mysqli_query($db_handle, $sql);
		//regarder s'il y a de resultat

		//on cherche si un compte avec cet email existe deja parmi les admin
		$sql = "SELECT * FROM administrateur";
		//avec son email
		if ($mail != "") {
			$sql .= " WHERE mail LIKE '%$mail%'";
		}
		$resultAdmin = mysqli_query($db_handle, $sql);
		//regarder s'il y a de resultat
		if (mysqli_num_rows($resultAcheteur) != 0 || mysqli_num_rows($resultVendeur) != 0 || mysqli_num_rows($resultVendeur) != 0) {
		echo "<p>Cet email possede deja un compte.</p>";
		}
		else
		{

		}



	}
}


?>