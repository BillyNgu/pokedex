<?php
session_start();

function SetFlashMessage($message) {
    $_SESSION["MessageFlash"] = $message;
}

function GetFlashMessage() {
    if (isset($_SESSION["MessageFlash"])) {
        $message = $_SESSION["MessageFlash"];
        unset($_SESSION["MessageFlash"]);
    }
 else {
        $message = "";
    }
    return $message;
}
