<?php
session_start();
if(!isset($_SESSION['code']))
{
header("Location:login.php");
}
?>

<?php
require_once("connexionMysql.php");
if(isset($_GET['supp']))
{
	$requete2="DELETE FROM contact WHERE contactID='".$_GET['contactID']."' ";
	mysql_query($requete2);
	header("Location:contactAdmin.php");
}

$requete="SELECT * FROM contact ";
$resultat=mysql_query($requete);

?>

<?php include("top.php"); ?>	
	
	<div id="content">

<br/>
<table width="600" border="1" cellspacing="0" cellpadding="5">
  <tr>
    <td>Prenom</td>
    <td>Nom</td>
	<td>Email</td>
	<td>Message</td>
  </tr>
  <?php while($contact=mysql_fetch_array($resultat))  { ?>
  <tr>
    <td><?php echo $contact['prenom']; ?></td>
	<td><?php echo $contact['nom']; ?></td>
	<td><?php echo $contact['email']; ?></td>
	<td><?php echo $contact['message']; ?></td>
	<td><a href="contactAdmin.php?contactID=<?php echo $contact['contactID']; ?>&supp=ok" >Supprimer</a></td>
  </tr>
  <?php } ?>
</table>

<br><br>
</div>
		
<?php include("footer.php"); ?>