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