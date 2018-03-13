<?php

require_once './dao/mySql.inc.php';
require_once './dao/connectionBase.php';

function getAllPokemon() {

    $resultat = pokedb()->query("SELECT `pokemonId`, `pokemonImg`, `pokemonName`  FROM `pokemon`
")->fetchAll(PDO::FETCH_ASSOC);
    $nomColl = array("#", "Image", "Nom", "Type");
    $pkmnType = getPokemonType(1)->fetchAll();
    $type="";
    foreach ($pkmnType as $key => $value) {
       var_dump($value["typeName"]);
       $type.=$value["typeName"]. " ";
    }
    

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
                    echo '<td><img height=\'64\' width=\'64\' src="data:image/jpeg;base64,' . base64_encode($imageblob) . '" /></td>';
                    break;
                case 3:

                    echo "<td><a href=\"descriptionPkmn.php?pokemonId=$id\">$valeur2</a></td>";
                    echo "<td>".$type."</td>";
                    break;
                case 4:
                    echo "<td>$pkmnType[0]</td>";
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
    $resultat = pokedb()->query("SELECT `typeName` FROM `type`
")->fetchAll(PDO::FETCH_ASSOC);
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
    $resultat = pokedb()->query("SELECT `moveName`, `movePower`, `moveAccuracy` FROM `move`
")->fetchAll(PDO::FETCH_ASSOC);
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
    //$resultat = pokedb()->query("SELECT `type`.`typeId`, `type`.`typeName`"
            //        . "FROM `type`, `composed` WHERE `type`.`typeId` = `composed`.`typeId` AND `composed`.`pokemonId` =$id")->fetch();
$resultat = pokedb()->prepare("SELECT `type`.`typeId`, `type`.`typeName` FROM `type`, `composed` WHERE `type`.`typeId` = `composed`.`typeId` AND `composed`.`pokemonId` = 1");
$resultat->execute();
    
    return $resultat;
}

function getDescription($id) {
    $resultat = pokedb()->query("SELECT`pokemonId`, `pokemonName`, `pokemonDescription`, `pokemonImg` FROM `pokemon` WHERE `pokemonId` = $id ;")->fetch();

    return $resultat;
}

function getAllId() {
    $resultat = pokedb()->query("SELECT `pokemonId` FROM `pokemon`;")->fetch();

    return $resultat;
}
