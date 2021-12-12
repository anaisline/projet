<?php
session_start();
$id_acheteur=$_SESSION['id_acheteur'];
$id_article=$_GET['id_article'];
$id_vendeur=$_GET['id_vendeur'];

$database = "shopping";
//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="nego.css" rel="stylesheet" type="text/css"/>
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

		<div id="nav">
			<ul>
				<li><a href="accueilAcheteur.php">Accueil</a></li>

				<li class="menu-deroulant">

					<a href="">Parcourir les categories</a>
					<ul class="sous-menu">

						<li><a href="CatégoriesPoupéesAcheteur.php">Poupees</a></li>
						<li><a href="CatégoriesJeuxAcheteur.php">Jeux</a></li>
						<li><a href="CatégoriesInsolitesAcheteur.php">Insolite</a></li>
						<li><a href="CatégorieAllAcheteur.php">Tout parcourir</a></li>
					</ul>
				</li>

				<li><a href="notifications.php">Notifications</a></li>

				<li><a href="Panier_Acheteur.php">Panier</a></li>

				<li class="menu-deroulant">
					<a href="#">Mon compte</a>
					<ul class="sous-menu">
						<li><a href="profil_acheteur.php">Ma page</a></li>
						<li><a href="connexionAcheteur.php">Se deconnecter</a></li>

					</li>
				</ul>

			</div>

			<div>
				<h2 align=center> Negocier un article </h2>
				

				<form action="nego_2.php" method="post" align=center>
					<?php 

					$sqlTest = "SELECT * from nego WHERE (id_acheteur = '$id_acheteur') AND (id_article='$id_article') AND (id_vendeur='$id_vendeur')";
					$resultTest = mysqli_query($db_handle, $sqlTest);
					if(mysqli_num_rows($resultTest)== 0)
					{

						$sqlCreer="INSERT INTO nego (offre, id_article, id_acheteur, id_vendeur, accepte, compteur) VALUES (NULL, '$id_article', '$id_acheteur', '$id_vendeur', '0', '0') ";
						$resultCreer =mysqli_query($db_handle, $sqlCreer);
					}

					?>
					<table align=center>
						<?php

						$compt0=0;
						$compt1=1;
						$compt2=2;
						$compt3=3;
						$compt4=4;
						$compt5=5;
						$accepte=0;
						$accepte1=1;
						$accepte2=2;


						$sql = "SELECT * from nego WHERE (id_acheteur = '$id_acheteur') AND (id_article='$id_article') AND (id_vendeur='$id_vendeur') AND (compteur='$compt5') AND (accepte='$accepte1')";
						$result = mysqli_query($db_handle, $sql);
						if(mysqli_num_rows($result)!= 0)
						{
							?>
							<tr>
								<td> 
									<?php
									echo "Votre offre d achat a ete accepte par le vendeur.";
									$sqlD = "DELETE from nego WHERE (id_acheteur = '$id_acheteur') AND (id_article='$id_article') AND (id_vendeur='$id_vendeur') AND (compteur='$compt5') AND (accepte='$accepte1')";
									$resultD = mysqli_query($db_handle, $sqlD);
									?> 
								</td>
							</tr>
							
							
							<?php


							$sql="DELETE from panier WHERE (id_acheteur = '$id_acheteur') AND (id_article='$id_article')";
							$result = mysqli_query($db_handle,$sql);


							
						}
						

						$sql = "SELECT * from nego WHERE (id_acheteur = '$id_acheteur') AND (id_article='$id_article') AND (id_vendeur='$id_vendeur') AND (compteur='$compt5') AND (accepte='$accepte2')";
						$result = mysqli_query($db_handle, $sql);
						if(mysqli_num_rows($result)!= 0)
						{
							?>

							<tr>
								<td> 
									<?php
							echo "Votre offre d achat a ete refuse par le vendeur.";
							$sqlD = "DELETE from nego WHERE (id_acheteur = '$id_acheteur') AND (id_article='$id_article') AND (id_vendeur='$id_vendeur') AND (compteur='$compt5') AND (accepte='$accepte2')";
							$resultD = mysqli_query($db_handle, $sqlD);

							$sql="DELETE from panier WHERE (id_acheteur = '$id_acheteur') AND (id_article='$id_article')";
							$result = mysqli_query($db_handle,$sql);?>
								</td>
							</tr>

							

							<?php

							

						}


						$sql = "SELECT * from nego WHERE (id_acheteur = '$id_acheteur') AND (id_article='$id_article') AND (id_vendeur='$id_vendeur') AND (compteur='$compt0' || compteur='$compt2' || compteur='$compt4') AND (accepte='$accepte')";
						$result = mysqli_query($db_handle, $sql);
						if(mysqli_num_rows($result)!= 0)
						{
							$data = mysqli_fetch_assoc($result);

							?>

							<tr>
								<td><label>Offre article <span class="required"></span></label></td>
								<td><input type="int" name="offre" class="field-long" placeholder="<?php echo $data['offre']; ?>" />
								</td>
							</tr>


							<tr>
								<td colspan="2" align="center">
									<input type="submit" name="envoyer" value="Envoyer">
								</td>

							</tr>

							<?php
						}
						$sql = "SELECT * from nego WHERE (id_acheteur = '$id_acheteur') AND (id_article='$id_article') AND (id_vendeur='$id_vendeur') AND (compteur='$compt1' || compteur='$compt3') AND (accepte='$accepte')";
						$result = mysqli_query($db_handle, $sql);
						if(mysqli_num_rows($result)!= 0)
						{
							?>
							<tr>
								<td> <h3>Cet article est dans l attente d une reponse du vendeur.</h3></td>
							</tr>
							<?php
						}
						
						
						?>
						<?php


						$sql = "SELECT * from nego WHERE (id_acheteur = '$id_acheteur') AND (id_article='$id_article') AND (id_vendeur='$id_vendeur') AND ( compteur='$compt2' || compteur='$compt4') AND (accepte='$accepte')";
						$result = mysqli_query($db_handle, $sql);
						if(mysqli_num_rows($result)!= 0)
						{	

							?>

							<tr>
								<td colspan="2" align="center">
									<p align="center"> ou </p><br><a href="negoAccepteAcheteur.php">Accepter l offre</a>
								</td>

							</tr>

							<?php

						}

						?>
					</table>
				</form>

			</div>
			<?php
			$_SESSION['id_article']=$id_article;
			$_SESSION['id_vendeur']=$id_vendeur;
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