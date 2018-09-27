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
            echo "<b>A operação foi realizada com sucesso!</b><br /><br />
                Se você não for redirecionado para a página de login 
                <a href='../index.php'> clique aqui</a>!
            ";

            header("refresh:3;url=../index.php");
        }
    }catch(Exception $e){
        echo "Erro de conexão com o banco: ".$e->getMessage();
    }
}
?>