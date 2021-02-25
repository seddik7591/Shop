<?php
require_once("connexionMysql.php");
if(isset($_POST['bouton']))
{
	$requete=" INSERT INTO contact SET nom='".$_POST['nom']."' , prenom='".$_POST['prenom']."', email='".$_POST['email']."' , message='".$_POST['message']."'";

	$resultat=mysql_query($requete);
	header("Location:contact2.php");
}

?>

<?php include("top.php"); ?>	
	
	<div id="content">
				
				<article class="regular">
					<section>
						<br />
						<h2>Contacter nous par remplir le formulaire</h2>
						
						<form action="contact.php" method="POST" accept-charset="utf-8">

				<label>Nom :</label>
				<input type="text" name="nom"  placeholder="Nom">

				<label>Prenom :</label>
				<input type="text" name="prenom"  placeholder="Prenom">

				<label>Email :</label>
				<input type="text" name="email"  placeholder="Email@email.com">

				<label>Message :</label>
				<textarea name="message"></textarea>
				<br>
				<input type="submit" name="bouton" value="Envoyer">

				</form>
					</section>
				</article>
				
		</div>
		
<?php include("footer.php"); ?>
