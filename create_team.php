<?php

require_once './dao/dao.php';

$create_team = TRUE;

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
    <body>
        <div class="container">
            <?php require_once './navbar.php'; ?>

        </div>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
</html>
