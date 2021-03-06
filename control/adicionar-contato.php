<?php

session_start();

require_once "../config.php";
require_once "../db/db.php";

$db = new DB();

if(isset($_POST)){
    $contato = $_POST['contato'];
    $solicitante = $_SESSION['usuario']['id'];
    // $grupo = $_POST['grupo'];
    $result;

    $db->query("SELECT id FROM usuario WHERE username = ?");
    $db->bind(1, $contato);

    if($result = $db->singleResult()){
        $db->query("
            SELECT id FROM usuario_contato
            WHERE destinatario = ".$result['id']."
            AND remetente = ".$_SESSION['usuario']['id']."
        ");

        if($db->singleResult()){
            echo "<b>Erro!</b> O contato já existe!<br /><br />
                Se você não for redirecionado
                <a href='../view/main.php'> clique aqui</a>!
            ";

            header("refresh:3;url=../index.php");
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
    else{
        echo "Nenhum usuário encontrado.";
        header("refresh:3;url=../index.php");
    }
}
?>