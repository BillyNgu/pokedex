<?php
/*
 * Authors : Dubas Loïc, Pighini Lucas, Nguyen Billy
 * Description : List of all Pokemon
 * Date : 20.02.18
 */

require_once './dao/dao.php';

$nomColl = array("#", "Image", "Nom", "Type");
$allPokemon = getAllPokemon();
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
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="index.php">Pokédex</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link active" href="#">Index<span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link" href="attacks.php">Liste des attaques</a>
                        <a class="nav-item nav-link" href="types.php">Liste des types</a>
                        <a class="nav-item nav-link" href="#">Inscription</a>
                        <a class="nav-item nav-link" href="#">Connexion</a>
                    </div>
                </div>
            </nav>
            <table class="table table-striped">
                <thead class="table thead">
                    <?php foreach ($nomColl AS $key => $value): ?>
                    <th><?= $value ?></th>
                <?php endforeach; ?>
                </thead>
                <tbody>
                    <?php
                    $cpt2 = 0;
                    foreach ($allPokemon AS $key => $value):
                        ?> 
                        <tr>
                            <?php
                            $cpt = 0;
                            $cpt2 ++;
                            foreach ($value AS $key => $value2): 
                                $cpt++;

                                switch ($cpt):
                                    case 1:
                                        ?>
                                        <td><?= $value2; ?></td>
                                        <?php
                                        $id = $value2;
                                        $type = "";
                                        $pkmnType = getPokemonType($id);
                                        break;
                                    case 2:
                                        $imageblob = $value2;
                                        ?>
                                        <td class="tab-content">
                                            <a href="descriptionPkmn.php?pokemonId=<?= $id; ?>">
                                                <img src="data:image/jpeg;base64,<?= base64_encode($imageblob); ?>"/>
                                            </a>
                                        </td>
                                        <?php
                                        break;
                                    case 3:
                                        ?>
                                        <td><a href="descriptionPkmn.php?pokemonId=<?= $id; ?>"><?= $value2; ?></a></td>
                                        <td>
                                            <?php
                                            foreach ($pkmnType as $key => $value):
                                                $type = $value["typeImage"];
                                                ?>
                                                <img src="data:image/jpeg;base64,<?= base64_encode($type); ?>">
                                            <?php endforeach; ?>
                                        </td> <?php
                                        break;
                                    default: 
                                        break;
                                        ?>
                                <?php endswitch;
                            endforeach;
                            ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
</html>