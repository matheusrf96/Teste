<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("DB_HOST", "localhost");
define("DB_USER", "admin");
define("DB_PASS", "admin");
define("DB_NAME", "secure_hood");
define("ASSETS_PATH", "/tcc/");
define("ROOT_PATH", "/var/www/html/tcc/");
define("ROOT_URL", "http://localhost/tcc/");

require "model/grupo.php";
require "model/mensagem.php";
require "model/usuario.php";

require "db/db.php";

$db = new DB();

?>