<?php

session_start();

require_once "../config.php";
require_once "../db/db.php";

$db = new DB();

if(isset($_POST)){
    $contato = $_POST['contato'];
    $grupo = $_POST['grupo'];
    $result;

    $db->query("SELECT id FROM usuario WHERE username = ?");
    $db->bind(1, $contato);

    if($result = $db->singleResult()){
        $sql = "
            INSERT INTO usuario_grupo(usuario_id, grupo_id, admin, dataEntrada, membroAceito) VALUES
            (
                '".$result['id']."',
                '".$grupo."',
                0,
                NOW(),
                'P'
            )
        ";

        $db->query($sql);

        if($db->execute()){
            echo "<b>A operação foi realizada com sucesso!</b><br /><br />
                Se você não for redirecionado
                <a href='../view/main.php'> clique aqui</a>!
            ";

            header("refresh:3;url=../index.php");
        }
        else{
            echo "Falhou :( <br />";
            echo "<textarea>".$sql."</textarea>";
        }
    }
}
?>