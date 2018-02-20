<?php
/*
 * Authors : Dubas Loïc, Pighini Lucas, Nguyen Billy
 * Description : List of Pokemon
 * Date : 20.02.18
 */
require_once './bdd/mySql.inc.php';
require_once './dao.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pokedex</title>
        <link rel="stylesheet" href="css/bootstrap.css">
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="index.php" id="actif">Accueil</a></li>
                <li><a href="attack.php">Attaques</a></li>
            </ul>
        </nav>
        <?php getAllPokemon(); ?>
    </body>
</html>