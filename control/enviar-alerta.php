<?php

session_start();

require_once "../config.php";
require_once "../db/db.php";

$db = new DB();

if(isset($_POST)){
    $alerta = $_POST['alerta'];

    $db->query("
        SELECT usuario.id, usuario_contato.destinatario FROM usuario_contato
        INNER JOIN usuario ON usuario_contato.destinatario = usuario.id
        WHERE usuario.usuarioAtivo = 1
        AND usuario_contato.remetente = ".$_SESSION['usuario']['id']."
    ");

    if($resultSet = $db->resultSet()){
        print_r($resultSet);

        foreach ($resultSet as $item) {
            $db->query("
                INSERT INTO mensagem_usuario(mensagem, remetente_id, destinatario_id, lida, dataCriacao) VALUES
                ('".$_SESSION['usuario']['msgPanicoPadrao']."',".$_SESSION['usuario']['id'].", ".$item['destinatario'].", 0, NOW())
            ");

            $db->execute();
        }

        echo "<b>A operação foi realizada com sucesso!</b><br /><br />
            Se você não for redirecionado
            <a href='../view/main.php'> clique aqui</a>!
        ";

        header("refresh:20;url=../index.php");
    }
    else{
        echo "Nenhum contato encontrado. Adicione mais contatos para poder enviar um alerta.";
        header("refresh:3;url=../index.php");
    }
}

?>