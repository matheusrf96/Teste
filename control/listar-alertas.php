<?php

require_once "../config.php";
require_once "../db/db.php";

$db = new DB();

$db->query("
    SELECT usuario.username, usuario.msgPanicoPadrao, mensagem_usuario.dataCriacao FROM mensagem_usuario
    INNER JOIN usuario ON mensagem_usuario.remetente_id = usuario.id
    WHERE mensagem_usuario.destinatario_id = ".$_SESSION['usuario']['id']."
");

$alertas = $db->resultSet();

foreach ($alertas as $item) {
    ?>

    <li>
        <h5>Alerta de <?php echo $item['username']; ?></h5>
        <p><?php echo $item['msgPanicoPadrao']; ?></p>
        <p><?php echo $item['dataCriacao']; ?></p>
    </li>

    <?php
}

?>