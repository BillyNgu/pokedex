<?php
/*
 * Authors : Dubas Loïc, Pighini Lucas, Nguyen Billy
 * Description : List of all types
 * Date : 06.03.18
 */

require_once './dao/dao.php';

$nomColl = array("Types", "Nom");
$allTypes = getAllTypes();
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
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Index</a>        
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="attacks.php">Liste des attaques</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Liste des types</a>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="connection.php">Connexion</a>
                    </li>
                </ul>
            </nav>
            <table class="table table-striped">
                <thead class="table thead">
                    <?php foreach ($nomColl AS $key => $value): ?>
                    <th><?= $value; ?></th>
                <?php endforeach; ?>
                </thead>
                <?php foreach ($allTypes AS $key => $value): ?>
                    <tr>
                        <?php
                        $cpt = 0;
                        foreach ($value AS $key => $value2):
                            $cpt++;
                            switch ($cpt):
                                case 1:
                                    ?>
                                    <td>
                                        <img src="data:image/jpeg;base64,<?= base64_encode($value2); ?>">
                                    </td>
                                    <?php
                                    break;
                                case 2:
                                    ?>
                                    <td>
                                        <?= $value['typeName']; ?>
                                    </td>
                                <?php
                                default:
                                    break;
                            endswitch;
                            ?>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
</html>