<?php
require_once './bdd/mySql.inc.php';
require_once './bdd/connectionBase.php';

function getAllPokemon(){

        $resultat = pokedb()->query("SELECT `pokemonDexId`, `pokemonName`  FROM `pokemon`
")->fetchAll(PDO::FETCH_ASSOC);
        $nomColl = array("Id","Nom");

        echo "<table>";
        foreach ($nomColl AS $key => $valeur){
            echo "<th>$valeur</th>";
        }
        foreach ($resultat AS $key => $valeur){
            echo "<tr>";
            foreach ($valeur AS $key => $valeur2){
                echo "<td>$valeur2</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

}

function getAllAttack(){
    $resultat = pokedb()->query("SELECT `moveName`, `movePower`, `moveAccuracy` FROM `move`
")->fetchAll(PDO::FETCH_ASSOC);
        $nomColl = array("Attaque", "Puissance", "Précision");

        echo "<table>";
        foreach ($nomColl AS $key => $valeur){
            echo "<th>$valeur</th>";
        }
        foreach ($resultat AS $key => $valeur){
            echo "<tr>";
            foreach ($valeur AS $key => $valeur2){
                echo "<td>$valeur2</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
}
      ?>
