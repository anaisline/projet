<?php
session_start();
$id_vendeur=$_SESSION['id_vendeur'];

?>


<?php
	
		//identifier BDD
		$database = "shopping";
		//connectez-vous dans BDD
		$db_handle = mysqli_connect('localhost', 'root', '');
		$db_found = mysqli_select_db($db_handle, $database);


		if (isset($_POST["ajouter"])) {
			

			$nom=isset($_POST['nom'])?$_POST['nom']:"";
			$description=isset($_POST['description'])?$_POST['description']:"";
			$prix=isset($_POST['prix'])?$_POST['prix']:"";
			$categorie_type=isset($_POST['categorie_type'])?$_POST['categorie_type']:"";
			$categorie_achat=isset($_POST['categorie_achat'])?$_POST['categorie_achat']:"";
			$date=isset($_POST['date'])?$_POST['date']:"";

			if (isset($_POST["ajouter"])) {
			//Vérifier que tous les champs sont bien remplis. Dans le cas contraire, afficher un message d’erreur indiquant quel champ est vide.//blindage
				$erreur = "";
				if ($nom == "") {
					$erreur .= "Le champ nom est vide. <br>";
				}
				if ($description == "") {
					$erreur .= "Le champ description est vide. <br>";
				}
				if ($prix == "") {
					$erreur .= "Le champ prix est vide. <br>";
				}
				if ($date == "") {
					$erreur .= "Le champ date est vide. <br>";
				}
				if ($erreur == "") {
					echo "Formulaire valide.";//a voir pour remplacer

					if ($db_found) {

						//on cherche si un compte avec cet email existe deja parmi les acheteurs
						$sql = "SELECT * FROM article_vendeur";
						//avec son nom
						if ($nom != "") {
							$sql .= " WHERE nom LIKE '%$nom%'";
						}
						$resultArticle = mysqli_query($db_handle, $sql);
						//regarder s'il y a de resultat
						if (mysqli_num_rows($resultArticle) != 0 ) {
							echo "<p>Vous possedez deja un article qui possede ce nom</p>";
						}
						else
						{
							//on defini l id de l acheteur
							$nb=1;
							$id_article=$nb;
							do{
				
								$sql = "SELECT * FROM article_vendeur";
								//ID
								if ($id_article != " ") {
								$sql .= " WHERE id_article LIKE '%$id_article%'";
								}
								$resultArticle = mysqli_query($db_handle, $sql);

								if (mysqli_num_rows($resultArticle) != 0)
								{
									$nb++;
									$id_article=$nb;
								}

							}while(mysqli_num_rows($resultArticle) != 0);

							 $nb1=1;
                            $id_photo1=$nb1;
                            do{

                                $sql = "SELECT * FROM photo";
                                //ID
                                if ($id_photo1 != " ") {
                                $sql .= " WHERE id_photo LIKE '%$id_photo1%'";
                                }
                                $resultPhoto1 = mysqli_query($db_handle, $sql);

                                if (mysqli_num_rows($resultPhoto1) != 0)
                                {
                                    $nb1++;
                                    $id_photo1=$nb1;
                                }

                            }while(mysqli_num_rows($resultPhoto1) != 0);

                            if($photo2 != "")
                            {
                                //on defini l id de l acheteur
                                $nb2=1;
                                $id_photo2=$nb2;
                                do{

                                    $sql = "SELECT * FROM photo";
                                    //ID
                                    if ($id_photo2 != " ") {
                                    $sql .= " WHERE id_photo LIKE '%$id_photo2%'";
                                    }
                                    $resultPhoto2 = mysqli_query($db_handle, $sql);

                                    if (mysqli_num_rows($resultPhoto2) != 0)
                                    {
                                        $nb2++;
                                        $id_photo2=$nb2;
                                    }

                                }while(mysqli_num_rows($resultPhoto2) != 0);

                                 $sql = "INSERT INTO photo (id_photo, adresse_photo, id_article) VALUES ('$id_photo1', '$photo1', '$id_article') ";
                           		 $result =mysqli_query($db_handle, $sql);
                           		 echo "<p>Add successful article photo 1.</p>";

							
                                $sql = "INSERT INTO photo (id_photo, adresse_photo, id_article) VALUES ('$id_photo2', '$photo2', '$id_article') ";
                                $result =mysqli_query($db_handle, $sql);
                                echo "<p>Add successful article photo 2.</p>";


							    $sql = "INSERT INTO article_vendeur(id_article, id_vendeur, prix, nom, description, categorie_type, categorie_achat, date) VALUES ('$id_article', '$id_vendeur', '$prix', '$nom', '$description', '$categorie_type', '$categorie_achat', '$date') ";

							$result =mysqli_query($db_handle, $sql);
							echo "<p>Add successful article.</p>";
   

						}

						
					}

				}
				else
				{
					echo "Erreur: <br>" . $erreur;
				}

			}
			
		}




	?>