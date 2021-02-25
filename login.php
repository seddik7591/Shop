<?php
session_start();
require_once("connexionMysql.php");
$requete="SELECT user,pass  FROM login ";
$resultat=mysql_query($requete);
if(isset($_POST['bouton']))
{
$erreur=1;
while($login=mysql_fetch_array($resultat))  {
	if($_POST['user']==$login['user'] )
	{
	$erreur=0.5;
	if($_POST['code']==$login['pass'] ) 
		{
		$_SESSION['code']=$login['pass'] ; 
		$erreur=0;
		header("Location:admin.php");
		break;
		}
	}
} 
}
?>

<?php include("top.php"); ?>	
	
	<div id="content">

<br/>
<h2 style="text-align: center;">C'est un espace réservé à l'addministration</h2></br>

<?php  if((isset($erreur)) && ($erreur==1))  echo "<h2>Votre log est incorrecte</h2>";  ?>
<?php  if((isset($erreur)) && ($erreur==0.5))  echo "<h2>Votre mot de passe est incorrecte</h2>";  ?>

<form id="monform" name="form1" method="post" action="login.php">
  <p>
    <label>User :
      <input type="text" name="user" placeholder="utilisateur" />
    </label>
  </p>
  <p>
    <label>Password :
      <input type="password" name="code" placeholder="mot de passe" />
    </label>
  </p>
  <p>
    <label>
      <input type="submit" name="bouton"  value="Envoyer" />
    </label>
  </p>
</form>

<br><br>
</div>
		
<?php include("footer.php"); ?>
