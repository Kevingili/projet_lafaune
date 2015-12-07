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