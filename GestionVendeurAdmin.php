<!DOCTYPE html>
<html>


<head>
	<meta charset="utf-8">
	<link href="GestionVendeurAdmin.css" rel="stylesheet" type="text/css"/>
	<title>Fray Her</title>
</head>
<body>

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
				<li><a href="accueilAdmin.html">Accueil</a></li>

				<li class="menu-deroulant">
					<a href="parcourir.html">Gérer</a>
					<ul class="sous-menu">
						<li><a href="GestionVendeurAdmin.php">Les vendeurs</a></li>
						<li><a href="#">Mes articles</a></li>
					</ul>
				</li>


				<li><a href="messagerieAdmin.html">Messagerie</a></li>

				<li class="menu-deroulant">
					<a href="#">Mon compte</a>
					<ul class="sous-menu">
						<li><a href="#">Mon profil</a></li>
						<li><a href="connexionAcheteur.php">Se déconnecter</a></li>
					</ul>	
				</li>

			</ul>
		</div>


		<div id="section" align=center>
			<h2>Ajouter ou supprimer un vendeur</h2>


			<form action="GérerVendeursAdmin.php"  method="post">
				<table>
					<tr>
						<td>Prénom</td>
						<td><input type="text" name="prenom" placeholder="Entrer son prénom"></td>
					</tr>
					<tr>
						<td>Nom</td>
						<td><input type="text" name="nom" placeholder="Entrer son nom"></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="email" name="mail" placeholder="Entrer son adresse mail"></td>
					</tr>

					<tr>
						<td colspan="2" align=center>
							<br>
							<input type="submit" name="bouton1" value="Ajouter">
							<input type="submit" name="bouton2" value="Supprimer">
						</td>
					</tr>
				</table>
			</form>

			<?php
				if(isset($_GET['erreur'])){
					$err = $_GET['erreur'];
					if($err==1 || $err==2 || $err==3)
					echo "<p style='color:red'>Utilisateur, prénom ou nom incorrect</p>";
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


