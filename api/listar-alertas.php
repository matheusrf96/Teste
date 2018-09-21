<?php

require_once "../config.php";
require_once "../db/db.php";

$db = new DB();

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $db->query("
        SELECT mensagem_usuario.id,
            usuario.username,
            usuario.msgPanicoPadrao, 
            mensagem_usuario.dataCriacao, 
            mensagem_usuario.lida 
        FROM mensagem_usuario
        INNER JOIN usuario ON mensagem_usuario.remetente_id = usuario.id
        WHERE mensagem_usuario.destinatario_id = ".$id."
        ORDER BY mensagem_usuario.id DESC
    ");
    $result['listaAlertas'] = $db->resultSet();

    echo json_encode($result);

}
else{
    echo json_encode("Erro");
}

