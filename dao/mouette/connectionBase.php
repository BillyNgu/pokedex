<?php
 function pokedb() {
            static $dbc = null;

            if ($dbc == null) {
                try {
                    $dbc = new PDO('mysql:host=' . DB_HOST . DB_PORT . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                        PDO::ATTR_PERSISTENT => true));
                } catch (Exception $e) {
                    echo 'Erreur : ' . $e->getMessage() . '<br />';
                    echo 'N° : ' . $e->getCode() . '<br />';
                    die('Could not connect to MySql');
                }
            }
            return $dbc;
        }
