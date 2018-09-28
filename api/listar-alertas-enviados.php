<?php

require_once "../config.php";
require_once "../db/db.php";

$db = new DB();

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $db->query("
        SELECT mensagem_usuario.*, usuario.username FROM mensagem_usuario
        INNER JOIN usuario ON mensagem_usuario.remetente_id = usuario.id
        WHERE remetente_id = ".$id."
        ORDER BY mensagem_usuario.dataCriacao DESC
    ");

    $alertas = $db->resultSet();

    echo json_encode($alertas);
}
else{
    echo json_encode("Erro");
}