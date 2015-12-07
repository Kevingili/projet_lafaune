<?php
    session_start(); /* ON DEMARRE LA SESSION*/

    if (!isset($_SESSION["reference"])) /*SI LA VARIABLE REFERENCE DE $_SESSION N'EXISTE PAS*/
    {
        $_SESSION["reference"]=array(); /*ON CREER UN TABLEAU REFERENCE DE $_SESSION*/
        $_SESSION["quantite"]=array(); /*ON CREER UN TABLEAU QUANTITE DE $_SESSION*/
    }
    
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
            <h1>Récapitulatif des articles commandés</h1>

            <?php
                $j = 0; 
                $i = count($_SESSION["reference"]); /*ON INITIALISE $i AVEC LE NOMBRE DE LIGNES QUE CONTIENT LE TABLEAU REFERENCE*/
                $total = 0;
                if ($i == 0) /*SI LE TABLEAU EST VIDE*/
                {
                    echo "aucun article commandé"; 
                }
                else
                {
            ?>

            <table align="center" border="4">
                <tr>
                    <th>Référence</th>
                    <th>Désignation</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Montant</th>
                </tr> 
            <?php
                while ($j < $i) /*BOUCLE QUI PERMET D'AFFICHER CHAQUE LIGNE DU TABLEAU*/
                {
                    /*RECUPERE LES INFOS D'UN ARTICLE A PARTIR DE SA REFERENCE*/
                    $reponse = $bdd->prepare('SELECT * FROM produit WHERE pdt_ref = ? ');
                    $reponse->execute(array($_SESSION["reference"][$j] ));
                    $donnees = $reponse->fetch();
                    $reponse->closeCursor();
            ?>
                    <tr>
                        <td><?php echo $_SESSION["reference"][$j]; ?></td>
                        <td>
                            <?php
                                echo $donnees['pdt_designation']; 
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $donnees['pdt_prix']. '€ ';
                                $prix = $donnees['pdt_prix'];
                            ?>
                        </td>
                        <td><?php echo $_SESSION["quantite"][$j]; ?></td>
                        <td>
                            <?php 
                                $montant = $prix * $_SESSION["quantite"][$j]; /*ON CALCULE LE MONTANT PAR ARTICLE*/
                                $total = $total + $montant;
                                echo $montant. '€';

                            ?> 
                        </td>
                    <tr/>
                    <?php
                        $j = $j+1;
                }
                    ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>TOTAL</td>
                    <td><?php echo $total. '€'; ?></td>
                </tr>
            </table>

            <br/>
            <form method="post" action="envoyer.php" >
               <p>
                   <label for="code_client">Code client</label> : <input type="text" name="code_client" id="code_client" />          
                   <label for="password">Mot de passe</label> : <input type="password" name="password" id="password" /><br/><br/>
                   <input type="submit" name ="action" value="Envoyer la commande" />
               </p>
            </form>
        </section>

        <footer>
            <div id = "copyright">
                <p align="center"> Copyright - Akram - Kevin</p>
            </div>
        </footer>
    </body>
</html>
<?php
    }
?>
