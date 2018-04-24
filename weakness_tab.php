<?php
require_once './dao/dao.php';

$weakness_tab = TRUE;

if (!empty($_SESSION['userNickname'])) {
    $nickname = $_SESSION['userNickname'];
}

$allTypes = getAllTypeImages();
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
                    <?php foreach ($allTypes as $key => $type): ?>
                        <td>
                            <img src="data:image/jpeg;base64,<?= base64_encode($type['typeImage']); ?>">
                        </td>
                    <?php endforeach; ?>
                </tr>
                <?php foreach ($allTypes as $key => $type): ?>
                    <?php $factor = getStrengthFactor($type['typeImage']); ?>
                    <tr>
                        <td>
                            <img src="data:image/jpeg;base64,<?= base64_encode($type['typeImage']); ?>">
                        </td>
                        <?php foreach ($factor as $key => $multiplier): ?>
                            <td>
                                x<?php echo $multiplier['strengthFactor']; ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>                   
                <?php endforeach; ?>
            </table>
        </div>
    </body>
</html>
