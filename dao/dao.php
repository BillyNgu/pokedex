<?php

require_once './dao/mySql.inc.php';
require_once './dao/connectionBase.php';

function getAllPokemon() {
    $sql = "SELECT `pokemonId`, `pokemonSprite`, `pokemonName`  FROM `pokemon`";
    $query = pokedb()->prepare($sql);
    $query->execute();
    return $result = $query->fetchAll(PDO::FETCH_ASSOC);
}

function getAllTypes() {
    $sql = "SELECT `typeName` FROM `type`";
    $query = pokedb()->prepare($sql);
    $query->execute();
    return $result = $query->fetchAll(PDO::FETCH_ASSOC);
}

function getAllAttack() {
    $sql = "SELECT `moveName`, `movePower`, `moveAccuracy`, `typeId` FROM `move`";
    $query = pokedb()->prepare($sql);
    $query->execute();
    return $result = $query->fetchAll(PDO::FETCH_ASSOC);
}

function getTypeById($id) {
    $sql = "SELECT `typeName` FROM `type` WHERE `typeId` = :id";
    $query = pokedb()->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch()[0];
}

function getPokemonType($id) {
    $sql = "SELECT `type`.`typeId`, `type`.`typeName`"
            . "FROM `type`, `composed` WHERE `type`.`typeId` = `composed`.`typeId` AND `composed`.`pokemonId` = :id";
    $query = pokedb()->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll();
}

function getAttackType($id) {
    $sql = "SELECT `typeName` FROM `type`, `move` WHERE `type`.`typeId`=`move`.`typeId` AND `move`.`moveId`=:id";
    $query = pokedb()->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll();
}

function getDescription($id) {
    $sql = "SELECT`pokemonId`, `pokemonName`, `pokemonDescription`, `pokemonImg` FROM `pokemon` WHERE `pokemonId` = :id";
    $query = pokedb()->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch();
}

function getAllId() {
    $sql = "SELECT `pokemonId` FROM `pokemon`;";
    $query = pokedb()->prepare($sql);
    $query->execute();
    return $query->fetch();
}
