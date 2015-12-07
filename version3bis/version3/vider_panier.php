<?php
	session_start();
	session_destroy(); /*ON EFFACE TOUTES LES VARIABLES SESSIONS*/
	header("Location: accueil.php"); /*REDIRECTION VERS LA PAGE ACCUEIL.PHP*/
?>