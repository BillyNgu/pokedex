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
<<<<<<< HEAD
        <?php getAllPokemon(); ?>
=======
<<<<<<< HEAD
        <nav>
            <ul>
                <li><a href="index.php" id="actif">Accueil</a></li>
                <li><a href="attack.php">Attaques</a></li>
            </ul>
        </nav>
        <?php getAllPokemon(); ?>
=======
      <nav></nav>
        <?php echo getAllPokemon(); ?>
>>>>>>> 06e713ecdc5ff1790a99853c723e530ff9fdf755
        <!--<table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Numéro</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
            </tbody>
        </table>-->
>>>>>>> b4f253ae7de9518d0b2882131cdcef1f8fa7fdba
    </body>
</html>