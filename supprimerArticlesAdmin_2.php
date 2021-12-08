<?php
session_start();
$id_admin=$_SESSION['id_admin'];

?>


<?php
	
		//identifier BDD
		$database = "shopping";
		//connectez-vous dans BDD
		$db_handle = mysqli_connect('localhost', 'root', '');
		$db_found = mysqli_select_db($db_handle, $database);

			
		
		if (isset($_POST["supprimer"])) {
			//Vérifier que tous les champs sont bien remplis. Dans le cas contraire, afficher un message d’erreur indiquant quel champ est vide.//blindage
			$nom=isset($_POST['nom'])?$_POST['nom']:"";
			$categorie_type=isset($_POST['categorie_type'])?$_POST['categorie_type']:"";
			$categorie_achat=isset($_POST['categorie_achat'])?$_POST['categorie_achat']:"";
				$erreur = "";
				if ($nom == "") {
					$erreur .= "Le champ nom est vide. <br>";
				}
			
				if ($erreur == "") {
					echo "Formulaire valide.";//a voir pour remplacer

					if ($db_found) {

						//on cherche si un article avec ce nom existe bien
						$sql = "SELECT * FROM article_admin";
						//avec son nom
						if ($nom != "") {
							$sql .= " WHERE nom LIKE '%$nom%'";
						}
						$resultArticle = mysqli_query($db_handle, $sql);
						//regarder s'il y a de resultat

						if (mysqli_num_rows($resultArticle) != 0 ) {
							echo "<p>Vous possedez deja un article qui possede ce nom donc on  peut le supprimer</p>";
						
							$sql= "DELETE FROM article_admin";
							if ($nom != " ") {
								$sql .= " WHERE nom LIKE '%$nom%'";
								if ($categorie_type != " ") {
									$sql .= " AND categorie_type LIKE '%$categorie_type%'";   
									if($categorie_achat != " "){
										$sql .= " AND categorie_achat LIKE '%$categorie_achat%'";
										if($id_admin != ""){
											$sql .= "AND id_admin LIKE '%$id_admin%'";
										}

									}
								}
							}
							$result =mysqli_query($db_handle, $sql);
							echo "<p>Suppression de l article successfull.</p>";

						}
						else
						{
								echo "Les informations que vous avez rentré ne correspondent a aucun de vos articles";
							
						}
				}
			
			}

			else
			{
				echo "Erreur: <br>" . $erreur;
			}

	}
			
?>