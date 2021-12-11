<?php
session_start();
$id_acheteur=$_SESSION['id_acheteur'];
$prixTot = 0;
$nbArticles = 0;

$mysqli = new mysqli("localhost", "root", "", "shopping");
$mysqli -> set_charset("utf8");
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="Panier_Acheteur.css" rel="stylesheet" type="text/css"/>
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

    <h2>Votre panier</h2>

        <div id="section" align=center>

            <!-- Catégorie immédiat-->
            
            <?php
            $requeteArticle = "SELECT * from article_vendeur, panier where panier.id_acheteur = $id_acheteur
            and panier.id_article = article_vendeur.id_article";
            $resultat = $mysqli -> query($requeteArticle);

            while ($ligne = $resultat -> fetch_assoc()) {
                if($ligne['categorie_achat'] == "immediat"){
                    $nbArticles++;
                ?>
                <form>
                    <table>
                        <tr align=center>
                            <td colspan='2'>
                                <?php
                                echo $ligne['nom'];
                                ?>
                            </td>
                        </tr>
                        

                        <tr align=center>
                            <td>
                                <?php
                                $recup = $ligne['id_article'];

                                $requPhoto = "SELECT adresse_photo from photo, article_vendeur where photo.id_article = $recup";
                                $resultatPhoto = $mysqli -> query($requPhoto);

                                $count = "SELECT count(id_photo) as numero from photo where photo.id_article = $recup";
                                $resCount = mysqli_query($mysqli, $count);
                                $data2 = mysqli_fetch_array($resCount);

                                for ($i=0; $i < $data2['numero']; $i++) { 
                                    $ligne1 = $resultatPhoto -> fetch_assoc();
                                    echo '<img src="'. $ligne1['adresse_photo'] .'" alt="" />';
                                }

                                ?>
                            </td>
                            <td>
                                <?php
                                echo "Description : " . $ligne['description'];
                                ?>
                            </td>
                        </tr>
                        <?php

                        $recup = $ligne['id_vendeur'];

                        $requNom = "SELECT * from vendeur where vendeur.id_vendeur = $recup";
                        $resultatNom = $mysqli -> query($requNom);

                        $ligne1 = $resultatNom -> fetch_assoc();
                        $var = $ligne1['nom'];
                        $var2 = $ligne1['prenom'];
                        ?>

                        <tr align=center>
                            <td>
                                    <?php
                                    echo "<a href='VisiteProfilVend.php?nom=".$var."&prenom=".$var2." '>$var</a>";
                                    ?>
                            </td>
                            <td>
                                <?php
                                echo $ligne['prix'] . " euros";
                                $prixTot += $ligne['prix'];
                                ?>
                            </td>
                        </tr>

                        <tr align=center>
                            <td>
                                <?php
                                echo "Achat " . $ligne['categorie_achat'];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo "Mis en vente le : " . $ligne['date'];
                                ?>
                            </td>
                        </tr>
                    </table>
                </form>
                <?php
                }
            }

            $requeteArticle = "SELECT * from article_admin, panier where panier.id_acheteur = $id_acheteur
            and panier.id_article = article_admin.id_article";
            $resultat = $mysqli -> query($requeteArticle);

            while ($ligne = $resultat -> fetch_assoc()) {
                if($ligne['categorie_achat'] == "immediat"){
                    $nbArticles++;
                ?>
                <form>
                    <table>
                        <tr align=center>
                            <td colspan='2'>
                                <?php
                                echo $ligne['nom'];
                                ?>
                            </td>
                        </tr>
                        

                        <tr align=center>
                            <td>
                                <?php
                                $recup = $ligne['id_article'];

                                $requPhoto = "SELECT adresse_photo from photo, article_admin where photo.id_article = $recup";
                                $resultatPhoto = $mysqli -> query($requPhoto);

                                $count = "SELECT count(id_photo) as numero from photo where photo.id_article = $recup";
                                $resCount = mysqli_query($mysqli, $count);
                                $data2 = mysqli_fetch_array($resCount);

                                for ($i=0; $i < $data2['numero']; $i++) { 
                                    $ligne1 = $resultatPhoto -> fetch_assoc();
                                    echo '<img src="'. $ligne1['adresse_photo'] .'" alt="" />';
                                }

                                ?>
                            </td>
                            <td>
                                <?php
                                echo "Description : " . $ligne['description'];
                                ?>
                            </td>
                        </tr>
                        <?php

                        $recup = $ligne['id_admin'];

                        $requNom = "SELECT * from administrateur where administrateur.id_admin = $recup";
                        $resultatNom = $mysqli -> query($requNom);

                        $ligne1 = $resultatNom -> fetch_assoc();
                        $var = $ligne1['nom'];
                        $var2 = $ligne1['prenom'];
                        ?>

                        <tr align=center>
                            <td>
                                    <?php
                                    echo "<a href='VisiteProfilAdmin.php?nom=".$var."&prenom=".$var2." '>$var</a>";
                                    ?>
                            </td>
                            <td>
                                <?php
                                echo $ligne['prix'] . " euros";
                                $prixTot += $ligne['prix'];
                                ?>
                            </td>
                        </tr>

                        <tr align=center>
                            <td>
                                <?php
                                echo "Achat " . $ligne['categorie_achat'];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo "Mis en vente le : " . $ligne['date'];
                                ?>
                            </td>
                        </tr>
                    </table>
                </form>
                <?php
                }
            }
            ?>

            <table align=right>
                <tr align=center>
                    <td>
                        Nombre d'article(s): <?php echo "$nbArticles"?>
                    </td>
                    <td>
                        Total : <?php echo "$prixTot"?> euros
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align=center>
                        <?php
                        if($prixTot>0)
                        {
                            ?>
                            <a href="achatImmediat.php"><input type="submit" name="Payer" value="Payer"></a>
                            <?php
                        }
                        else
                        {
                            ?>
                             <a href=""><input type="submit" name="Payer" value="Payer"></a>
                             <?php
                        }
                        ?>
                    
                    </td>
                    
                </tr>
                <?php
                if(isset($_GET['acheter'])){
                
                    echo "<p style='color:red'>Cet article n'existe pas.</p>";
            }
            ?>
            </table>
            <?php
                if(isset($_GET['acheter'])){
                
                    echo "<p style='color:red'>Cet article n'existe pas.</p>";
            }
            ?>

            <!-- Catégorie enchères-->
        </div>

        <br><br><br>

        <h2>Articles à lancer aux enchères</h2>

        <?php
        if(isset($_GET['erreur'])){
            $err = $_GET['erreur'];
            if($err==1){
                echo "<p align=center style='color:red'>Vous avez déjà lancé cet article aux enchères</p>";
                $err=0;
            }
            if($err==2){
                echo "<p align=center style='color:red'>Vous n'avez pas lancé les enchères de cet article</p>";
                $err=0;
            }
        }
        ?>

        <div id="section" align=center>

            <?php
            $requeteArticle = "SELECT * from article_vendeur, panier where panier.id_acheteur = $id_acheteur
            and panier.id_article = article_vendeur.id_article";
            $resultat1 = $mysqli -> query($requeteArticle);
            $today = date("Y-m-d");
            $today_time = strtotime($today);

            while ($ligne = $resultat1 -> fetch_assoc()) {
                if($ligne['categorie_achat'] == "meilleur_prix"){
                    $nbArticles++;
                ?>
                <form>
                    <table>
                        <tr align=center>
                            <td colspan='2'>
                                <?php
                                echo $ligne['nom'];
                                ?>
                            </td>
                        </tr>
                        

                        <tr align=center>
                            <td>
                                <?php
                                $recup = $ligne['id_article'];

                                $requPhoto = "SELECT adresse_photo from photo, article_vendeur where photo.id_article = $recup";
                                $resultatPhoto = $mysqli -> query($requPhoto);

                                $count = "SELECT count(id_photo) as numero from photo where photo.id_article = $recup";
                                $resCount = mysqli_query($mysqli, $count);
                                $data2 = mysqli_fetch_array($resCount);

                                for ($i=0; $i < $data2['numero']; $i++) { 
                                    $ligne1 = $resultatPhoto -> fetch_assoc();
                                    echo '<img src="'. $ligne1['adresse_photo'] .'" alt="" />';
                                }

                                ?>
                            </td>
                            <td>
                                <?php
                                echo "Description : " . $ligne['description'];
                                ?>
                            </td>
                        </tr>
                        <?php

                        $recup = $ligne['id_vendeur'];

                        $requNom = "SELECT * from vendeur where vendeur.id_vendeur = $recup";
                        $resultatNom = $mysqli -> query($requNom);

                        $ligne1 = $resultatNom -> fetch_assoc();
                        $var = $ligne1['nom'];
                        $var2 = $ligne1['prenom'];
                        ?>

                        <tr align=center>
                            <td>
                                    <?php
                                    echo "<a href='VisiteProfilVend.php?nom=".$var."&prenom=".$var2." '>$var</a>";
                                    ?>
                            </td>
                            <td>
                                <?php
                                echo $ligne['prix'] . " euros";
                                $prixTot += $ligne['prix'];
                                ?>
                            </td>
                        </tr>

                        <tr align=center>
                            <td>
                                <?php
                                echo "Achat " . $ligne['categorie_achat'];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo "Mis en vente le : " . $ligne['date'];
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <?php
                            $expire = $ligne['date_fin']; //from database
                            $expire_time = strtotime($expire);

                            if($today_time < $expire_time){
                            ?>
                                <td colspan="2" align=center>
                                    <?php
                                    $varArt = $ligne['id_article'];
                                    $varVend = $ligne['id_vendeur'];
                                    $varPrix = $ligne['prix'];
                                    $varDateFin = $ligne['date_fin'];
                                    echo "<a href='EncheresAcheteurVend.php?id_article=".$varArt."&id_vendeur=".$varVend."&prix_init=".$varPrix."&date_fin=".$varDateFin."'>Lancer les enchères</a>";
                                    ?>
                                </td>
                                <?php
                            }
                            else{
                                ?>
                                <td colspan="2" align=center>
                                    <?php
                                    $varArt = $ligne['id_article'];
                                    $varVend = $ligne['id_vendeur'];
                                    $varPrix = $ligne['prix'];
                                    $varDateFin = $ligne['date_fin'];
                                    echo "<a href='EncheresAcheteurResultTraitement.php?id_article=".$varArt."&id_vendeur=".$varVend."&prix_init=".$varPrix."&date_fin=".$varDateFin."'>Obtenir les resultats</a>";
                                    ?>
                                </td>
                                <?php
                            }
                            ?>
                            
                        </tr>
                    </table>
                </form>
                <?php
                }
            }

            $requeteArticle = "SELECT * from article_admin, panier where panier.id_acheteur = $id_acheteur
            and panier.id_article = article_admin.id_article";
            $resultat2 = $mysqli -> query($requeteArticle);

            while ($ligne = $resultat2 -> fetch_assoc()) {
                if($ligne['categorie_achat'] == "meilleur_prix"){
                    $nbArticles++;
                ?>
                <form>
                    <table>
                        <tr align=center>
                            <td colspan='2'>
                                <?php
                                echo $ligne['nom'];
                                ?>
                            </td>
                        </tr>
                        

                        <tr align=center>
                            <td>
                                <?php
                                $recup = $ligne['id_article'];

                                $requPhoto = "SELECT adresse_photo from photo, article_admin where photo.id_article = $recup";
                                $resultatPhoto = $mysqli -> query($requPhoto);

                                $count = "SELECT count(id_photo) as numero from photo where photo.id_article = $recup";
                                $resCount = mysqli_query($mysqli, $count);
                                $data2 = mysqli_fetch_array($resCount);

                                for ($i=0; $i < $data2['numero']; $i++) { 
                                    $ligne1 = $resultatPhoto -> fetch_assoc();
                                    echo '<img src="'. $ligne1['adresse_photo'] .'" alt="" />';
                                }

                                ?>
                            </td>
                            <td>
                                <?php
                                echo "Description : " . $ligne['description'];
                                ?>
                            </td>
                        </tr>
                        <?php

                        $recup = $ligne['id_admin'];

                        $requNom = "SELECT * from administrateur where administrateur.id_admin = $recup";
                        $resultatNom = $mysqli -> query($requNom);

                        $ligne1 = $resultatNom -> fetch_assoc();
                        $var = $ligne1['nom'];
                        $var2 = $ligne1['prenom'];
                        ?>

                        <tr align=center>
                            <td>
                                    <?php
                                    echo "<a href='VisiteProfilAdmin.php?nom=".$var."&prenom=".$var2." '>$var</a>";
                                    ?>
                            </td>
                            <td>
                                <?php
                                echo $ligne['prix'] . " euros";
                                $prixTot += $ligne['prix'];
                                ?>
                            </td>
                        </tr>

                        <tr align=center>
                            <td>
                                <?php
                                echo "Achat " . $ligne['categorie_achat'];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo "Mis en vente le : " . $ligne['date'];
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <?php
                            $expire = $ligne['date_fin']; //from database
                            $expire_time = strtotime($expire);

                            if($today_time < $expire_time){
                            ?>
                                <td colspan="2" align=center>
                                    <?php
                                    $varArt = $ligne['id_article'];
                                    $varVend = $ligne['id_admin'];
                                    $varPrix = $ligne['prix'];
                                    $varDateFin = $ligne['date_fin'];
                                    echo "<a href='EncheresAcheteurVend.php?id_article=".$varArt."&id_vendeur=".$varVend."&prix_init=".$varPrix."&date_fin=".$varDateFin."'>Lancer les enchères</a>";
                                    ?>
                                </td>
                                <?php
                            }
                            else{
                                ?>
                                <td colspan="2" align=center>
                                    <?php
                                    $varArt = $ligne['id_article'];
                                    $varVend = $ligne['id_admin'];
                                    $varPrix = $ligne['prix'];
                                    $varDateFin = $ligne['date_fin'];
                                    echo "<a href='EncheresAcheteurResultTraitement.php?id_article=".$varArt."&id_vendeur=".$varVend."&prix_init=".$varPrix."&date_fin=".$varDateFin."'>Obtenir les resultats</a>";
                                    ?>
                                </td>
                                <?php
                            }
                            ?>
                            
                        </tr>
                    </table>
                </form>
                <?php
                }
            }

            if(isset($_GET['acheter'])){
            
                echo "<p style='color:red'>Cet article n'existe pas.</p>";
            }

            if (mysqli_num_rows($resultat1) == 0 and mysqli_num_rows($resultat2) == 0){
                echo "<p>Cette catégorie est vide</p>";
            }
            ?>

        </div>

            <!-- Catégorie négociable-->

            <h2>Articles négociables</h2>

            <div id="section" align=center>

            <?php
            $requeteArticle = "SELECT * from article_vendeur, panier where panier.id_acheteur = $id_acheteur
            and panier.id_article = article_vendeur.id_article";
            $resultat3 = $mysqli -> query($requeteArticle);

            while ($ligne = $resultat3 -> fetch_assoc()) {
                if($ligne['categorie_achat'] == "negociable"){
                    $nbArticles++;
                ?>
                <form>
                    <table>
                        <tr align=center>
                            <td colspan='2'>
                                <?php
                                echo $ligne['nom'];
                                ?>
                            </td>
                        </tr>
                        

                        <tr align=center>
                            <td>
                                <?php
                                $recup = $ligne['id_article'];

                                $requPhoto = "SELECT adresse_photo from photo, article_vendeur where photo.id_article = $recup";
                                $resultatPhoto = $mysqli -> query($requPhoto);

                                $count = "SELECT count(id_photo) as numero from photo where photo.id_article = $recup";
                                $resCount = mysqli_query($mysqli, $count);
                                $data2 = mysqli_fetch_array($resCount);

                                for ($i=0; $i < $data2['numero']; $i++) { 
                                    $ligne1 = $resultatPhoto -> fetch_assoc();
                                    echo '<img src="'. $ligne1['adresse_photo'] .'" alt="" />';
                                }

                                ?>
                            </td>
                            <td>
                                <?php
                                echo "Description : " . $ligne['description'];
                                ?>
                            </td>
                        </tr>
                        <?php

                        $recup = $ligne['id_vendeur'];

                        $requNom = "SELECT * from vendeur where vendeur.id_vendeur = $recup";
                        $resultatNom = $mysqli -> query($requNom);

                        $ligne1 = $resultatNom -> fetch_assoc();
                        $var = $ligne1['nom'];
                        $var2 = $ligne1['prenom'];
                        ?>

                        <tr align=center>
                            <td>
                                    <?php
                                    echo "<a href='VisiteProfilVend.php?nom=".$var."&prenom=".$var2." '>$var</a>";
                                    ?>
                            </td>
                            <td>
                                <?php
                                echo $ligne['prix'] . " euros";
                                $prixTot += $ligne['prix'];
                                ?>
                            </td>
                        </tr>

                        <tr align=center>
                            <td>
                                <?php
                                echo "Achat " . $ligne['categorie_achat'];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo "Mis en vente le : " . $ligne['date'];
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align=center>
                                <?php
                                $id_article = $ligne['id_article'];
                                $id_vendeur = $ligne['id_vendeur'];

                                echo "<a href='nego.php?id_article=".$id_article."&id_vendeur=".$id_vendeur."'>Négocier</a>";
                                ?>
                            </td>
                        </tr>
                    </table>
                </form>
                <?php
                }
            }

            $requeteArticle = "SELECT * from article_admin, panier where panier.id_acheteur = $id_acheteur
            and panier.id_article = article_admin.id_article";
            $resultat4 = $mysqli -> query($requeteArticle);

            while ($ligne = $resultat4 -> fetch_assoc()) {
                if($ligne['categorie_achat'] == "negociable"){
                    $nbArticles++;
                ?>
                <form>
                    <table>
                        <tr align=center>
                            <td colspan='2'>
                                <?php
                                echo $ligne['nom'];
                                ?>
                            </td>
                        </tr>
                        

                        <tr align=center>
                            <td>
                                <?php
                                $recup = $ligne['id_article'];

                                $requPhoto = "SELECT adresse_photo from photo, article_admin where photo.id_article = $recup";
                                $resultatPhoto = $mysqli -> query($requPhoto);

                                $count = "SELECT count(id_photo) as numero from photo where photo.id_article = $recup";
                                $resCount = mysqli_query($mysqli, $count);
                                $data2 = mysqli_fetch_array($resCount);

                                for ($i=0; $i < $data2['numero']; $i++) { 
                                    $ligne1 = $resultatPhoto -> fetch_assoc();
                                    echo '<img src="'. $ligne1['adresse_photo'] .'" alt="" />';
                                }

                                ?>
                            </td>
                            <td>
                                <?php
                                echo "Description : " . $ligne['description'];
                                ?>
                            </td>
                        </tr>
                        <?php

                        $recup = $ligne['id_admin'];

                        $requNom = "SELECT * from administrateur where administrateur.id_admin = $recup";
                        $resultatNom = $mysqli -> query($requNom);

                        $ligne1 = $resultatNom -> fetch_assoc();
                        $var = $ligne1['nom'];
                        $var2 = $ligne1['prenom'];
                        ?>

                        <tr align=center>
                            <td>
                                    <?php
                                    echo "<a href='VisiteProfilAdmin.php?nom=".$var."&prenom=".$var2." '>$var</a>";
                                    ?>
                            </td>
                            <td>
                                <?php
                                echo $ligne['prix'] . " euros";
                                $prixTot += $ligne['prix'];
                                ?>
                            </td>
                        </tr>

                        <tr align=center>
                            <td>
                                <?php
                                echo "Achat " . $ligne['categorie_achat'];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo "Mis en vente le : " . $ligne['date'];
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align=center>
                                <?php
                                 $id_articleA = $ligne['id_article'];
                                $id_admin = $ligne['id_admin'];

                                echo "<a href='nego.php?id_article=".$id_articleA."&id_vendeur=".$id_admin."'>Négocier</a>";

                                ?>
                            </td>
                        </tr>
                    </table>
                </form>
                <?php
                }
            }
            if(isset($_GET['acheter'])){
            
                echo "<p style='color:red'>Cet article n'existe pas.</p>";
            }
            if (mysqli_num_rows($resultat) == 0 and mysqli_num_rows($resultat2) == 0){
                echo "<p>Cette catégorie est vide</p>";
            }
            $mysqli -> close();
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
