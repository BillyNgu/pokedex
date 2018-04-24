<?php
require_once './dao/dao.php';

$weakness_tab = TRUE;

if (!empty($_SESSION['userNickname'])) {
    $nickname = $_SESSION['userNickname'];
}

$allTypes = getAllTypeImages();
$strengthFactor = getStrengthFactor();
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
                <tr>
                    <td></td>
                    <?php // var_dump($allTypes);  ?>
                    <?php foreach ($allTypes as $key => $type): ?>
                        <td>
                            <img src="data:image/jpeg;base64,<?= base64_encode($type['typeImage']); ?>">
                        </td>
                    <?php endforeach; ?>
                </tr>
                <?php foreach ($allTypes as $key => $type): ?>
                    <tr>
                        <td>
                            <img src="data:image/jpeg;base64,<?= base64_encode($type['typeImage']); ?>">
                        </td>
                        <?php foreach ($strengthFactor as $key => $factorValue): ?>
                            <td>
                                x<?= $factorValue['strengthFactor']; ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </body>
</html>
