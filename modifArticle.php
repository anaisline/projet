<?php
session_start();
$id_vendeur=$_SESSION['id_vendeur'];
$id_articleAModif=$_SESSION['id_articleAModif'];
$database = "shopping";
//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$photo1=isset($_POST['photo1'])?$_POST['photo1']:"";
$photo2=isset($_POST['photo2'])?$_POST['photo2']:"";
$nom=isset($_POST['nom'])?$_POST['nom']:"";
$description=isset($_POST['description'])?$_POST['description']:"";
$typepaiement=isset($_POST['typepaiement'])?$_POST['typepaiement']:"";
$typecat=isset($_POST['typecat'])?$_POST['typecat']:"";
$prixArticle=isset($_POST['prixArticle'])?$_POST['prixArticle']:"";

if ($db_found) {
	$erreur = 0;

	if($nom!="")
	{
		$sql="UPDATE article_vendeur SET nom='$nom' WHERE id_article='$id_articleAModif' ";
		$result = mysqli_query($db_handle,$sql);
	}
	if($description!="")
	{
		$sql="UPDATE article_vendeur SET description='$description' WHERE id_article='$id_articleAModif' ";
		$result = mysqli_query($db_handle,$sql);
	}
	if($prixArticle!="")
	{
		$sql="UPDATE article_vendeur SET prix='$prixArticle' WHERE id_article='$id_articleAModif' ";
		$result = mysqli_query($db_handle,$sql);
	}
	if($photo1!="")
	{
		$sql2 = "SELECT * from photo WHERE id_article='$id_articleAModif'";
		$result2 = mysqli_query($db_handle, $sql2); 
		$data= mysqli_fetch_assoc($result2);
		$adresse1=$data['adresse_photo'];

		$sql="UPDATE photo SET adresse_photo='$photo1' WHERE (id_article='$id_articleAModif' and adresse_photo='$adresse1')";
		$result = mysqli_query($db_handle,$sql);

		if($data=mysqli_fetch_assoc($result2))
		{
			$adresse2=$data['adresse_photo'];
			if($photo2!="")
			{
				$sql="UPDATE photo SET adresse_photo='$photo2' WHERE (id_article='$id_articleAModif' and adresse_photo='$adresse2')";
				$result = mysqli_query($db_handle,$sql);
			}
			else
			{
				$sql2="DELETE FROM photo WHERE (adresse_photo='$adresse2' and id_article='$id_articleAModif')";
				$result = mysqli_query($db_handle,$sql2);
			}
		}else
		{

			$nb1=1;
			$id_photo1=$nb1;
			do{

				$sql = "SELECT * FROM photo";
                                //ID
				if ($id_photo1 != " ") {
					$sql .= " WHERE id_photo LIKE '%$id_photo1%'";
				}
				$resultPhoto1 = mysqli_query($db_handle, $sql);

				if (mysqli_num_rows($resultPhoto1) != 0)
				{
					$nb1++;
					$id_photo1=$nb1;
				}

			}while(mysqli_num_rows($resultPhoto1) != 0);

			$sql = "INSERT INTO photo (id_photo, adresse_photo, id_article) VALUES ('$id_photo1', '$photo2', '$id_articleAModif') ";
			$result =mysqli_query($db_handle, $sql);
		}
		
	}
	if($typepaiement!="")
	{
		if($typepaiement=="immediat" || $typepaiement=="negociable" || $typepaiement=="meilleur_prix")
		{
			$sql="UPDATE article_vendeur SET categorie_achat='$typepaiement' WHERE id_article='$id_articleAModif' ";
			$result = mysqli_query($db_handle,$sql);	
		}

	}
	if($typecat!="")
	{
		if($typecat=="poupees" || $typecat=="jeux" || $typecat=="insolites")
		{
			$sql="UPDATE article_vendeur SET categorie_type='$typecat' WHERE id_article='$id_articleAModif' ";
			$result = mysqli_query($db_handle,$sql);	
		}

	}
	if($erreur==0)
	{
		header('Location: pageModifArticle.php?erreur=0');
	}
	else
	{
		header('Location: pageModifArticle.php?erreur=1');
	}

}

?>