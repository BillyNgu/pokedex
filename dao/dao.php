<?php

/*
 * Authors : Dubas Loïc, Pighini Lucas, Nguyen Billy
 * Description : Functions
 * Date : 20.02.18
 */

require_once './dao/mySql.inc.php';
require_once './dao/connectionBase.php';

/**
 * Get the list of all Pokemon
 * @return array
 */
function getAllPokemon() {
    $sql = "SELECT `pokemonId`, `pokemonSprite`, `pokemonName`  FROM `pokemon`";
    $query = pokedb()->prepare($sql);
    $query->execute();
    return $result = $query->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Get all the types
 * @return array
 */
function getAllTypes() {
    $sql = "SELECT `typeName` FROM `type`";
    $query = pokedb()->prepare($sql);
    $query->execute();
    return $result = $query->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Get all attacks
 * @return array
 */
function getAllAttack() {
    $sql = "SELECT `moveName`, `movePower`, `moveAccuracy`, `typeId` FROM `move`";
    $query = pokedb()->prepare($sql);
    $query->execute();
    return $result = $query->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Get a type by its id
 * @param int $idType The type id
 * @return string
 */
function getTypeById($idType) {
    $sql = "SELECT `typeName` FROM `type` WHERE `typeId` = :idType";
    $query = pokedb()->prepare($sql);
    $query->bindParam(':idType', $idType, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch()[0];
}

/**
 * Get all types of a selected Pokemon
 * @param int $idPokemon
 * @return array
 */
function getPokemonType($idPokemon) {
    $sql = "SELECT `type`.`typeId`, `type`.`typeName`"
            . "FROM `type`, `composed` WHERE `type`.`typeId` = `composed`.`typeId` AND `composed`.`pokemonId` = :idPokemon";
    $query = pokedb()->prepare($sql);
    $query->bindParam(':idPokemon', $idPokemon, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll();
}

/**
 * Get all types of attacks
 * @param int $idMove The move Id
 * @return array
 */
function getAttackType($idMove) {
    $sql = "SELECT `typeName` FROM `type`, `move` WHERE `type`.`typeId`=`move`.`typeId` AND `move`.`moveId`= :idMove";
    $query = pokedb()->prepare($sql);
    $query->bindParam(':idMove', $idMove, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Get description of a Pokemon
 * @param int $idPokemon The Pokemon id
 * @return array
 */
function getDescription($idPokemon) {
    $sql = "SELECT`pokemonId`, `pokemonName`, `pokemonDescription`, `pokemonImg` FROM `pokemon` WHERE `pokemonId` = :idPokemon";
    $query = pokedb()->prepare($sql);
    $query->bindParam(':idPokemon', $idPokemon, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}