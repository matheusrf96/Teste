<?php

require_once "../config.php";
require_once "../db/db.php";

$db = new DB();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $senha = md5($_POST['senha']);
    $result;

    #echo $username."<br />".$senha."<br />"."21232f297a57a5a743894a0e4a801fc3<br />";

    $db->query("SELECT * FROM usuario WHERE username = ? AND senha = ?");
    $db->bind(1, $username);
    $db->bind(2, $senha);

    if($result = $db->singleResult()){
        echo "ok";
    }
    else{
        echo "<textarea>SELECT * FROM usuario WHERE username = '".$username."' AND senha = '".$senha."'</textarea>";
    }

    print_r($db->singleResult());

    $row = $db->singleResult();
    $active = $row['usuarioAtivo'];

    if($active != 0){
        session_register("username");
        $_SESSION['login_user'] = $username;

        header('location: main.php');
    }
    else{
        echo "<b>Login ou senha inválidos</b>";
    }
}
?>