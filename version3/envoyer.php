<?php
	session_start(); /* ON DEMARRE LA SESSION*/
	require('inc/_config.php'); /*CONNEXION A LA BDD*/
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Accueil</title>
        <link rel="stylesheet" href="style.css" />
        
    </head>
    <body>

        <header>
            <div id="bloc_accueil"><h1>Sté LaFaune</h1>
            <h2><a href="accueil.php">Accueil</a></h2>
            </div>
            <?php include("inc/_menu.php") ; ?>
        </header>

        <section>
<?php

	/*VERIFICATION DES IDENTIFIANTS*/
	$req = $bdd->prepare('SELECT * FROM clientConnu WHERE clt_code = :clt_code AND clt_motPasse = :clt_motPasse');
	$req->execute(array(
	    'clt_code' => $_POST['code_client'],
	    'clt_motPasse' => $_POST['password']));

	$resultat = $req->fetch();

	if (!$resultat) /*MAUVAIS IDENTIFIANTS*/
	{
	    echo 'Mauvais identifiant ou mot de passe !';
	}
	else /*IDENTIFIANT CORRECTE*/
	{
	    $time = time(); /*TIMESTAMP*/

	    /*créer un n-uplet de COMMANDE.*/
	    $req = $bdd->prepare('INSERT INTO commande VALUES(:cde_client, :cde_moment)');
		$req->execute(array(
			'cde_client' => $_POST['code_client'],
			'cde_moment' => $time
			));



		$i = count($_SESSION["reference"]);
		$j = 0;

		while ($j < $i) 
		{
			/*pour chaque article commandé faire créer un n-uplet de CONTENIR*/
			$req = $bdd->prepare('INSERT INTO contenir VALUES(:cde_client, :cde_moment, :produit, :quantite)');
			$req->execute(array(
				'cde_client' => $_POST['code_client'],
				'cde_moment' => $time,
				'produit' => $_SESSION["reference"][$j],
				'quantite' => $_SESSION["quantite"][$j]
				));
			$req->closeCursor();
			$j = $j+1;
		}

		echo 'Votre commande a bien été enregistrée sous la référence '.$_POST['code_client']. '/' .$time.'!';
		session_destroy(); /*ON EFFACE TOUTES LES VARIABLES SESSIONS*/
	}
?>
        </section>

        <footer>
            <div id = "copyright">
                <p align="center"> Copyright - Akram - Kevin</p>
            </div>
        </footer>
    </body>
</html>

