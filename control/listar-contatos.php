<?php

require_once "../config.php";
require_once "../db/db.php";

$db = new DB();

$db->query("
    SELECT B.username FROM usuario_contato
    INNER JOIN usuario AS A ON usuario_contato.remetente = A.id
    INNER JOIN usuario AS B ON usuario_contato.destinatario = B.id
    AND usuario_contato.remetente = ".$_SESSION['usuario']['id']
);

$contatos = $db->resultSet();

?>

<h3>Contatos</h3>

<ul>

<?php foreach ($contatos as $item) { ?>
    <li><?php echo $item['username']; ?></li>
<?php } ?>

</ul>