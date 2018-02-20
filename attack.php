<?php
/*
 * Author : Dubas Loïc, Pighini Lucas, Nguyen Billy
 * Description : List of attack
 * Date : 20.02.2017
 */
require_once './bdd/mySql.inc.php';
require_once './dao.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des attaques</title>
        <title>Pokédex</title>
        <link rel="stylesheet" href="css/bootstrap.css">
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="index.php" id="actif">Accueil</a></li>
                <li><a href="attack.php">Attaques</a></li>
            </ul>
        </nav>
        <?php getAllAttack(); ?>
    </body>
</html>
