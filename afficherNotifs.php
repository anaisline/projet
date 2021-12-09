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
				<li><a href="accueil_acheteur.php">Accueil</a></li>

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
			$data = mysqli_num_rows($results);
			if ($data != 0 ) {
				//affichage des articles trouvés selon les alertes
				do
				{
					///ALERTE n°i : on recupere les infos et on affiche l'alerte
					$mot_cle_1 = $data['mot_cle_1'];
					$mot_cle_2 = $data['mot_cle_2'];
					$mot_cle_3 = $data['mot_cle_3'];
					$categorie_type = $data['categorie_type'];
					$categorie_achat = $data['categorie_achat'];

					///ON TROUVE LES ARTICLES VENDEUR AVEC LES MEMES INFOS
					$sql21= "SELECT * FROM article_vendeur WHERE categorie_type='$categorie_type' and categorie_achat='$categorie_achat' and description LIKE '%'$mot_cle_1'%'";
					$results21 = mysqli_query($db_handle, $sql);
					$data21 = mysqli_num_rows($results21);

					$sql211= "SELECT * FROM article_vendeur WHERE categorie_type='$categorie_type' and categorie_achat='$categorie_achat' and nom LIKE '%'$mot_cle_1'%'";
					$results211 = mysqli_query($db_handle, $sql); 
					$data211 = mysqli_num_rows($results211);

					if($mot_cle_2!="")
					{
						$sql22= "SELECT * FROM article_vendeur WHERE categorie_type='$categorie_type' and categorie_achat='$categorie_achat' and description LIKE '%'$mot_cle_2'%'";
						$results22 = mysqli_query($db_handle, $sql); 
						$data22 = mysqli_num_rows($results22);

						$sql221= "SELECT * FROM article_vendeur WHERE categorie_type='$categorie_type' and categorie_achat='$categorie_achat' and nom LIKE '%'$mot_cle_2'%'";
						$results221 = mysqli_query($db_handle, $sql); 
						$data221 = mysqli_num_rows($results221);
					}
					if($mot_cle_3!="")
					{
						$sql23= "SELECT * FROM article_vendeur WHERE categorie_type='$categorie_type' and categorie_achat='$categorie_achat' and description LIKE '%'$mot_cle_3'%'";
						$results23 = mysqli_query($db_handle, $sql); 
						$data23 = mysqli_num_rows($results23);

						$sql231= "SELECT * FROM article_vendeur WHERE categorie_type='$categorie_type' and categorie_achat='$categorie_achat' and nom LIKE '%'$mot_cle_1'%'";
						$results231 = mysqli_query($db_handle, $sql); 
						$data231 = mysqli_num_rows($results231);
					}

					///ON TROUVE LES ARTICLES ADMIN AVEC LES MEMES INFOS
					$sql31= "SELECT * FROM article_admin WHERE categorie_type='$categorie_type' and categorie_achat='$categorie_achat' and description LIKE '%'$mot_cle_1'%'";
					$results31 = mysqli_query($db_handle, $sql); 
					$data31 = mysqli_num_rows($results31);

					$sql311= "SELECT * FROM article_admin WHERE categorie_type='$categorie_type' and categorie_achat='$categorie_achat' and nom LIKE '%'$mot_cle_1'%'";
					$results311 = mysqli_query($db_handle, $sql); 
					$data311 = mysqli_num_rows($results311);

					if($mot_cle_2!="")
					{
						$sql32= "SELECT * FROM article_admin WHERE categorie_type='$categorie_type' and categorie_achat='$categorie_achat' and description LIKE '%'$mot_cle_2'%'";
						$results32 = mysqli_query($db_handle, $sql); 
						$data32 = mysqli_num_rows($results32);

						$sql321= "SELECT * FROM article_admin WHERE categorie_type='$categorie_type' and categorie_achat='$categorie_achat' and nom LIKE '%'$mot_cle_2'%'";
						$results321 = mysqli_query($db_handle, $sql); 
						$data321 = mysqli_num_rows($results321);
					}
					else
					{
						$data32 =0;
						$data321 = 0;
					}
					if($mot_cle_3!="")
					{
						$sql33= "SELECT * FROM article_admin WHERE categorie_type='$categorie_type' and categorie_achat='$categorie_achat' and description LIKE '%'$mot_cle_3'%'";
						$results33 = mysqli_query($db_handle, $sql); 
						$data33 = mysqli_num_rows($results33);

						$sql331= "SELECT * FROM article_admin WHERE categorie_type='$categorie_type' and categorie_achat='$categorie_achat' and nom LIKE '%'$mot_cle_1'%'";
						$results331 = mysqli_query($db_handle, $sql); 
						$data331 = mysqli_num_rows($results331);
					}
					else
					{
						$data33 =0;
						$data331 = 0;
					}

					

					///ON LES AFFICHE S IL Y EN A (s'il y en a pas on affiche patience...)
					if($data21==0 && $data211==0 && $data22==0 && $data221==0 && $data23==0 && $data231==0 && $data31==0 && $data311==0 && $data32==0 && $data321==0 && $data33==0 && $data331==0)
					{
						echo "Vous n'avez pas de notifications." ;
					}


					///ON PASSE A L ALERTE SUIVANTE S IL Y EN A UNE
					$data = mysqli_num_rows($results);
				}while($data);
				
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