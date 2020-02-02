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
    "facebook_page" => "makersit",
    "facebook_author" => "anderson.o.aristides",
    "facebook_appId" => "232323232323",
    "twitter_creator" => "@aoaristides",
    "twitter_site" => "@aoaristides"
]);

/**
 * MAIL CONNECT
 */
define("MAIL", [
    "host" => "smtp.sendgrid.net",
    "port" => "587",
    "user" => "apikey",
    "passwd" => "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",
    "from_name" => "Anderson O. Aristides",
    "from_email" => "contato@makersweb.com.br"
]);

/**
 * SOCIAL LOGIN: FACEBOOK
 */
define("FACEBOOK_LOGIN", [
    "clientId" => "2385512085092614",
    "clientSecret" => "6d45775b5db97723183f188272c55849",
    "redirectUri" => SITE["root"] . "/facebook",
    "graphApiVersion"  => "v5.0"
]);

/**
 * SOCIAL LOGIN: GOOGLE
 */
define("GOOGLE_LOGIN", [
    "clientId" => "61561568847-cgi3ccpb13pu6t301g8v00qfshst3gsp.apps.googleusercontent.com",
    "clientSecret" => "dQdN-bkWn_YTDWdcX1_03NEq",
    "redirectUri" => SITE["root"] . "/google"
]);