<?php

require_once "../config.php";
require_once "../db/db.php";
require_once "../model/usuario.php";

$db = new DB();

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");

if(isset($_GET['username']) && isset($_GET['email']) && isset($_GET['senha'])){
    $username = $_GET['username'];
    $email = $_GET['email'];
    $senha = $_GET['senha'];

    $user = new Usuario($username, $email, $senha);

    try{
        $sql = "
            INSERT INTO usuario(username, email, senha, msgPanicoPadrao, usuarioAtivo, dataCriacao) VALUES
            (
                '".$user->getUsername()."',
                '".$user->getEmail()."',
                '".$user->getSenha()."',
                '".$user->getMsgPanico()."',
                ".$user->getUsuarioAtivo().",
                NOW()
            );

            SET @ultimo_usuario = LAST_INSERT_ID();
            SET @uu = LAST_INSERT_ID();

            INSERT INTO grupo(nomeGrupo, grupoAtivo, dataCriacao) VALUES
            (
                'Padrao',
                TRUE,
                NOW()
            );

            SET @ultimo_grupo = LAST_INSERT_ID();

            INSERT INTO usuario_grupo(usuario_id, grupo_id, admin, dataEntrada, membroAceito, usuario_solicitante) VALUES
            (
                @ultimo_usuario,
                @ultimo_grupo,
                TRUE,
                NOW(),
                'A',
                @uu
            )
        ";

        $db->query($sql);

        if(!$db->execute()){
            echo "Falhou :( <br />";
            echo "<textarea>".$sql."</textarea>";
        }
        else{
            echo "Cadastro realizado com sucesso!";
        }
    }catch(Exception $e){
        echo "Erro de conexão com o banco: ".$e->getMessage();
    }
}
else{
    echo "Algum parâmetro não foi definido.";
}
?> 