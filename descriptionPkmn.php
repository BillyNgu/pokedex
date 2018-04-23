<?php
/*
 * Authors : Dubas Loïc, Pighini Lucas, Nguyen Billy
 * Description : description of selected pokemon.
 * Date : 20.02.18
 */

require_once './dao/dao.php';

$pkmId = filter_input(INPUT_GET, 'pokemonId', FILTER_VALIDATE_INT);
$pokemonDescription = getDescription($pkmId);
$pokemonDescriptionNext = getDescription($pkmId + 1);
$pokemonDescriptionPrevious = getDescription($pkmId - 1);
$pkmtype = getPokemonType($pkmId);

if (!empty($_SESSION['userNickname'])) {
    $nickname = $_SESSION['userNickname'];
}
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
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Index<span class="sr-only">(current)</span></a>        
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="attacks.php">Liste des attaques</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="types.php">Liste des types</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tableau des faiblesses</a>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="connection.php">Connexion</a>
                    </li>
                </ul>
            </nav>
            <table class="table">
                <tr>
                    <td>
                        <!-- Previous Pokemon -->
                        <?php if ($pokemonDescription['pokemonId'] != 1): ?>
                            <a href="descriptionPkmn.php?pokemonId=<?= $pokemonDescriptionPrevious['pokemonId']; ?>">
                                <img class="card-img-top" style="width: 32px;" src="data:image/jpeg;base64, <?= base64_encode($pokemonDescriptionPrevious['pokemonSprite']); ?>" />
                            </a>
                            <a href="descriptionPkmn.php?pokemonId=<?= $pokemonDescriptionPrevious['pokemonId']; ?>">
                                #<?= $pokemonDescriptionPrevious['pokemonId']; ?> - <?= $pokemonDescriptionPrevious['pokemonName']; ?>
                            </a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?= $pokemonDescription['pokemonId']; ?> - <?= $pokemonDescription['pokemonName']; ?>
                    </td>
                    <td>
                        <?php if ($pokemonDescription['pokemonId'] != 151): ?>
                            <a href="descriptionPkmn.php?pokemonId=<?= $pokemonDescriptionNext['pokemonId']; ?>">
                                <img class="card-img-top" style="width: 32px;" src="data:image/jpeg;base64, <?= base64_encode($pokemonDescriptionNext['pokemonSprite']); ?>" />
                            </a>
                            <a href="descriptionPkmn.php?pokemonId=<?= $pokemonDescriptionNext['pokemonId']; ?>">
                                #<?= $pokemonDescriptionNext['pokemonId']; ?> - <?= $pokemonDescriptionNext['pokemonName']; ?>
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
            <div class="card-group">
                <div class="card col-4" style="width: 18rem;">
                    <div class="card-body">
                        <img class="card-img" src="data:image/jpeg;base64, <?= base64_encode($pokemonDescription['pokemonImg']); ?>" />
                    </div>
                </div>
                <div class="card w-75" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $pokemonDescription['pokemonName']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Numéro national : <?= $pokemonDescription['pokemonId']; ?></h6>
                        <h6> Type : <?php foreach ($pkmtype as $key => $value): ?> 
                                <img src="data:image/jpeg;base64,<?= base64_encode($value['typeImage']); ?>">
                            <?php endforeach; ?>
                        </h6>
                        <h5>Description : </h5><?= $pokemonDescription['pokemonDescription']; ?>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
</html>
