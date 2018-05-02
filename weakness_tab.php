<?php
require_once './dao/dao.php';

$weakness_tab = TRUE;

if (!empty($_SESSION['userNickname'])) {
    $nickname = $_SESSION['userNickname'];
}

$allTypes = getAllTypeImages();

$cpt = 1;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pokédex</title>
        <?php require_once './css/css_js.php'; ?>
    </head>
    <body>
        <div class="container">
            <?php require_once './navbar.php'; ?>
            <table>
                <thead>
                    <tr>
                        <th>
                            Type offensif
                        </th>
                    </tr>
                </thead>
                <tr>
                    <td></td>
                    <?php foreach ($allTypes as $key => $typeH): ?>
                        <td>
                            <img src="data:image/jpeg;base64,<?= base64_encode($typeH['typeImage']); ?>">
                        </td>
                    <?php endforeach; ?>
                </tr>
                <?php foreach ($allTypes as $key => $typeV): ?>
                    <?php $typeImage = $typeV['typeImage']; ?>
                    <tr>
                        <td>
                            <img src="data:image/jpeg;base64,<?= base64_encode($typeImage); ?>">
                        </td>
                        <?php foreach (getStrengthFactor($cpt) as $key => $factor): ?>
                            <td>
                                x<?= $factor['strengthFactor'] ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>                   
                    <?php
                    switch ($cpt):
                        case 1:
                            $cpt = 10;
                            break;
                        case 2:
                            $cpt = 11;
                            break;
                        case 3:
                            $cpt = 12;
                            break;
                        case 4:
                            $cpt = 13;
                            break;
                        case 5:
                            $cpt = 14;
                            break;
                        case 6:
                            $cpt = 15;
                            break;
                        case 7:
                            $cpt = 16;
                            break;
                        case 8:
                            $cpt = 17;
                            break;
                        case 9:
                            $cpt = 18;
                            break;
                        case 10:
                            $cpt = 2;
                            break;
                        case 11:
                            $cpt = 3;
                            break;
                        case 12:
                            $cpt = 4;
                            break;
                        case 13:
                            $cpt = 5;
                            break;
                        case 14:
                            $cpt = 6;
                            break;
                        case 15:
                            $cpt = 7;
                            break;
                        case 16:
                            $cpt = 8;
                            break;
                        case 17:
                            $cpt = 9;
                            break;
                        default:
                            break;

                    endswitch;
                endforeach;
                ?>
            </table>
        </div>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
</html>
