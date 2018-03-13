<?php
/*
 * Authors : Dubas Loïc, Pighini Lucas, Nguyen Billy
 * Description : Description of the selected Pokemon
 * Date : 27.02.18
 */
require_once './dao/dao.php';

$result = getDescription($_GET['pokemonId']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pokédex</title>
        <p>nom : <?php echo $result['pokemonName'] ;?></p>
    </head>
    <body>

    </body>
</html>
