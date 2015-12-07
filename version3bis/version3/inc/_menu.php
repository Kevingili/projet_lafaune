<?php
	try
	{
	    $bdd = new PDO('mysql:host=localhost;dbname=baselafaune1;charset=utf8', 'lafaune', 'secret');
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}
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

    <p><a href="vider_panier.php">Vider le panier</a></p>

	<p><a href="commande.php">Commander</a></p>

	<p><a href="mailcommercial.php">Contactez un commercial</a></p>
</nav>
