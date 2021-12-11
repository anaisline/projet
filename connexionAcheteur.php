


<!DOCTYPE html>
<html>


<head>
	<meta charset="utf-8">
	<link href="connexionAcheteur.css" rel="stylesheet" type="text/css"/>
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
 			<li><a href="accueil.php">Accueil</a></li>

 			<li class="menu-deroulant">
 			<a href="parcourir.html">Parcourir les categories</a>
 			<ul class="sous-menu">
 				<li><a href="CatégoriesPoupées.php">Poupees</a></li>
 				<li><a href="CatégoriesJeux.php">Jeux</a></li>
 				<li><a href="CatégoriesInsolite.php">Insolite</a></li>
 				<li><a href="CatégorieAll.php">Tout parcourir</a></li>
 			</ul>
 			</li>

 			
 			<li><a href="messagerieSansConnexion.html">Messagerie</a></li>

 			<li><a href="panierSansConnexion.html">Panier</a></li>

 			<li class="menu-deroulant">
 			<a href="#">Mon compte</a>
 			<ul class="sous-menu">
 				<li><a href="connexionAcheteur.php">Se connecter</a></li>
 				<li><a href="nouveauClient.php">Creer son compte</a></li>
 			</ul>	
 			</li>
 		
 		</ul>

 	</div>


		<div id="section" align=center>
			<h2>Déjà client Fray Her ?</h2>


			<form action="connecterAcheteur.php"  method="post">
				<table>
					<tr>
						<td>Email</td>
						<td><input type="email" name="mail" placeholder="Entrer son adresse mail"></td>
					</tr>
					<tr>
						<td>Mot de passe</td>
						<td><input type="password" name="mdp" placeholder="Entrer son mot de passe"></td>
					</tr>

					<tr>
						<td colspan="2" align="center">
							<br>
							<input type="submit" name="bouton1" value="Se connecter">
						</td>
					</tr>
				</table>
			</form>
			<?php
			if(isset($_GET['erreur'])){
				$err = $_GET['erreur'];
				if($err==1 || $err==2)
					echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
			}
			?>


			<p>Nouveau client? Creer son compte <a href="nouveauClient.php">ici</a>.</p>

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


