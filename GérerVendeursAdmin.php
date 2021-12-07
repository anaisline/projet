<?php
session_start();
// récupérer les informations envoyées depuis le formulaire 
$mail=isset($_POST['mail'])?$_POST['mail']:"";
$prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
$nom=isset($_POST['nom'])?$_POST['nom']:"";

//identifier BDD
$database = "shopping";
//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

//Vérifier que tous les champs sont bien remplis. Dans le cas contraire, afficher un message d’erreur indiquant quel champ est vide.
$erreur = "";
if ($mail == "") {
	$erreur .= "Le champ email est vide. <br>";
	header('Location: GestionVendeurAdmin.php?erreur=1');
}
if ($prenom == "") {
	$erreur .= "Le champ prenom est vide. <br>";
	header('Location: GestionVendeurAdmin.php?erreur=2');
}
if ($nom == "") {
	$erreur .= "Le champ nom est vide. <br>";
	header('Location: GestionVendeurAdmin.php?erreur=3');
}
//blindage sur quelconque erreur sur le remplissage du formulaire
if ($erreur == "") {

	if ($db_found) {
		if (isset($_POST["bouton1"])){
			$sql= "SELECT * from vendeur";
			if ($mail != "") {
				$sql .= " WHERE mail LIKE '%$mail%'";
				if ($prenom != "") {
					$sql .= " AND prenom LIKE '%$prenom%'";   
					if($nom != ""){
						$sql .= " AND nom LIKE '%$nom%'";
					}
				}
			}
			$result = mysqli_query($db_handle, $sql);

			if (mysqli_num_rows($result) != 0) {
				echo "<p>Le vendeur existe déjà.</p>";
			} 
			else {

				//on defini l id du vendeur
				$nb=1;
				$id_vendeur=$nb;
				do{

					$sql = "SELECT * FROM vendeur";
                //ID
					if ($id_vendeur != " ") {
						$sql .= " WHERE id_vendeur LIKE '%$id_vendeur%'";
					}
					$resultVendeur = mysqli_query($db_handle, $sql);

					if (mysqli_num_rows($resultVendeur) != 0)
					{
						$nb++;
						$id_vendeur=$nb;
					}

				}while(mysqli_num_rows($resultVendeur) != 0);

				$sql = "INSERT INTO vendeur(id_vendeur, mail, mdp, description, photo, nom, prenom, id_adresse, tel) VALUES('$id_vendeur', '$mail', '', '', '', '$nom', '$prenom', '0', '0')";
		        $result = mysqli_query($db_handle, $sql);
		        echo "$sql";
		        echo "<p>Add successful.</p>";

			}
		}

		if (isset($_POST["bouton2"])){
			$sql= "DELETE from vendeur";
			if ($mail != "") {
				$sql .= " WHERE mail LIKE '%$mail%'";
				if ($prenom != "") {
					$sql .= " AND prenom LIKE '%$prenom%'";   
					if($nom != ""){
						$sql .= " AND nom LIKE '%$nom%'";
					}
				}
			}
			$result = mysqli_query($db_handle, $sql);

		}
	}
	else
	{
		echo "BDD ne fonctionne pas ";
	}


} else {
	echo "Erreur: <br>" . $erreur;
}






?>