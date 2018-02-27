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

function getType($id){

  $idTypes = pokedb()->query("SELECT `typeId` FROM `istype` WHERE `pokemonId` = $id ;");
  echo $idTypes;
    if($id)
  foreach ($idTypes as $key => $value) {
      $idTypes += pokedb()->query("SELECT `typeName` FROM `type` WHERE `typeId` =$value ") .
    "SELECT distinct t.typeName FROM istype as i, type as t, pokemon as p WHERE t.typeId = i.typeId AND i.pokemonId = '1'";

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
