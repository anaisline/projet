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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<meta charset="utf-8">
	<link href="modif.css" rel="stylesheet" type="text/css"/>
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
            <li><a href="profil_acheteur.php">Mon profil</a></li>
            <li><a href="connexionAcheteur.php">Se deconnecter</a></li>
            
        </li>
     </ul>
</div>


<div class="container">] <div class=" text-center mt-5 ">
	<br>
        <h2>Creer une alerte</h2>
        <br><br>
    </div>
    <form action="creerAlerte.php" method="post">
    <div class="row ">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    <div class="container">
                        <form id="contact-form" role="form">
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">Mot Clé 1* </label> <input id="form_name" type="text" name="mot_cle_1" class="form-control" placeholder="Entrez le nom de l'article" required="required" data-error="Ce champ est requis."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">Mot Clé 2 </label> <input id="form_name" type="text" name="mot_cle_2" class="form-control" placeholder="Entrez le nom de l'article"> </div>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">Mot Clé 3</label> <input id="form_name" type="text" name="mot_cle_3" class="form-control" placeholder="Entrez le nom de l'article" > </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group"> <label for="form_need">Type d'achat*</label> <select id="form_need" name="categorie_achat" class="form-control" required="required" data-error="Please specify your need.">
                                                <option>immediat</option>
                                                <option>negociable</option>
                                                <option>meilleur_prix</option>
                                            </select> </div>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                   
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_need">Categorie*</label> <select id="form_need" name="categorie_type" class="form-control" required="required" data-error="Entrez la categorie.">
                                                <option>poupees</option>
                                                <option>jeux</option>
                                                <option>insolites</option>
                                            </select> </div>
                                    </div>
                                </div>
                                <div class="row">
                                	<?php
											if(isset($_GET['erreur'])){
												$err = $_GET['erreur'];
												if($err==1)
													echo "<p style='color:red'>Cette alerte existe deja.</p>";
											}
											?>
                                    
                                    <div class="col-md-12" align=center> <input type="submit" class="btn btn-primary profile-button " name ="creer" value="Creer"> </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- /.8 -->
        </div> <!-- /.row-->
    </div>
</form>
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