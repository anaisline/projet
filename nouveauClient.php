<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="nouveauClient.css" rel="stylesheet" type="text/css"/>
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
						<li><a href="#">Poupees</a></li>
						<li><a href="#">Jeux</a></li>
						<li><a href="#">Insolite</a></li>
						<li><a href="#">Tout parcourir</a></li>
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
			<h2>Nouveau client ? <br>Créez votre compte :</h2>

			<?php
			if(isset($_GET['erreur'])){
				$err = $_GET['erreur'];
				if($err==1)
					echo "<p style='color:red'>Un ou plusieurs champs sont vides.</p>";
				if($err==2)
					echo "<p style='color:red'>Veuillez accepter les termes et les conditions.</p>";
				if($err==3)
					echo "<p style='color:red'>Il existe déjà un compte avec cet email.</p>";
			}
			?>
			<form action="creerCompte.php" method="post">
				<table>
					<tr>
						<td><label>Nom <span class="required">*</span></label></td>
						<td><input type="text" name="nom" class="field-long" placeholder="Entrer votre nom de famille" />
						</td>
					</tr>

					<tr>
						<td><label>Prenom <span class="required">*</span></label></td>
						<td><input type="text" name="prenom" class="field-long" placeholder="Entrer votre prenom" />
						</td>
					</tr>

					<tr>
						<td><label>Adresse <span class="required">*</span></label></td>
						<td><input type="text" name="adresse_l1" class="field-long" placeholder="Entrer votre adresse" />
						</td>
					</tr>

					<tr>
						<td><label>Ville <span class="required">*</span></label></td>
						<td><input type="text" name="ville" class="field-long" placeholder="Entrer votre ville" />
						</td>
					</tr>

					<tr>
						<td><label>Code postal <span class="required">*</span></label></td>
						<td><input type="text" name="code_postal" class="field-long" placeholder="Entrer votre code postal" />
						</td>
					</tr>

					<tr>
						<td><label>Email <span class="required">*</span></label></td>
						<td><input type="email" name="mail" class="field-long" placeholder="Entrer votre adresse mail" />
						</td>
					</tr>

					<tr>
						<td><label>Telephone <span class="required">*</span></label></td>
						<td><input type="text" name="tel" class="field-long" placeholder="Entrer votre numero" />
						</td>
					</tr>

					<tr> 
						<td><label>Mot de passe <span class="required">*</span></label></td>
						<td><input type="password" name="mdp" class="field-long" placeholder="Entrer votre mot de passe" />
						</td>
					</tr>

					<tr> 
						<td><label>Type de compte<span class="required">*</span></label></td>
						<td>
							<select name="typeCompte" class="field-select" >
								<option value="Acheteur">Acheteur</option>
								<option value="Vendeur">Vendeur</option>
							</select>
						</td>
					</tr>

					<tr>
						<td align="left">
							<input type="checkbox" name="clause" value="oui">
						</td>
						<td>
							You agree to our Terms and Policy.<span class="required">*</span>
						</td>

						
					</tr>

					<tr>
						<td colspan="2" align=center>
							<input type="submit" name="connexion" value="Creer son compte">
						</td>

					</tr>


				</table>
			</form>

			

			<p>Deja client? Identifiez-vous <a href="connexionAcheteur.php">ici</a>.</p>

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