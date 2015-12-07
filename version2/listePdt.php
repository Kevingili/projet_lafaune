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
            <?php include("menu.php") ; ?>
        </header>

        <section>
        <table align="center" border="4">
            <tr>
                <th>Photo</th>
                <th>Référence</th>
                <th>Désignation</th>
                <th>Prix</th>
            </tr>

            <?php 
            $reponse = $bdd->prepare('SELECT * FROM produit WHERE pdt_categorie = ? ');
            $reponse->execute(array($_GET["categ"] ));

            while ($donnees = $reponse->fetch())
            {
            ?>
                <tr>
                    <td><img src="images/<?php echo $donnees['pdt_image']; ?>" /></td>
                    <td><?php echo $donnees['pdt_ref']; ?></td>
                    <td><?php echo $donnees['pdt_designation']; ?></td>
                    <td><?php echo $donnees['pdt_prix']; ?> €</td>
                </tr>
               </p>
            <?php
            }
            $reponse->closeCursor(); 

            ?>

        </table>    
        </section>

        <footer>
            <div id = "copyright">
                <p align="center"> Copyright - Akram - Kevin</p>
            </div>
        </footer>
    </body>
</html>

