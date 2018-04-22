<?php 

require_once "includes/header.php"; 

if(isset($_SESSION['usuario'])){ ?>

    <p>Hello, <?php echo $_SESSION['usuario']['username']; ?>! <a href="../control/logout.php">Logout</a></p>

    <div class="row">
        <div class="col">
            <h3>Lista de alertas:</h3>
        </div>
        <div class="col">
            <h3>Lista de contatos:</h3>

            <form action="../control/adicionar-contato.php" method="POST">
                <input type="text" name="contato" id="contato" placeholder="Usuário a ser adicionado" />
                <input type="hidden" name="grupo" id="grupo" value="<?php echo $_SESSION['usuario']['grupoPadrao']; ?>" />
                <input type="submit" value="Solicitar" />
            </form>

            <br />

            <?php require_once "../control/listar-contatos.php"; ?>
        </div>
        <div class="col">
            <h3>Solicitação de contatos: </h3>
            <?php require_once "../control/solicitacoes-pendentes.php"; ?>
        </div>
    </div>

<?php 
}
else{   
    header('Location: ../index.php');
} 
?>

<?php require_once "includes/footer.php"; ?>