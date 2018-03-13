<?php

require_once './dao/mySql.inc.php';
require_once './dao/connectionBase.php';

function getAllPokemon() {
    $sql = "SELECT `pokemonId`, `pokemonImg`, `pokemonName`  FROM `pokemon`";
    $query = pokedb()->prepare($sql);
    $query->execute();
    $resultat = $query->fetchAll(PDO::FETCH_ASSOC);
    $nomColl = array("#", "Image", "Nom", "Type");

    echo "<table class=\"table\">";
    echo "<thead class=\"table thead\">";
    foreach ($nomColl AS $key => $valeur) {

        echo "<th>$valeur</th>";
    }
    echo "</thead>";
    echo "<tbody>";
    $cpt2 = 0;
    foreach ($resultat AS $key => $valeur) {
        echo "<tr>";
        $result = getAllId();
        $cpt = 0;
        $cpt2 ++;
        foreach ($valeur AS $key => $valeur2) {

            $cpt++;

            switch ($cpt) {
                case 1:
                    echo "<td>$valeur2</td>";
                    $id = $valeur2;
                    break;
                case 2:
                    $imageblob = $valeur2;
                    echo '<td>'
                    . '<a href="descriptionPkmn.php?pokemonId=' . $id . '">'
                    . '<img height=\'64\' width=\'64\' src="data:image/jpeg;base64,' . base64_encode($imageblob) . '" />'
                    . '</a>'
                    . '</td>';
                    break;
                case 3:

                    echo "<td><a href=\"descriptionPkmn.php?pokemonId=$id\">$valeur2</a></td>";
                    break;
                case 4:
                    echo "<td>$pkmnType</td>";
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
    $resultat = $query->fetchAll(PDO::FETCH_ASSOC);
    $nomColl = array("Types");

    echo "<table class=\"table\">";
    foreach ($nomColl AS $key => $valeur) {
        echo "<th>$valeur</th>";
    }
    foreach ($resultat AS $key => $valeur) {
        echo "<tr>";
        foreach ($valeur AS $key => $valeur2) {
            echo "<td>$valeur2</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function getAllAttack() {
    $sql = "SELECT `moveName`, `movePower`, `moveAccuracy` FROM `move`";
    $query = pokedb()->prepare($sql);
    $query->execute();
    $resultat = $query->fetchAll(PDO::FETCH_ASSOC);
    $nomColl = array("Attaque", "Puissance", "Précision");

    echo "<table class=\"table\">";
    foreach ($nomColl AS $key => $valeur) {
        echo "<th>$valeur</th>";
    }
    foreach ($resultat AS $key => $valeur) {
        echo "<tr>";
        foreach ($valeur AS $key => $valeur2) {
            echo "<td>$valeur2</td>";
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
    $resultat = $query->fetchAll(PDO::FETCH_ASSOC);

    return $resultat;
}

function getDescription($id) {
    $sql = "SELECT`pokemonId`, `pokemonName`, `pokemonDescription`, `pokemonImg` FROM `pokemon` WHERE `pokemonId` = $id ;";
    $query = pokedb()->prepare($sql);
    $query->execute();
    $resultat = $query->fetch();

    return $resultat;
}

function getAllId() {
    $sql = "SELECT `pokemonId` FROM `pokemon`;";
    $query = pokedb()->prepare($sql);
    $query->execute();
    $resultat = $query->fetch();

    return $resultat;
}
