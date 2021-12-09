<?php
session_start();
$id_acheteur=$_SESSION['id_acheteur'];

$database = "shopping";
//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


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

				<li><a href="">Panier</a></li>

				<li class="menu-deroulant">
					<a href="#">Mon compte</a>
					<ul class="sous-menu">
						<li><a href="profil_acheteur.php">Ma page</a></li>
						<li><a href="connexionAcheteur.php">Se deconnecter</a></li>
					</ul>	
				</li>

			</ul>

		</div>

		<div id="section" align=center>
			<?php

			$sql = "SELECT * from alerte WHERE id_acheteur='$id_acheteur'";
			$results = mysqli_query($db_handle, $sql); 
			$data = mysqli_fetch_assoc($results);
			if ($data != 0 ) {

				//affichage des articles trouvés selon les alertes
			
					///ALERTE n°i : on recupere les infos et on affiche l'alerte
				$mot_cle_1 = $data['mot_cle_1'];
				$mot_cle_2 = $data['mot_cle_2'];
				$mot_cle_3 = $data['mot_cle_3'];
				$categorie_type = $data['categorie_type'];
				$categorie_achat = $data['categorie_achat'];

					///ON TROUVE LES ARTICLES VENDEUR AVEC LES MEMES INFOS
				if($mot_cle_2!="" && $mot_cle_3!="")
				{ echo "cc1";
					$data2=0;
					$data21=0;
					$data3=0;
					$data31=0;

					$sql1= "SELECT * FROM article_vendeur WHERE categorie_type='$categorie_type' and categorie_achat='$categorie_achat' and ((description LIKE '%$mot_cle_1%')OR(description LIKE '%$mot_cle_2%')OR(description LIKE '%$mot_cle_3%')OR(nom LIKE '%$mot_cle_1%')OR(nom LIKE '%$mot_cle_2%')OR(nom LIKE '%$mot_cle_3%'))";
					$results1 = mysqli_query($db_handle, $sql1);
					$data1 = mysqli_fetch_assoc($results1);

					$sql11= "SELECT * FROM article_admin WHERE categorie_type='$categorie_type' and categorie_achat='$categorie_achat' and ((description LIKE '%$mot_cle_1%')OR(description LIKE '%$mot_cle_2%')OR(description LIKE '%$mot_cle_3%')OR(nom LIKE '%$mot_cle_1%')OR(nom LIKE '%$mot_cle_2%')OR(nom LIKE '%$mot_cle_3%'))";
					$results11 = mysqli_query($db_handle, $sql11);
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
						$results2 = mysqli_query($db_handle, $sql2);
						$data2 = mysqli_fetch_assoc($results2);
						
						$sql21= "SELECT * FROM article_admin WHERE categorie_type='$categorie_type' and categorie_achat='$categorie_achat' and ((description LIKE '%$mot_cle_1%')OR(description LIKE '%$mot_cle_2%')OR(nom LIKE '%$mot_cle_1%')OR(nom LIKE '%$mot_cle_2%'))";
						$results21 = mysqli_query($db_handle, $sql21);
						$data21 = mysqli_fetch_assoc($results21);
					}
					else
					{
						$data2=0;
						$data21=0;

						$sql3= "SELECT * FROM article_vendeur WHERE categorie_type='$categorie_type' and categorie_achat='$categorie_achat' and ((description LIKE '%$mot_cle_1%')OR(nom LIKE '%$mot_cle_1%'))";
						$results3 = mysqli_query($db_handle, $sql3);
						$data3 = mysqli_fetch_assoc($results3);

						$sql31= "SELECT * FROM article_admin WHERE categorie_type='$categorie_type' and categorie_achat='$categorie_achat' and ((description LIKE '%$mot_cle_1%')OR(nom LIKE '%$mot_cle_1%'))";
						$results31 = mysqli_query($db_handle, $sql31);
						$data31 = mysqli_fetch_assoc($results31);
					}
				}
				
				if($data1==0 && $data2==0 && $data3==0 && $data11==0 && $data21==0 && $data31==0)
				{
					echo "Vous n'avez pas de notification" ;
				}


				
				
			}
			else //pas d'alerte encore créées 
			{
				//echo "<td>" . "<img src="messagerie.png" height='120' width='100'>" . "</td>";
				echo "Vous n'avez pas créé d'alerte." ;
			}

			?>
		</div>

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