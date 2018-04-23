<?php
/*
 * Authors : Dubas Loïc, Pighini Lucas, Nguyen Billy
 * Description : List of all Pokemon
 * Date : 20.02.18
 */

require_once './dao/dao.php';

$connection = '<a class="nav-link active" href="#">Connexion</a>';
$message = GetFlashMessage();


if (isset($_POST['connection'])) {
    $Nickname = trim(filter_input(INPUT_POST, 'Nickname', FILTER_SANITIZE_STRING));
    $Pwd = filter_input(INPUT_POST, 'Password', FILTER_SANITIZE_STRING);

    CheckLogin(strtolower($Nickname), $Pwd);
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
            <div class="row">
                <div class="col">
                    <form action="connection.php" method="post">
                        <div class="form-group">
                            <?php if (!empty($message)) : ?>
                                <p><?= $message ?></p>
                            <?php endif; ?>
                            <label for="exampleInputNickname">Identifiant :</label>
                            <input type="text" name="Nickname" class="form-control col-5" id="exampleInputNickname" placeholder="Entrez votre pseudo">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mot de passe :</label>
                            <input type="password" name="Password" class="form-control col-5" id="exampleInputPassword1" placeholder="Entrez votre mot de passe">
                            <a href="#">Mot de passe oublié ?</a>
                            <a href="register.php">Pas encore inscrit ?</a>
                        </div>
                        <button type="submit" name="connection" class="btn btn-primary">Se connecter</button>
                    </form>
                </div>
            </div>
            <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
</html>