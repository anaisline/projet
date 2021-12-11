<?php
session_start();
$id_acheteur=$_SESSION['id_acheteur'];
$prix_final = $_GET['prix_final'];
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

        	<h1>Vous avez remporté les enchères !!</h1>
            <br><br>
            <h2>Le prix de votre article est de <?php echo $prix_final ?></h2>
            
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