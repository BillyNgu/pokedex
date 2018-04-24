<?php
/*
 * Authors : Dubas Loïc, Pighini Lucas, Nguyen Billy
 * Description : List of all types
 * Date : 06.03.18
 */

require_once './dao/dao.php';

$types = TRUE;
$nomColl = array("Types", "Nom");
$allTypes = getAllTypes();

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