<?php
// seddik7591@gmail.com
session_start();
if(isset($_GET['logout']))
{
unset($_SESSION['code']);
}
if(!isset($_SESSION['code']))
{
header("Location:login.php");
}
?>

<?php
require_once("connexionMysql.php");
if(isset($_GET['famille']))
$requete="SELECT * FROM articles WHERE famillesID=".$_GET['famille'] ;
else
$requete="SELECT * FROM articles ";

$resultat=mysql_query($requete);
$requete2="SELECT famillesID,nom_famille  FROM familles ";
$resultat2=mysql_query($requete2);
?>

<?php include("top.php"); ?>	
	
	<div id="content">

<br/>
<form id="form1" name="form1" method="get" action="<?php  echo $_SERVER['PHP_SELF']; ?>">
  <label>Sélectionnez une famille :
  <select name="famille" id="famille">
  <?php while($familles=mysql_fetch_array($resultat2))  { ?>
  
    <option <?php  if(!isset($_GET['famille'])) $_GET['famille']=1; if($familles['famillesID']==$_GET['famille']) echo  "selected='selected'"; ?> value="<?php echo $familles['famillesID']; ?>" > <?php echo $familles['nom_famille']; ?> </option>
  <?php } ?>
  </select>
  </label>
  <label>
  <input type="submit" name="bouton" id="bouton" value="Envoyer" />
  </label>
</form>
<a href="admin.php?logout=ok" >Deconnexion</a>
<br/>
<a href="articlesAjout.php" >Ajout d'un article </a>
<br/>
<a href="contactAdmin.php" >Les contacts </a>
<br/><br/>
<table width="600" border="1" cellspacing="0" cellpadding="5">
  <tr>
    <td>Article</td>
	<td>Voir la fiche</td>
  </tr>
  <?php while($articles=mysql_fetch_array($resultat))  { ?>
  <tr>
    <td><?php echo $articles['nom']; ?></td>
	<td><a href="fiche.php?articleID=<?php echo $articles['articleID']; ?>" >Voir</a></td>
  </tr>
  <?php } ?>
</table>

<br><br>
</div>
		
<?php include("footer.php"); ?>