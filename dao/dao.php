<?php

require_once './dao/mySql.inc.php';
require_once './dao/connectionBase.php';

function getAllPokemon() {
    $sql = "SELECT `pokemonId`, `pokemonImg`, `pokemonName`  FROM `pokemon`";
    $query = pokedb()->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $nomColl = array("#", "Image", "Nom", "Type");



    echo "<table class=\"table table-striped\">";
    echo "<thead class=\"table thead\">";
    foreach ($nomColl AS $key => $value) {

        echo "<th>$value</th>";
    }
    echo "</thead>";
    echo "<tbody>";
    $cpt2 = 0;
    foreach ($result AS $key => $value) {
        echo "<tr>";
        $result = getAllId();
        $cpt = 0;
        $cpt2 ++;
        foreach ($value AS $key => $value2) {

            $cpt++;

            switch ($cpt) {
                case 1:
                    echo "<td>$value2</td>";
                    $id = $value2;
                    $type = "";
                    $pkmnType = getPokemonType($id);

                    break;
                case 2:
                    $imageblob = $value2;
                    echo '<td>'
                    . '<a href="descriptionPkmn.php?pokemonId=' . $id . '">'
                    . '<img height=\'64\' width=\'64\' src="data:image/jpeg;base64,' . base64_encode($imageblob) . '" />'
                    . '</a>'
                    . '</td>';
                    break;
                case 3:

                    echo "<td><a href=\"descriptionPkmn.php?pokemonId=$id\">$value2</a></td>";
                    echo '<td>';
                    foreach ($pkmnType as $key => $value) {
                        $type = $value["typeName"];
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($type) . '">';
                    }
                    echo '</td>';
                    break;

                default:
                    break;
            }
        }
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}

function getAllTypes() {
    $sql = "SELECT `typeName` FROM `type`";
    $query = pokedb()->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $nomColl = array("Types");

    echo "<table class=\"table table-striped\">";
    echo "<thead class=\"table thead\">";
    foreach ($nomColl AS $key => $value) {
        echo "<th>$value</th>";
    }
    echo "</thead>";
    foreach ($result AS $key => $value) {
        echo "<tr>";
        foreach ($value AS $key => $value2) {
            echo '<td><img src="data:image/jpeg;base64,' . base64_encode($value2) . '"></td>';
        }
        echo "</tr>";
    }
    echo "</table>";
}

function getAllAttack() {
    $sql = "SELECT `moveName`, `movePower`, `moveAccuracy`, `typeId` FROM `move`";
    $query = pokedb()->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);


    $cpt = 0;

    $nomColl = array("Attaque", "Puissance", "Précision", "Type");

    echo "<table class=\"table table-striped\">";
    echo "<thead class=\"table thead\">";
    foreach ($nomColl AS $key => $value) {
        echo "<th>$value</th>";
    }
    echo "</thead>";
    foreach ($result AS $key => $value) {
        echo "<tr>";
        $cpt = 0;
        foreach ($value AS $key => $value2) {
            $cpt++;

            if ($cpt == 4) {
                $sql2 = "SELECT typeName FROM type WHERE typeId = $value2";
                $query2 = pokedb()->prepare($sql2);
                $query2->execute();
                $type = $query2->fetch()[0];

                echo '<td><img src="data:image/jpeg;base64,' . base64_encode($type) . '"></td>';
            } else {
                echo "<td>$value2</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
}

function getPokemonType($id) {
    $sql = "SELECT `type`.`typeId`, `type`.`typeName`"
            . "FROM `type`, `composed` WHERE `type`.`typeId` = `composed`.`typeId` AND `composed`.`pokemonId` ='$id'";
    $query = pokedb()->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}

function getAttackType($id) {
    $sql = "SELECT `typeName` FROM `type`, `move` WHERE `type`.`typeId`=`move`.`typeId` AND `move`.`moveId`='$id'";
    $query = pokedb()->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}

function getDescription($id) {
    $sql = "SELECT`pokemonId`, `pokemonName`, `pokemonDescription`, `pokemonImg` FROM `pokemon` WHERE `pokemonId` = $id ;";
    $query = pokedb()->prepare($sql);
    $query->execute();
    $result = $query->fetch();

    return $result;
}

function getAllId() {
    $sql = "SELECT `pokemonId` FROM `pokemon`;";
    $query = pokedb()->prepare($sql);
    $query->execute();
    $result = $query->fetch();

    return $result;
}
