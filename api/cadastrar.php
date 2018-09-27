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