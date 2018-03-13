
<!DOCTYPE html>
<?php
/*
 * Authors : Dubas Loïc, Pighini Lucas, Nguyen Billy
 * Description : List of all Pokemon
 * Date : 20.02.18
 */
require_once './dao/dao.php';
$result = getDescription($_GET['pokemonId']);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pokédex</title>
        <link rel="stylesheet" href="css/bootstrap.css">
    </head>
    <body class="body">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="index.php">Pokédex</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="index.php">Index<span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link" href="attack.php">Liste des attaques</a>
                        <a class="nav-item nav-link" href="types.php">Liste des types</a>
                    </div>
                </div>
            </nav>
            <p> # : <?php echo  $result['pokemonId'];?></p>
            <p> nom : <?php echo $result['pokemonName'];?></p>
            <p> Description : <?php echo $result['pokemonDescription'];?></p>

        </div>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
</html>
