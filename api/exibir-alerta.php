<?php

require_once "../config.php";
require_once "../db/db.php";

$db = new DB();

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");

if(isset($_GET['id_usuario']) && isset($_GET['id_alerta'])){
    $idUsuario = $_GET['id_usuario'];
    $idAlerta = $_GET['id_alerta'];

    $db->query("
        SELECT mensagem_usuario.*, usuario.username, usuario.primeiroNome, usuario.ultimoNome
        FROM mensagem_usuario
        INNER JOIN usuario ON mensagem_usuario.remetente_id = usuario.id
        WHERE mensagem_usuario.id = ?
    ");
    $db->bind(1, $idAlerta);
    $result = $db->singleResult();

    if($result['destinatario_id'] == $idUsuario){
        $db->query("
            UPDATE mensagem_usuario
            SET lida = 1,
            dataLida = NOW()
            WHERE id = ?
        ");
        $db->bind(1, $idAlerta);
        $db->execute();
    }
    else{
        echo "Erro banco.";
    }

    echo json_encode($result);
}
else{
    echo "Nenhum parâmetro foi passado";
}

?>