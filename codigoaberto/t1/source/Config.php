<?php

/**
 * SITE CONFIG
 */
define("SITE", [
    "name" => "Auth em MVC com PHP",
    "desc" => "Aprenda a construir uma aplicação de autenticação em MVC com PHP do Jeito Certo",
    "domain" => "localauth.com",
    "locale" => "pt_BR",
    "root" => "https://localhost/authphp/codigoaberto/t1"
]);

/**
 * SITE MINIFY
 */
if ($_SERVER["SERVER_NAME"] == "localhost") {
    require __DIR__ . "/Minify.php";
}

/**
 * DATABASE CONNECT
 */
define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "127.0.0.1",
    "port" => "3306",
    "dbname" => "auth",
    "username" => "root",
    "passwd" => "salmos89",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);

/**
 * SOCIAL CONFIG
 */
define("SOCIAL", [
    "facebook_page" => "",
    "facebook_author" => "",
    "facebook_appId" => "",
    "twitter_creator" => "",
    "twitter_site" => ""
]);

/**
 * MAIL CONNECT
 */
define("MAIL", [
    "host" => "smtp.sendgrid.net",
    "port" => "587",
    "user" => "apikey",
    "passwd" => "",
    "from_name" => "Anderson O. Aristides",
    "from_email" => "contato@makersweb.com.br"
]);

/**
 * SOCIAL LOGIN: FACEBOOK
 */
define("FACEBOOK_LOGIN", [
    "clientId" => "",
    "clientSecret" => "",
    "redirectUri" => SITE["root"] . "/facebook",
    "graphApiVersion"  => "v5.0"
]);

/**
 * SOCIAL LOGIN: GOOGLE
 */
define("GOOGLE_LOGIN", [
    "clientId" => "",
    "clientSecret" => "",
    "redirectUri" => SITE["root"] . "/google"
]);