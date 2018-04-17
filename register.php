<?php
/*
 * Authors : Dubas Loïc, Pighini Lucas, Nguyen Billy
 * Description : List of all Pokemon
 * Date : 20.02.18
 */

require_once './dao/dao.php';

if (isset($_POST['register'])) {
    $Nickname = trim(filter_input(INPUT_POST, 'Nickname', FILTER_SANITIZE_STRING));
    $Email = trim(filter_input(INPUT_POST, 'Email', FILTER_VALIDATE_EMAIL));
    // no filter, hash soon
    $Pwd = filter_input(INPUT_POST, 'Password');
    $PwdRepeat = filter_input(INPUT_POST, 'PasswordConfirmation');
    $Date = date("Y-m-d H:i:s");

    $errors = [];
    
    if (empty($Nickname)) {
        $errors['Nickname'] = 'Le pseudo ne peut pas être vide.';
    }
    if (empty($Email)) {
        $errors['Email'] = 'L\'email ne peut pas être vide.';
    }
    if (empty($Pwd)) {
        $errors['Password'] = 'Le mot de passe ne peut pas être vide.';
    }
    if (empty($PwdRepeat)) {
        $errors['PasswordConfirmation'] = 'La confirmation du mot de passe ne peut pas être vide.';
    }

    if ($Pwd !== $PwdRepeat) {
        $errors['PasswordConfirmation'] = 'Les mots de passe ne sont pas identiques.';
    }
    if (empty($errors)) {
        CreateUser(strtolower($Nickname), $Email, $Pwd, $Date);
        SetFlashMessage("Utilisateur ajouté.");
        header("location:index.php");
        exit;
    }
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
                    </ul>
                </div>
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Connexion</a>
                    </li>
                </ul>
            </nav>
            <form action="register.php" method="post">
                <h3>Inscription</h3>
                <div class="form-group">
                    <label for="nickname_login">Pseudo :</label>
                    <input type="text" name="Nickname" placeholder="jeanp" class="form-control col-3" id="nickname_login" value="<?php
                    if (!empty($Nickname)) {
                        echo $Nickname;
                    }
                    ?>">
                           <?php
                           if (!empty($errors['Nickname'])) {
                               echo $errors['Nickname'];
                           }
                           ?>
                </div>
                <div class="form-group">
                    <label for="email_login">Email :</label>
                    <input type="email" placeholder="jeanp@gmail.com" name="Email" class="form-control col-3" id="email_login" value="<?php
                    if (!empty($Email)) {
                        echo $Email;
                    }
                    ?>">
                           <?php
                           if (!empty($errors['Email'])) {
                               echo $errors['Email'];
                           }
                           ?>
                </div>
                <div class="form-group">
                    <label for="password_login">Mot de passe :</label>
                    <input type="password" name="Password" class="form-control col-3" id="password_login">
                    <?php
                    if (!empty($errors['Password'])) {
                        echo $errors['Password'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="passwordconfirmation_login">Confirmer mot de passe :</label>
                    <input type="password" name="PasswordConfirmation" class="form-control col-3" id="passwordconfirmation_login">
                    <?php
                    if (!empty($errors['PasswordConfirmation'])) {
                        echo $errors['PasswordConfirmation'];
                    }
                    ?>
                </div>
                <a class="btn btn-primary" href="connection.php">Retour</a>
                <input class="btn btn-primary" name="register" type="submit">
            </form>
        </div>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
</html>