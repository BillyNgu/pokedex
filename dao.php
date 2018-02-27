<?php

require_once './bdd/mySql.inc.php';
require_once './bdd/connectionBase.php';

function getAllPokemon() {

    $resultat = pokedb()->query("SELECT `pokemonDexId`, `pokemonSprite`, `pokemonName`  FROM `pokemon`
")->fetchAll(PDO::FETCH_ASSOC);
    $nomColl = array("#", "Image", "Nom", "Type");

    echo "<table class=\"table table-info\">";
    echo "<thead class=\"table thead\">";
    foreach ($nomColl AS $key => $valeur) {

        echo "<th>$valeur</th>";
    }
    echo "</thead>";
    echo "<tbody>";
    foreach ($resultat AS $key => $valeur) {
        echo "<tr>";
        foreach ($valeur AS $key => $valeur2) {
            echo "<td>$valeur2</td>";
        }
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}

//function getType($id) {
//
//    $idTypes = pokedb()->query("SELECT `typeId` FROM `istype` WHERE `pokemonId` = $id ;");
//    echo $idTypes;
//    if ($id)
//        foreach ($idTypes as $key => $value) {
//            $idTypes += pokedb()->query("SELECT `typeName` FROM `type` WHERE `typeId` =$value ") .
//                    "SELECT distinct t.typeName FROM istype as i, type as t, pokemon as p WHERE t.typeId = i.typeId AND i.pokemonId = '1'";
//        }

function getAllAttack() {
    $resultat = pokedb()->query("SELECT `moveName`, `movePower`, `moveAccuracy` FROM `move`
")->fetchAll(PDO::FETCH_ASSOC);
    $nomColl = array("Attaque", "Puissance", "Précision");

    echo "<table>";
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

function getDescription() {
    
}
