<?php
	require("_config.php");
?>

<nav>
    <ul>
        <h2>Nos produits</h2>
        <?php
			$reponse = $bdd->query('SELECT * FROM categorie');

			while ($donnees = $reponse->fetch())
			{
			    ?>
			    <li><a href="listePdt.php?categ=<?php echo $donnees['cat_code']; ?>"><?php echo $donnees['cat_libelle']; ?></a></li>
			    <?php
			}

		$reponse->closeCursor();

		?>

    </ul> 

    <hr />

	<form action="panier.php" target="menu" method="get">
		<input type="submit" name="action" value="Vider le panier" />
	</form>
	<br />
	<form action="commande.php" target="menu" method="get">
		<input type="submit" value="Commander" />
	</form>

	<p><a href="mailcommercial.php">Contactez un commercial</a></p>
</nav>
