<?php
/*
 * Authors : Dubas Loïc, Pighini Lucas, Nguyen Billy
 * Description : description of selected pokemon.
 * Date : 20.02.18
 */
require_once './dao/dao.php';
$result = getDescription($_GET['pokemonId']);
$pkmtype = getPokemonType($result['pokemonId']);
//var_dump($pkmtype);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pokédex</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/jquery-1.11.0.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
    </head>
    <body class="body">
        <div class="container">
            <nav class="mb-3 navbar navbar-expand-lg navbar-dark bg-primary">
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
            <div class="card-group">
                <div class="card col-4" style="width: 18rem;">
                    <div class="card-body">
                        <img class="card-img" src="data:image/jpeg;base64, <?php echo base64_encode($result['pokemonImg']); ?>" />
                    </div>
                </div>
                <div class="card w-75" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $result['pokemonName']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Numéro national : <?php echo $result['pokemonId']; ?></h6>
                        <h6> Type : <?php
                            foreach ($pkmtype as $key => $value) {
                                echo '<img src="data:image/jpeg;base64,' . base64_encode($value['typeName']) . '">';
                            }
                            ?> </h6>
                        <h5>Description : </h5><?php echo $result['pokemonDescription']; ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
</html>
