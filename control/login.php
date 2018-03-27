<?php

require_once "../config.php";
require_once "../db/db.php";

$db = new DB();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $senha = md5($_POST['senha']);
    $result;

    try{
        $result = $db->query("SELECT id FROM usuario WHERE username = '".$username."' AND senha = '".$senha."'");
    }catch(Exception $e){
        echo "Erro no acesso ao banco :".$e->getMessage();
    }

    $row = $db->singleResult();
    $active = $row['usuarioAtivo'];

    if($active != 0){
        session_register("username");
        $_SESSION['login_user'] = $username;

        header('location: main.php');
    }
    else{
        echo "Login ou senha inválidos";
    }
}
?>