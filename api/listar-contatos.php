<?php

require_once "../config.php";
require_once "../db/db.php";

$db = new DB();

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $db->query("
        SELECT B.id, B.username, B.primeiroNome, B.ultimoNome FROM usuario_contato
        INNER JOIN usuario AS A ON usuario_contato.remetente = A.id
        INNER JOIN usuario AS B ON usuario_contato.destinatario = B.id
        AND usuario_contato.remetente = ".$id
    );

    $contatos = $db->resultSet();

    echo json_encode($contatos);
}
else{
    echo json_encode("Erro");
}

