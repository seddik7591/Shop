<?php
require_once("connexionMysql.php");
$requete="SELECT *  FROM articles";
$resultat=mysql_query($requete);
?>

<?php include("top.php"); ?>	
	
	<div id="content">
				<article class="products">
					
						
	<section id="featured">
				<ul class="column">
				    
					<?php while($articles=mysql_fetch_array($resultat))  { ?>
				    <li>
				        <section class="outerblock">
				        	<div class="innerblock">
									<img src="images/<?php echo $articles['photo']; ?>" style="width: 120px; height: 150px;" alt="" /> 
										<p>
										<b><a href="#"><?php echo $articles['nom']; ?></a></b>
										<br />
										<?php echo $articles['prix']; ?> DA
										<br />
										<?php echo $articles['description']; ?>
										</p> 
										
									</div>
				        </section>
				    </li>
				    <?php } ?>
					
				</ul>
				</section>
				</article>
				
				
		</div>
		
<?php include("footer.php"); ?>
