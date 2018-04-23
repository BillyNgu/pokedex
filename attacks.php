<?php
/*
 * Authors : Dubas Loïc, Pighini Lucas, Nguyen Billy
 * Description : List of all attacks
 * Date : 20.02.18
 */

require_once './dao/dao.php';

$attack = '<a class="nav-link active" href="#">Liste des attaques</a>';
$cpt = 0;
$nomColl = array("Attaque", "Puissance", "Précision", "Type");
$allAttacks = getAllAttack();

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
                    <th><?= $value; ?></th>
                <?php endforeach; ?>
                </thead>
                <?php foreach ($allAttacks AS $key => $value): ?>
                    <tr>
                        <?php
                        $cpt = 0;
                        foreach ($value AS $key => $value2):
                            $cpt++;
                            switch ($cpt):
                                case 1:
                                    ?>
                                    <td><a href="#"><?= $value2; ?></a></td>
                                    <?php
                                    break;
                                case 4:
                                    $type = getTypeById($value2);
                                    ?>
                                    <td><img src="data:image/jpeg;base64,<?= base64_encode($type); ?>"></td>
                                    <?php
                                    break;
                                default:
                                    ?>
                                    <td><?= $value2; ?></td>
                                    <?php
                                    break;
                            endswitch;
                        endforeach;
                        ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
</html>