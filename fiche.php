<!-- seddik7591@gmail.com -->
<?php
require_once("connexionMysql.php");
if(isset($_GET['supp']))
{
	$requete2="DELETE FROM articles WHERE articleID='".$_GET['articleID']."' ";
	mysql_query($requete2);
	header("Location:admin.php");
}
$requete="SELECT a.articleID, a.nom, a.prix, a.description, a.photo, f.nom_famille FROM articles AS a, familles AS f WHERE articleID='".$_GET['articleID']."' AND a.famillesID=f.famillesID ";
$resultat=mysql_query($requete);
$articles=mysql_fetch_array($resultat);
?>

<?php include("top.php"); ?>	
	
	<div id="content">

<br/>

<table width="600" border="1" cellspacing="0" cellpadding="5">
  
  <tr>
    <td>Nom</td>
    <td><?php echo $articles['nom']; ?></td>
  </tr>
  <tr>
    <td>Prix</td>
    <td><?php echo $articles['prix']; ?></td>
  </tr>
  <tr>
    <td>Description</td>
    <td><?php echo $articles['description']; ?></td>
  </tr>
  <tr>
    <td>Famille</td>
    <td><?php echo $articles['nom_famille']; ?></td>
  </tr>
  <tr>
    <td>Photo</td>
    <td><img  src="images/<?php echo $articles['photo']; ?>" style="width:300; height:300;"></td>
  </tr>
</table>
<br/><br/>
<a href="fiche.php?articleID=<?php echo $articles['articleID'];?>&supp=ok" >Supprimer</a><br/>
<a href="admin.php">retour</a><br/>

<br><br>
</div>
		
<?php include("footer.php"); ?>