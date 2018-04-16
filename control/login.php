<?php

session_start();

require_once "../config.php";
require_once "../db/db.php";

$db = new DB();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $senha = md5($_POST['senha']);
    $result;

    $db->query("SELECT id FROM usuario WHERE username = ? AND senha = ?");
    $db->bind(1, $username);
    $db->bind(2, $senha);

    if($result = $db->singleResult()){
        $db->query("SELECT * FROM usuario WHERE id = ?");
        $db->bind(1, $result['id']);
        $row = $db->singleResult();
        
        $active = $row['usuarioAtivo'];

        if($active != 0){
            $_SESSION['usuario'] = $row;

            header('location: ../view/main.php');
        }
        else{
            echo "<b>Login ou senha inválidos</b>";
            header("refresh:3;url=../index.php");
        }
    }
    else{
        #echo "<textarea>SELECT * FROM usuario WHERE username = '".$username."' AND senha = '".$senha."'</textarea>";
        echo "Login inválido. Tente novamente!";
        header("refresh:3;url=../index.php");
    }
}
?>