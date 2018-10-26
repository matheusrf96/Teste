<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Content-Type");

require_once "../config.php";
require_once "../db/db.php";

$dados = file_get_contents("php://input");
$dados = json_decode($dados);

$remetente = $dados->remetente;
$mensagem = $dados->mensagem;

$db = new DB();

if(isset($remetente) && isset($mensagem)){

    $db->query("
        SELECT usuario.id, usuario_contato.destinatario FROM usuario_contato
        INNER JOIN usuario ON usuario_contato.destinatario = usuario.id
        WHERE usuario.usuarioAtivo = 1
        AND usuario_contato.remetente = ".$remetente."
    ");

    if($resultSet = $db->resultSet()){
        foreach ($resultSet as $item) {
            $db->query("
                INSERT INTO mensagem_usuario(mensagem, remetente_id, destinatario_id, lida, dataCriacao) VALUES
                ('".$mensagem."',".$remetente.", ".$item['destinatario'].", 0, NOW())
            ");

            if($db->execute()){
                echo json_encode(array('code' => 0, 'msg' => 'cadastrado com sucesso!'));
            }
            else{
                echo json_encode(array('code' => 1, 'msg' => 'Erro!'));
            }
        }
    }
    else{
        echo json_encode(array('code' => 2, 'msg' => 'Erro! Algum parâmetro não foi definido'));
    }
}