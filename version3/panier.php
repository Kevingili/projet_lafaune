<?php
    session_start(); /* ON DEMARRE LA SESSION*/

    if (!isset($_SESSION["reference"])) /*SI LA VARIABLE REFERENCE DE $_SESSION N'EXISTE PAS*/
    {
        $_SESSION["reference"]=array(); /*ON CREER UN TABLEAU REFERENCE DE $_SESSION*/
        $_SESSION["quantite"]=array(); /*ON CREER UN TABLEAU QUANTITE DE $_SESSION*/
    }

	/*SI LA PAGE EST APPELE AVEC L'ACTION AJOUTER AU PANIER*/
	if (isset($_GET["action"]) AND isset($_GET["refPdt"]) AND isset($_GET["quantite"]) AND $_GET["action"] == "Ajouter au panier")
	{
		$i = count($_SESSION["reference"]); /*ON CREER UNE VARIABLE I QU'ON INITIALISE AVEC LE NOMBRE D'ELEMENT QUE CONTIENT LE TABLEAU*/
		$trouver = 0; /*BOOLEEN*/

		if ($i == 0) /*SI LE TABLEAU REFERENCE EST VIDE*/
		{
			$_SESSION["reference"][$i] = $_GET["refPdt"];
			$_SESSION["quantite"][$i] = $_GET["quantite"];
			$trouver = 1; /*ON AFFECTE LA VALEUR 1 A TROUVER POUR DIRE QU'ON A AJOUTE L'ARTICLE*/
		}

		else /*SINON (SI LE TABLEAU EST DEJA REMPLI)*/
		{
			$k = 0; /*VARIABLE UTILISE POUR SE DEPLACER DANS LE TABLEAU*/
			while ($k < $i) /*ON VERIFIE SI L'ARTICLE EST DEJA DANS LE TABLEAU*/
			{
				if ($_SESSION["reference"][$k] == $_GET["refPdt"])
				{
					$_SESSION["quantite"][$k] = $_SESSION["quantite"][$k] + $_GET["quantite"]; /*S'IL Y EST ON AUGMENTE JUSTE LA QUANTITE*/
					$trouver = 1; /*ON AFFECTE LA VALEUR 1 A TROUVER POUR DIRE QU'ON A TROUVE L'ARTICLE*/
				}
				$k = $k +1; /*ON INCREMENTE K DE 1 POUR PACOURIR TOUT LE TABLEAU*/
			}
		}

		if ($trouver == 0) /*SI LE TABLEAU N'EST PAS VIDE ET QUE L'ARTICLE N'EST PAS DANS LE TABLEAU ON L'AJOUTE*/
		{
			$_SESSION["reference"][$i] = $_GET["refPdt"];
			$_SESSION["quantite"][$i] = $_GET["quantite"];
		}
	}

	/*SI LA PAGE EST APPELE AVEC L'ACTION VIDER LE PANIER*/
	if (isset($_GET["action"]) AND $_GET["action"] == "Vider le panier")
	{
		session_destroy(); /*ON EFFACE TOUTES LES VARIABLES SESSIONS*/
	}

	header("Location: accueil.php"); /*REDIRECTION VERS LA PAGE ACCUEIL.PHP*/
?>