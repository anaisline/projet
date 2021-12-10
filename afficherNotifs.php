<?php
session_start();
$id_acheteur=$_SESSION['id_acheteur'];




?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="afficherNotifs.css" rel="stylesheet" type="text/css"/>
	<title>Fray Her</title>
</head>
<body>

	<!-- wrapper area -->
	<div id="wrapper">

		<div id="header">
			<p>
				<font>
					Fray Her
				</font>
			</p>
		</div>
		<br>
		<div id="nav">
			<ul>
				<li><a href="accueilAcheteur.php">Accueil</a></li>

				<li class="menu-deroulant">

					<a href="">Parcourir les categories</a>
					<ul class="sous-menu">
						<li><a href="#">Poupees</a></li>
						<li><a href="#">Jeux</a></li>
						<li><a href="#">Insolite</a></li>
						<li><a href="#">Tout parcourir</a></li>
					</ul>
				</li>

				<li><a href="notifications.php">Notifications</a></li>

				<li><a href="Panier_Acheteur.php">Panier</a></li>

				<li class="menu-deroulant">
					<a href="#">Mon compte</a>
					<ul class="sous-menu">
						<li><a href="profil_acheteur.php">Ma page</a></li>
						<li><a href="connexionAcheteur.php">Se deconnecter</a></li>
					</ul>	
				</li>

			</ul>

		</div>

		<h2>Vos notifications selon vos alertes</h2>

		
		<?php
		$mysqli = new mysqli("localhost", "root", "", "shopping");
		$mysqli -> set_charset("utf8");

		$sql = "SELECT * from alerte WHERE id_acheteur='$id_acheteur'";
		$results = $mysqli -> query($sql); 
		$data = mysqli_fetch_assoc($results);
		if($data==0)
		{
			?>
			<div id="section" align="center">
				<?php
				echo "Vous n'avez pas créé d'alerte." ;
				?>
			</div>
			<?php

		}
		else if($data!=0) {

				//affichage des articles trouvés selon les alertes
			
					///ALERTE n°i : on recupere les infos et on affiche l'alerte
			$mot_cle_1 = $data['mot_cle_1'];
			$mot_cle_2 = $data['mot_cle_2'];
			$mot_cle_3 = $data['mot_cle_3'];
			$categorie_type = $data['categorie_type'];
			$categorie_achat = $data['categorie_achat'];

			?>
			<div id="section" align="center">
			<h3> Alerte : </h3>
			<?php
			echo "Mot cle 1 : " .$mot_cle_1. "<br>"."Mot cle 2 : ".$mot_cle_2. "<br>"."Mot Cle 3 : ". $mot_cle_3 ."<br>";
			echo "Type : ".$categorie_type."<br>"."Categorie d'achat : ".$categorie_achat	;
			?>
			</div>
			<?php

					///ON TROUVE LES ARTICLES VENDEUR AVEC LES MEMES INFOS
			if($mot_cle_2!="" && $mot_cle_3!="")
				{ echo "cc1";
			$data2=0;
			$data21=0;
			$data3=0;
			$data31=0;

			$sql1= "SELECT * FROM article_vendeur WHERE categorie_type='$categorie_type' and categorie_achat='$categorie_achat' and ((description LIKE '%$mot_cle_1%')OR(description LIKE '%$mot_cle_2%')OR(description LIKE '%$mot_cle_3%')OR(nom LIKE '%$mot_cle_1%')OR(nom LIKE '%$mot_cle_2%')OR(nom LIKE '%$mot_cle_3%'))";
			$results1 = $mysqli -> query( $sql1);
			$data1 = mysqli_fetch_assoc($results1);

			$sql11= "SELECT * FROM article_admin WHERE categorie_type='$categorie_type' and categorie_achat='$categorie_achat' and ((description LIKE '%$mot_cle_1%')OR(description LIKE '%$mot_cle_2%')OR(description LIKE '%$mot_cle_3%')OR(nom LIKE '%$mot_cle_1%')OR(nom LIKE '%$mot_cle_2%')OR(nom LIKE '%$mot_cle_3%'))";
			$results11 = $mysqli -> query($sql11);
			$data11 = mysqli_fetch_assoc($results11);
		}
		else
		{ 
			$data1=0;
			$data11=0;

			if($mot_cle_2!="" && $mot_cle_3=="")
			{
				$data3=0;
				$data31=0;

				$sql2= "SELECT * FROM article_vendeur WHERE categorie_type='$categorie_type' and categorie_achat='$categorie_achat' and ((description LIKE '%$mot_cle_1%')OR(description LIKE '%$mot_cle_2%')OR(nom LIKE '%$mot_cle_1%')OR(nom LIKE '%$mot_cle_2%'))";
				$results2 = $mysqli -> query($sql2);
				$data2 = mysqli_fetch_assoc($results2);

				$sql21= "SELECT * FROM article_admin WHERE categorie_type='$categorie_type' and categorie_achat='$categorie_achat' and ((description LIKE '%$mot_cle_1%')OR(description LIKE '%$mot_cle_2%')OR(nom LIKE '%$mot_cle_1%')OR(nom LIKE '%$mot_cle_2%'))";
				$results21 = $mysqli -> query( $sql21);
				$data21 = mysqli_fetch_assoc($results21);
			}
			else
			{
				$data2=0;
				$data21=0;

				$sql3= "SELECT * FROM article_vendeur WHERE categorie_type='$categorie_type' and categorie_achat='$categorie_achat' and ((description LIKE '%$mot_cle_1%')OR(nom LIKE '%$mot_cle_1%'))";
				$results3 = $mysqli -> query($sql3);
				$data3 = mysqli_fetch_assoc($results3);

				$sql31= "SELECT * FROM article_admin WHERE categorie_type='$categorie_type' and categorie_achat='$categorie_achat' and ((description LIKE '%$mot_cle_1%')OR(nom LIKE '%$mot_cle_1%'))";
				$results31 = $mysqli -> query($sql31);
				$data31 = mysqli_fetch_assoc($results31);
			}
		}

		if($data1==0 && $data2==0 && $data3==0 && $data11==0 && $data21==0 && $data31==0)
		{
			?>
			<div id="section" align="center">
				<?php
				echo "Vous n'avez pas de notification" ;
				?>
			</div>
			<?php

		}
		if($data1 != 0)
		{
			do{
				?>



				<form action="AjouterPanierAcheteurAdmin.php">
					<table align="center">
						<tr align=center>
							<td colspan='2'>
								<?php
								echo $data1['nom'];
								?>
							</td>
						</tr>


						<tr align=center>
							<td>
								<?php
								$recup = $data1['id_article'];

								$requPhoto = "SELECT adresse_photo from photo, article_vendeur where photo.id_article = '$recup'";
								$resultatPhoto = $mysqli-> query($requPhoto);

								$count = "SELECT count(id_photo) as numero from photo where photo.id_article = '$recup'";
								$resCount = mysqli_query($mysqli, $count);
								$data01 = mysqli_fetch_array($resCount);

								for ($i=0; $i < $data01['numero']; $i++) { 
									$ligne1 = $resultatPhoto -> fetch_assoc();
									echo '<img src="'. $ligne1['adresse_photo'] .'" alt="" />';
								}

								?>
							</td>
							<td>
								<?php
								echo "Description : " . $data1['description'];
								?>
							</td>
						</tr>
						<?php

						$recup = $data1['id_vendeur'];

						$requNom = "SELECT * from vendeur where vendeur.id_vendeur = $recup";
						$resultatNom = $mysqli -> query($requNom);

						$data0 = $resultatNom -> fetch_assoc();
						$var = $data0['nom'];
						$var2 = $data0['prenom'];
						?>

						<tr align=center>
							<td>
								<?php
								echo "<a href='VisiteProfilVend.php?nom=".$var."&prenom=".$var2." '>$var</a>";
								?>
							</td>
							<td>
								<?php
								echo $data1['prix'] . " euros";
								?>
							</td>
						</tr>

						<tr align=center>
							<td>
								<?php
								echo "Achat " . $data1['categorie_achat'];
								?>
							</td>
							<td>
								<?php
								echo "Mis en vente le : " . $data1['date'];
								?>
							</td>
						</tr>
						<tr align=center>
							<td colspan="2">
								<?php
								$var = $data1['id_article'];
								echo "<a href='AjouterPanierAcheteurAdmin.php?id_article=".$var." '>Ajouter au panier</a>";
								?>
							</td>
						</tr>

					</table>
				</form>





				<?php
				$data1 = mysqli_fetch_assoc($results1);
			}while($data1);




		}//fin du if pour data 1


		if($data2 != 0)
		{
			do{
				?>



				<form action="AjouterPanierAcheteurAdmin.php">
					<table align="center">
						<tr align=center>
							<td colspan='2'>
								<?php
								echo $data2['nom'];
								?>
							</td>
						</tr>


						<tr align=center>
							<td>
								<?php
								$recup = $data2['id_article'];

								$requPhoto = "SELECT adresse_photo from photo, article_vendeur where photo.id_article = '$recup'";
								$resultatPhoto = $mysqli-> query($requPhoto);

								$count = "SELECT count(id_photo) as numero from photo where photo.id_article = '$recup'";
								$resCount = mysqli_query($mysqli, $count);
								$data01 = mysqli_fetch_array($resCount);

								for ($i=0; $i < $data01['numero']; $i++) { 
									$ligne1 = $resultatPhoto -> fetch_assoc();
									echo '<img src="'. $ligne1['adresse_photo'] .'" alt="" />';
								}

								?>
							</td>
							<td>
								<?php
								echo "Description : " . $data2['description'];
								?>
							</td>
						</tr>
						<?php

						$recup = $data2['id_vendeur'];

						$requNom = "SELECT * from vendeur where vendeur.id_vendeur = $recup";
						$resultatNom = $mysqli -> query($requNom);

						$data0 = $resultatNom -> fetch_assoc();
						$var = $data0['nom'];
						$var2 = $data0['prenom'];
						?>

						<tr align=center>
							<td>
								<?php
								echo "<a href='VisiteProfilVend.php?nom=".$var."&prenom=".$var2." '>$var</a>";
								?>
							</td>
							<td>
								<?php
								echo $data2['prix'] . " euros";
								?>
							</td>
						</tr>

						<tr align=center>
							<td>
								<?php
								echo "Achat " . $data2['categorie_achat'];
								?>
							</td>
							<td>
								<?php
								echo "Mis en vente le : " . $data2['date'];
								?>
							</td>
						</tr>
						<tr align=center>
							<td colspan="2">
								<?php
								$var = $data2['id_article'];
								echo "<a href='AjouterPanierAcheteurAdmin.php?id_article=".$var." '>Ajouter au panier</a>";
								?>
							</td>
						</tr>

					</table>
				</form>





				<?php
				$data2 = mysqli_fetch_assoc($results2);
			}while($data2);



			
		}//fin du if pour data 2

		if($data3 != 0)
		{
			do{
				?>



				<form action="AjouterPanierAcheteurAdmin.php">
					<table align="center">
						<tr align=center>
							<td colspan='2'>
								<?php
								echo $data3['nom'];
								?>
							</td>
						</tr>


						<tr align=center>
							<td>
								<?php
								$recup = $data3['id_article'];

								$requPhoto = "SELECT adresse_photo from photo, article_vendeur where photo.id_article = '$recup'";
								$resultatPhoto = $mysqli-> query($requPhoto);

								$count = "SELECT count(id_photo) as numero from photo where photo.id_article = '$recup'";
								$resCount = mysqli_query($mysqli, $count);
								$data01 = mysqli_fetch_array($resCount);

								for ($i=0; $i < $data01['numero']; $i++) { 
									$ligne1 = $resultatPhoto -> fetch_assoc();
									echo '<img src="'. $ligne1['adresse_photo'] .'" alt="" />';
								}

								?>
							</td>
							<td>
								<?php
								echo "Description : " . $data3['description'];
								?>
							</td>
						</tr>
						<?php

						$recup = $data3['id_vendeur'];

						$requNom = "SELECT * from vendeur where vendeur.id_vendeur = $recup";
						$resultatNom = $mysqli -> query($requNom);

						$data0 = $resultatNom -> fetch_assoc();
						$var = $data0['nom'];
						$var2 = $data0['prenom'];
						?>

						<tr align=center>
							<td>
								<?php
								echo "<a href='VisiteProfilVend.php?nom=".$var."&prenom=".$var2." '>$var</a>";
								?>
							</td>
							<td>
								<?php
								echo $data3['prix'] . " euros";
								?>
							</td>
						</tr>

						<tr align=center>
							<td>
								<?php
								echo "Achat " . $data3['categorie_achat'];
								?>
							</td>
							<td>
								<?php
								echo "Mis en vente le : " . $data3['date'];
								?>
							</td>
						</tr>
						<tr align=center>
							<td colspan="2">
								<?php
								$var = $data3['id_article'];
								echo "<a href='AjouterPanierAcheteurAdmin.php?id_article=".$var." '>Ajouter au panier</a>";
								?>
							</td>
						</tr>

					</table>
				</form>





				<?php
				$data3 = mysqli_fetch_assoc($results3);
			}while($data3);



			
		}//fin du if pour data 3

		if($data11 != 0)
		{
			do{
				?>



				<form action="AjouterPanierAcheteurAdmin.php">
					<table align="center">
						<tr align=center>
							<td colspan='2'>
								<?php
								echo $data11['nom'];
								?>
							</td>
						</tr>


						<tr align=center>
							<td>
								<?php
								$recup = $data11['id_article'];

								$requPhoto = "SELECT adresse_photo from photo, article_admin where photo.id_article = '$recup'";
								$resultatPhoto = $mysqli-> query($requPhoto);

								$count = "SELECT count(id_photo) as numero from photo where photo.id_article = '$recup'";
								$resCount = mysqli_query($mysqli, $count);
								$data01 = mysqli_fetch_array($resCount);

								for ($i=0; $i < $data01['numero']; $i++) { 
									$ligne1 = $resultatPhoto -> fetch_assoc();
									echo '<img src="'. $ligne1['adresse_photo'] .'" alt="" />';
								}

								?>
							</td>
							<td>
								<?php
								echo "Description : " . $data11['description'];
								?>
							</td>
						</tr>
						<?php

						$recup = $data11['id_admin'];

						$requNom = "SELECT * from administrateur where administrateur.id_admin = $recup";
						$resultatNom = $mysqli -> query($requNom);

						$data0 = $resultatNom -> fetch_assoc();
						$var = $data0['nom'];
						$var2 = $data0['prenom'];
						?>

						<tr align=center>
							<td>
								<?php
								echo "<a href='VisiteProfilVend.php?nom=".$var."&prenom=".$var2." '>$var</a>";
								?>
							</td>
							<td>
								<?php
								echo $data11['prix'] . " euros";
								?>
							</td>
						</tr>

						<tr align=center>
							<td>
								<?php
								echo "Achat " . $data11['categorie_achat'];
								?>
							</td>
							<td>
								<?php
								echo "Mis en vente le : " . $data11['date'];
								?>
							</td>
						</tr>
						<tr align=center>
							<td colspan="2">
								<?php
								$var = $data11['id_article'];
								echo "<a href='AjouterPanierAcheteurAdmin.php?id_article=".$var." '>Ajouter au panier</a>";
								?>
							</td>
						</tr>

					</table>
				</form>





				<?php
				$data11 = mysqli_fetch_assoc($results11);
			}while($data11);




		}//fin du if pour data 1


		if($data21 != 0)
		{
			do{
				?>



				<form action="AjouterPanierAcheteurAdmin.php">
					<table align="center">
						<tr align=center>
							<td colspan='2'>
								<?php
								echo $data21['nom'];
								?>
							</td>
						</tr>


						<tr align=center>
							<td>
								<?php
								$recup = $data21['id_article'];

								$requPhoto = "SELECT adresse_photo from photo, article_admin where photo.id_article = '$recup'";
								$resultatPhoto = $mysqli-> query($requPhoto);

								$count = "SELECT count(id_photo) as numero from photo where photo.id_article = '$recup'";
								$resCount = mysqli_query($mysqli, $count);
								$data01 = mysqli_fetch_array($resCount);

								for ($i=0; $i < $data01['numero']; $i++) { 
									$ligne1 = $resultatPhoto -> fetch_assoc();
									echo '<img src="'. $ligne1['adresse_photo'] .'" alt="" />';
								}

								?>
							</td>
							<td>
								<?php
								echo "Description : " . $data21['description'];
								?>
							</td>
						</tr>
						<?php

						$recup = $data21['id_admin'];

						$requNom = "SELECT * from administrateur where administrateur.id_admin = $recup";
						$resultatNom = $mysqli -> query($requNom);

						$data0 = $resultatNom -> fetch_assoc();
						$var = $data0['nom'];
						$var2 = $data0['prenom'];
						?>

						<tr align=center>
							<td>
								<?php
								echo "<a href='VisiteProfilVend.php?nom=".$var."&prenom=".$var2." '>$var</a>";
								?>
							</td>
							<td>
								<?php
								echo $data21['prix'] . " euros";
								?>
							</td>
						</tr>

						<tr align=center>
							<td>
								<?php
								echo "Achat " . $data21['categorie_achat'];
								?>
							</td>
							<td>
								<?php
								echo "Mis en vente le : " . $data21['date'];
								?>
							</td>
						</tr>
						<tr align=center>
							<td colspan="2">
								<?php
								$var = $data21['id_article'];
								echo "<a href='AjouterPanierAcheteurAdmin.php?id_article=".$var." '>Ajouter au panier</a>";
								?>
							</td>
						</tr>

					</table>
				</form>





				<?php
				$data21 = mysqli_fetch_assoc($results21);
			}while($data21);



			
		}//fin du if pour data 2

		if($data31 != 0)
		{
			do{
				?>



				<form action="AjouterPanierAcheteurAdmin.php">
					<table align="center">
						<tr align=center>
							<td colspan='2'>
								<?php
								echo $data31['nom'];
								?>
							</td>
						</tr>


						<tr align=center>
							<td>
								<?php
								$recup = $data31['id_article'];

								$requPhoto = "SELECT adresse_photo from photo, article_admin where photo.id_article = '$recup'";
								$resultatPhoto = $mysqli-> query($requPhoto);

								$count = "SELECT count(id_photo) as numero from photo where photo.id_article = '$recup'";
								$resCount = mysqli_query($mysqli, $count);
								$data01 = mysqli_fetch_array($resCount);

								for ($i=0; $i < $data01['numero']; $i++) { 
									$ligne1 = $resultatPhoto -> fetch_assoc();
									echo '<img src="'. $ligne1['adresse_photo'] .'" alt="" />';
								}

								?>
							</td>
							<td>
								<?php
								echo "Description : " . $data31['description'];
								?>
							</td>
						</tr>
						<?php

						$recup = $data31['id_admin'];

						$requNom = "SELECT * from administrateur where administrateur.id_admin = $recup";
						$resultatNom = $mysqli -> query($requNom);

						$data0 = $resultatNom -> fetch_assoc();
						$var = $data0['nom'];
						$var2 = $data0['prenom'];
						?>

						<tr align=center>
							<td>
								<?php
								echo "<a href='VisiteProfilVend.php?nom=".$var."&prenom=".$var2." '>$var</a>";
								?>
							</td>
							<td>
								<?php
								echo $data31['prix'] . " euros";
								?>
							</td>
						</tr>

						<tr align=center>
							<td>
								<?php
								echo "Achat " . $data31['categorie_achat'];
								?>
							</td>
							<td>
								<?php
								echo "Mis en vente le : " . $data31['date'];
								?>
							</td>
						</tr>
						<tr align=center>
							<td colspan="2">
								<?php
								$var = $data31['id_article'];
								echo "<a href='AjouterPanierAcheteurAdmin.php?id_article=".$var." '>Ajouter au panier</a>";
								?>
							</td>
						</tr>

					</table>
				</form>





				<?php
				$data31 = mysqli_fetch_assoc($results31);
			}while($data31);



			
		}//fin du if pour data 3






	}//fin du gros if DERNIERE ACOLADE

	?>


	<div id="footer">
		<!--Copyright &copy; 2021 Prime Properties<br> -->

		<dd>
			<ul>
				<li>
					<p align=left>
						Qui sommes-nous ?<br><br>
						Nous sommes un groupe d'étudiants qui avons<br> pour but de créer un site internet pour vous permettre de<br> faire votre shopping facilement.<br>
						Nous avons réfléchi à ce dont vous pourriez avoir<br> besoin et il nous est apparu que nous avons beaucoup <br>de difficultés à faire hanter les personnes qui le méritent...<br>
						<p align=right>
							Alors nous voila !
						</p>
					</p>
				</li>
				<li>
					<p class="contact">Nous contacter: <br><br>
						<a href="mailto:paris.shopping@gmail.com">paris.shopping@gmail.com</a><br>
						67 avenue Henri Martin 75016 PARIS<br>
						02 37 60 03 10<br>

					</p>

				</li>
				<li>
					<p>
						Instagram des auteurs :<br>
						<br> <a href="https://www.instagram.com/anaisline_/" class="button">> anaisline_</a>
						<br> <a href="https://www.instagram.com/marine_rhd/" class="button">> marine_rhd</a>
						<br> <a href="https://www.instagram.com/benji.lvld/" class="button">> benji.lvld</a>
					</p>
				</li>
			</ul>
		</dd>
	</div>

</div>

</body>
</html>