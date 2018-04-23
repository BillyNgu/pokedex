<?php
/*
 * Authors : Dubas Loïc, Pighini Lucas, Nguyen Billy
 * Description : List of all Pokemon
 * Date : 20.02.18
 */

require_once './dao/dao.php';

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
                            <a class="nav-link" href="types.php">Liste des types</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tableau des faiblesses</a>
                        </li>
                    </ul>
                </div>
                <?php if (!empty($nickname)): ?>
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link active">Bienvenue <?= $nickname; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Déconnexion</a>
                        </li>
                    </ul>
                <?php else: ?>
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Connexion</a>
                        </li>
                    </ul>
                <?php endif; ?>
            </nav>
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