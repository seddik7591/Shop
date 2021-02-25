<?php
session_start();
if(!isset($_SESSION['code']))
{
header("Location:login.php");
}
?>
<?php
require_once("connexionMysql.php");
if(isset($_POST['bouton']))
{
if($_FILES['photo']['error']==0)
	{
		copy(  $_FILES['photo']['tmp_name'] ,  "images/".$_FILES['photo']['name']  );
	
	$requete="INSERT INTO articles SET articleID='".$_POST['articleID']."', nom='".$_POST['nom']."', prix='".$_POST['prix']."',  description='".$_POST['description']."', photo='".$_FILES['photo']['name']."', famillesID='".$_POST['famillesID']."' ";
	}
else
	$requete="INSERT INTO articles SET articleID='".$_POST['articleID']."', nom='".$_POST['nom']."',  prix='".$_POST['prix']."', description='".$_POST['description']."', famillesID='".$_POST['famillesID']."' ";
	$resultat=mysql_query($requete);
header("Location:admin.php");
}
$requete2="SELECT famillesID,nom_famille  FROM familles ";
$resultat2=mysql_query($requete2);
?>

<?php include("top.php"); ?>	
	
	<div id="content">

<br/>
<form id="monform" name="form1" method="post" enctype="multipart/form-data" action="articlesAjout.php">

  <p>
    <label>Nom :
      <input type="text" name="nom"  />
    </label>
  </p>
  <p>
    <label>Prix :
      <input type="text" name="prix"  />
    </label>
  </p>
  <p>
    <label>Description :
      <input type="text" name="description"  />
    </label>
  </p>
  <p>
    <label>Famille :
      <select name="famillesID" id="famillesID">
 		<?php while($familles=mysql_fetch_array($resultat2))  { ?>
    <option  value="<?php echo $familles['famillesID']; ?>" > <?php echo $familles['nom_famille']; ?> </option>
		<?php } ?>
   </select>
    </label>
  </p>
    <label>
  <input type="file" name="photo" id="photo" />
  </label>
  <p>
    <label>
      <input type="submit" name="bouton"  value="Envoyer" />
    </label>
  </p>
</form>
<br/><br/>
<a href="admin.php">retour<a>

<br><br>
</div>
		
<?php include("footer.php"); ?>