<?php

function getAllPokemon(){

        $resultat = m151db()->query("SELECT `pokemonDexId`, `pokemonName`  FROM `pokemon`
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
      ?>
