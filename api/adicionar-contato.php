<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Content-Type");

require_once "../config.php";
require_once "../db/db.php";

$dados = file_get_contents("php://input");
$dados = json_decode($dados);

$solicitante = $dados->solicitante;
$contato = $dados->contato;

$db = new DB();

if(isset($solicitante) && isset($contato)){
    $result;

    $db->query("SELECT id FROM usuario WHERE username = ?");
    $db->bind(1, $contato);

    if($result = $db->singleResult()){
        $db->query("
            SELECT id FROM usuario_contato
            WHERE destinatario = ".$result['id']."
            AND remetente = ".$solicitante."
        ");

        if($db->singleResult()){
            echo json_encode(array('code' => 1, 'msg' => 'Erro! Contato já existe'));
        }
        else{
            $sql = "
                INSERT INTO usuario_contato(destinatario, remetente, dataEntrada) VALUES
                (
                    ".$result['id'].",
                    ".$solicitante.",
                    NOW()
                )
            ";

            $db->query($sql);

            if($db->execute()){
                echo json_encode(array('code' => 0, 'msg' => 'Sucesso!'));
            }
            else{
                echo json_encode(array('code' => 1, 'msg' => 'Erro!'));
            }
        }
    }
    else{
        echo json_encode(array('code' => 1, 'msg' => 'Erro!'));
    }
}
?>