<?php

require_once "../config.php";
require_once "../db/db.php";
require_once "../model/usuario.php";

$db = new DB();

if(isset($_POST)){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $user = new Usuario($username, $email, $senha);

    echo $user->toString()."<br />";

    try{
        $db->query("
            INSERT INTO usuario(username, email, senha, msgPanicoPadrao, usuarioAtivo, dataCriacao) VALUES
            (
                '".$user->getUsername()."',
                '".$user->getEmail()."',
                '".$user->getSenha()."',
                '".$user->getMsgPanico()."',
                ".$user->getUsuarioAtivo().",
                ".$user->getDataCriacao()."
            )
        ");

        #$db->execute();

        if(!$db->execute()){
            echo "Falhou :( <br />";
        }

        echo "<b>A operação foi realizada com sucesso!</b>";
    }catch(Exception $e){
        echo "Erro de conexão com o banco: ".$e->getMessage();
    }
}
?>