<?php

session_start();

require "config.php";

require "model/grupo.php";
require "model/mensagem.php";
require "model/usuario.php";

require "db/db.php";

$db = new DB();

require "view/main.php";

?>