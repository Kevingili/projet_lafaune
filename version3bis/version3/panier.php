<?php
    session_start(); /* ON DEMARRE LA SESSION*/

    if (!isset($_SESSION["reference"])) /*SI LA VARIABLE REFERENCE DE $_SESSION N'EXISTE PAS*/
    {
        $_SESSION["reference"]=array(); /*ON CREER UN TABLEAU REFERENCE DE $_SESSION*/
        $_SESSION["quantite"]=array(); /*ON CREER UN TABLEAU QUANTITE DE $_SESSION*/
    }

	$trouver = 0;
	if (isset($_GET["action"]) AND isset($_GET["refPdt"]) AND isset($_GET["quantite"]))
	{
		$i = count($_SESSION["reference"]);

		if ($i == 0) /*SI LE TABLEAU REFERENCE EST VIDE*/
		{
			$_SESSION["reference"][$i] = $_GET["refPdt"];
			$_SESSION["quantite"][$i] = $_GET["quantite"];
			$trouver = 1;
		}

		else /*SINON (SI LE TABLEAU EST DEJA REMPLI)*/
		{
			$k = 0;
			while ($k < $i) /*ON VERIFIE SI L'ARTICLE EST DEJA DANS LE TABLEAU*/
			{
				if ($_SESSION["reference"][$k] == $_GET["refPdt"])
				{
					$_SESSION["quantite"][$k] = $_SESSION["quantite"][$k] + $_GET["quantite"]; /*S'IL Y EST ON AUGMENTE JUSTE LA QUANTITE*/
					$trouver = 1;
				}
				$k = $k +1;
			}
		}

		if ($trouver == 0) /*SI LE TABLEAU N'EST PAS VIDE ET QUE L'ARTICLE N'EST PAS DANS LE TABLEAU ON L'AJOUTE*/
		{
			$_SESSION["reference"][$i] = $_GET["refPdt"];
			$_SESSION["quantite"][$i] = $_GET["quantite"];
		}
	header("Location: accueil.php"); /*ON RETOURNE A LA PAGE D'ACCUEIL*/
	}
?>