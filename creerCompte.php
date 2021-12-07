<?php
session_start();
//identifier BDD
$database = "shopping";
//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

//voir pour l ID = compter le nombre de vendeur par ex s'il choisit vendeur.
$nom=isset($_POST['nom'])?$_POST['nom']:"";
$prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
$adresse=isset($_POST['adresse'])?$_POST['adresse']:"";
$mail=isset($_POST['mail'])?$_POST['mail']:"";
$tel=isset($_POST['tel'])?$_POST['tel']:"";
$mdp=isset($_POST['mdp'])?$_POST['mdp']:"";
$typeCompte=isset($_POST['typeCompte'])?$_POST['typeCompte']:"";
$check = isset($_POST['clause']) ? "checked" : "unchecked";

if (isset($_POST["connexion"])) {
	//Vérifier que tous les champs sont bien remplis. Dans le cas contraire, afficher un message d’erreur indiquant quel champ est vide.//blindage
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
	if($check=="unchecked")
	{
		$erreur .= "Le champ clause est vide. <br>";
	}
	//blindage sur quelconque erreur sur le remplissage du formulaire
	if ($erreur == "") {
		echo "Formulaire valide.";//a voir pour remplacer
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
		else{
			echo "nouvel email";
			if($typeCompte=="Acheteur")
			{
				//on defini l id de l acheteur
				$nb=1;
				$id_acheteur=$nb;
				do{
				
				$sql = "SELECT * FROM acheteur";
				//ID
				if ($id_acheteur != " ") {
					$sql .= " WHERE id_acheteur LIKE '%$id_acheteur%'";
				}
				$resultAcheteur = mysqli_query($db_handle, $sql);

				if (mysqli_num_rows($resultAcheteur) != 0)
				{
					$nb++;
					$id_acheteur=$nb;
				}

				}while(mysqli_num_rows($resultAcheteur) != 0);

				
				//le pb vient d ici
				$sql = "INSERT INTO acheteur(id_acheteur, nom, prenom, tel, mail, mdp, id_adresse, id_cb) VALUES('$id_acheteur', '$nom', '$prenom',  '$tel','$mail', '$mdp','$id_acheteur','$id_acheteur')";

				$result =mysqli_query($db_handle, $sql);
				echo "<p>Add successful acheteur.</p>";
			}
			if($typeCompte=="Vendeur")
			{
				//on defini l id de l acheteur
				$nb1=1;
				$id_vendeur=$nb1;
				do{
				
				$sql = "SELECT * FROM vendeur";
				//ID
				if ($id_vendeur != " ") {
					$sql .= " WHERE id_vendeur LIKE '%$id_vendeur%'";
				}
				$resultVendeur = mysqli_query($db_handle, $sql);

				if (mysqli_num_rows($resultVendeur) != 0)
				{
					$nb1++;
					$id_vendeur=$nb1;
				}

				}while(mysqli_num_rows($resultVendeur) != 0);

				
				//le pb vient d ici
				$sql = "INSERT INTO vendeur (id_vendeur, mail, mdp, description, photo, nom, prenom, id_adresse, tel) VALUES ('$id_vendeur', '$mail', '$mdp', ' ', ' ', '$nom', '$prenom', '1', ' $tel') ";
				$result =mysqli_query($db_handle, $sql);
				echo "<p>Add successful vendeur.</p>";
			}
		}

			}}else {
				echo "Erreur: <br>" . $erreur;
			


		
			//on affiche le nouveau livre ajouté
			/*$sql = "SELECT * FROM book";
			if ($titre != "") {
				//on recherche le livre par son titre
				$sql .= " WHERE Titre LIKE '%$titre%'";
				//on cherche ce livre par son auteur aussi
				if ($auteur != "") {
				$sql .= " AND Auteur LIKE '%$auteur%'";
				}
			}
			$result = mysqli_query($db_handle, $sql);
			echo "<h2>" . "Informations sur le nouveau livre ajouté:" . "</h2>";
			echo "<table border='1'>";
			echo "<tr>";
			echo "<th>" . "ID" . "</th>";
			echo "<th>" . "Titre" . "</th>";
			echo "<th>" . "Auteur" . "</th>";
			echo "<th>" . "Annee" . "</th>";
			echo "<th>" . "Editeur" . "</th>";
			echo "<th>" . "Couverture" . "</th>";
			//afficher le resultat
			while ($data = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>" . $data['ID'] . "</td>";
			echo "<td>" . $data['Titre'] . "</td>"
			}*/
	
			}
}



?>