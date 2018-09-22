<?php

require_once "includes/header.php"; 

if(!isset($_GET)){
    header("location: ../index.php");
}
else{
    $id = $_GET['id'];

    require_once "../control/exibir-alerta.php";
?>
<div class="container box-alerta-detalhes">
    <div>
        <span class="float-right" id="data-alerta"><?php echo $remetente['dataCriacao']; ?></span>
    </div>
    <div class="text-center">
        <h1><?php echo $remetente['username']; ?> ESTÁ EM APUROS!!!</h1>
        <h3><b>Mensagem:</b> <?php echo $remetente['msgPanicoPadrao']; ?></h3>
    </div>
</div>

<?php 
} 
require_once "../view/includes/footer.php"; 
?>
