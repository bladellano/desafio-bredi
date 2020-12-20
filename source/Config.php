<?php

/**
 * SITE CONFIG
 */

define("SITE",[
    "name"=>"Desafio BREDI",
    "desc"=>"Desenvolvendo aplicação para o desafio",
    "domain"=>"desafiobredi.local.com",
    "locale"=>"pt_BR",
    "root"=>"http://localhost/desafio-bredi"
]);

/**
 * SITE MINIFY
 */
if($_SERVER['SERVER_NAME']=="localhost"){
    require __DIR__."/Minify.php";
}

/**
 * DATABASE CONNECT
 */

define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "db_bredi",
    "username" => "root",
    "passwd" => "root",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);


