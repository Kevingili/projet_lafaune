<?php

	include ('inc/_config.php');

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
            <form method="POST" action="mailto:commercial@lafaune.com">         
	            
	            <h1>Contactez un commercial</h1>
            	<p>Vous avez des questions, ou besoin de renseignements, contactez le service commercial via l'envoi d'un mail.</p>
	         	<label for ="mailcommercial">A </label>:  <input type "email" name="mail_commercial" value="commercial@lafaune.com" readonly /> <br/><br/>

	         	<input type="submit" value="Contacter"><br/><br/><br/>
	        	
        	</form>  
        </section>

        <footer>
            <div id = "copyright">
                <p align="center"> Copyright - Akram - Kevin</p>
            </div>
        </footer>
    </body>
</html>