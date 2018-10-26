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
        <span class="float-right" id="data-alerta"><?php echo $result['dataCriacao']; ?></span>
    </div>
    <div class="text-center">
        <?php if($result['primeiroNome']){ ?>
            <h1><?php echo $result['primeiroNome']." ".$result['ultimoNome']; ?> está em apuros!!!</h1>
        <?php }else{ ?>
            <h1><?php echo $result['username']; ?> está em apuros!!!</h1>
        <?php } ?>
        <h3><b>Mensagem:</b> <?php echo $result['mensagem']; ?></h3>
    </div>
</div>

<?php 
} 
require_once "../view/includes/footer.php"; 
?>
