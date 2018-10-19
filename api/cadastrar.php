<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Content-Type");

require_once "../config.php";
require_once "../db/db.php";
require_once "../model/usuario.php";

$dados = file_get_contents("php://input");
$dados = json_decode($dados);

print_r($dados);

$username = $dados->username;
$email = $dados->email;
$senha = $dados->senha;

$db = new DB();

if(isset($username) && isset($email) && isset($senha)){
// if(isset($_GET['username']) && isset($_GET['email']) && isset($_GET['senha'])){
    // $username = $_GET['username'];
    // $email = $_GET['email'];
    // $senha = $_GET['senha'];

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
            echo json_encode(array('code' => 0, 'msg' => 'Erro! Execute banco'));
        }
        else{
            echo json_encode(array('code' => 1, 'msg' => 'Produto cadastrado com sucesso!'));
        }
    }catch(Exception $e){
        echo json_encode(array('code' => 2, 'msg' => 'Erro! Try catch'));
    }
}
else{
    echo json_encode(array('code' => 0, 'msg' => 'Erro! Parâmetros'));
}
?> 