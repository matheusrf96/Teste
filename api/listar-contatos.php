<?php

require_once "../config.php";
require_once "../db/db.php";

$db = new DB();

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $db->query("
        SELECT usuario.username FROM usuario_grupo
        INNER JOIN usuario ON usuario_grupo.usuario_id = usuario.id
        WHERE usuario_grupo.membroAceito = 'A'
        AND usuario.usuarioAtivo = 1
        AND usuario_grupo.usuario_solicitante = ".$_SESSION['usuario']['id']."
        And usuario_grupo.admin = 0
    ");

    $contatos = $db->resultSet();

    echo json_encode($contatos);
}
else{
    echo json_encode("Erro");
}

