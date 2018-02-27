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
    <body class="body">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <a class="navbar-brand" href="index.php">Pokédex</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#">Index <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Liste des attaques</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Liste des types</a>
            </li>
          </ul>
        </div>
      </nav>
            <?php getAllPokemon(); ?>
        </div>
    </body>
</html>