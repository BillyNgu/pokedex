<?php

/*
 * Authors : Dubas Loïc, Pighini Lucas, Nguyen Billy
 * Description : Functions
 * Date : 20.02.18
 */

require_once './dao/mySql.inc.php';
require_once './dao/connectionBase.php';
require_once './dao/flashmessage.php';

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
    $sql = "SELECT `typeImage`, `typeName` FROM `type` ORDER BY `typeName` ASC";
    $query = pokedb()->prepare($sql);
    $query->execute();
    return $result = $query->fetchAll(PDO::FETCH_ASSOC);
}

function getAllTypeImages() {
    $sql = "SELECT `typeImage` FROM `type` ORDER BY `typeName` ASC";
    $query = pokedb()->prepare($sql);
    $query->execute();
    return $result = $query->fetchAll(PDO::FETCH_ASSOC);
}

function getStrengthFactor() {
//    $sql = "SELECT * FROM `weakness` ORDER BY `weakness`.`defendTypeId`, `weakness`.`attackTypeId` ASC";
    $sql = "SELECT * FROM `weakness` ORDER BY `weakness`.`weaknessId` ASC";
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
    $sql = "SELECT `typeImage` FROM `type` WHERE `typeId` = :idType";
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
    $sql = "SELECT `type`.`typeId`, `type`.`typeImage`"
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
    $sql = "SELECT `typeImage` FROM `type`, `move` WHERE `type`.`typeId`=`move`.`typeId` AND `move`.`moveId`= :idMove";
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
    $sql = "SELECT`pokemonId`, `pokemonName`, `pokemonDescription`, `pokemonImg`, `pokemonSprite` FROM `pokemon` WHERE `pokemonId` = :idPokemon";
    $query = pokedb()->prepare($sql);
    $query->bindParam(':idPokemon', $idPokemon, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

function CreateUser($Nickname, $Email, $Pwd, $Date) {
    $sql = "INSERT INTO `user`(`userNickname`, `userEmail`, `userPassword`, `userSalt`)" .
            "SELECT :Nickname, :Email, :Password, SHA1(NOW())";
    $query = pokedb()->prepare($sql);
    $query->execute(array(
        'Nickname' => strtolower($Nickname),
        'Email' => strtolower($Email),
        'Password' => sha1("$Pwd" . sha1("$Date"))
    ));
}

function CheckLogin($Nickname, $Pwd) {
    $salt = getSaltFromUser($Nickname);
    $sql = "SELECT `userNickname`, `userPassword` FROM `user` WHERE `userNickname` = :Nickname AND `userPassword` = :Password ";
    $query = pokedb()->prepare($sql);
    $Pwd = sha1("$Pwd" . "$salt");

    $query->bindParam(':Nickname', $Nickname, PDO::PARAM_STR);
    $query->bindParam(':Password', $Pwd, PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($Nickname === $user['userNickname'] && $Pwd === $user['userPassword']) {
        $_SESSION['userNickname'] = $Nickname;
//        $_SESSION['idUser'] = $idUser;

        header('Location:index.php');
    } else {
        $_SESSION['userNickname'] = "";
    }
}

function getSaltFromUser($Nickname) {
    $sql = "SELECT `userSalt` from `user` WHERE `userNickname` = :Nickname";
    $query = pokedb()->prepare($sql);
    $query->bindParam(':Nickname', $Nickname, PDO::PARAM_STR);
    $query->execute();
    return $query->fetch()[0];
}