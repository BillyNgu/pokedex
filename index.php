<?php
/*
 * Authors : Dubas Loïc, Pighini Lucas, Nguyen Billy
 * Description : List of all Pokemon
 * Date : 20.02.18
 */

require_once './dao/dao.php';

$index = TRUE;

$nomColl = array("#", "Sprite", "Nom", "Type");
$allPokemon = getAllPokemon();

if (!empty($_SESSION['userNickname'])) {
    $nickname = $_SESSION['userNickname'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pokédex</title>
        <?php require_once './css/css_js.php'; ?>
    </head>
    <body class="body">
        <div class="container">
            <?php require_once './navbar.php'; ?>
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
                                endswitch;
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