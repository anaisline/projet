<?php
session_start();
$id_acheteur=$_SESSION['id_acheteur'];
$id_article = $_GET['id_article'];
$id_vendeur = $_GET['id_vendeur'];
$prix_init = $_GET['prix_init'];
$date_fin = $_GET['date_fin'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="EncheresAcheteurVend.css" rel="stylesheet" type="text/css"/>
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

        <div id="section" align=center>

        	<h2>Fixez votre prix maximal :</h2>

        	<?php
	        if(isset($_GET['erreur'])){
	            $err = $_GET['erreur'];
	            if($err==1){
	                echo "<p style='color:red'>Votre prix maximal doit être supérieur au prix initial</p>";
	                $err=0;
	            }
	        }
	        ?>

        	<form action="EncheresAcheteurVendTraitement.php" method="post">
        		<?php
        		$_SESSION['id_article'] = $id_article;
				$_SESSION['id_vendeur'] = $id_vendeur;
				$_SESSION['prix_init'] = $prix_init;
				$_SESSION['date_fin'] = $date_fin;
        		?>
        		<table>
        			<tr>
        				<td>
        					Quel est le prix maximal que vous pouvez mettre ?
        				</td>
        				<td align=center>
        					<input type="text" name="prix_max" value="Prix maximum">
        				</td>
        			</tr>
        			<tr>
        				<td colspan="2" align=center>
        					<input type="submit" name="Valider" value="Valider">
        				</td>
        			</tr>
        		</table>
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