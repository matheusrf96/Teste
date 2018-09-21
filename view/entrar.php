<?php 

require_once "includes/header.php"; 

if(isset($_SESSION['usuario'])){
    header("Location: view/main.php");
}
else{
?>

<div class="form-login text-center">
    <h1 class="login-title">{Logo}</h1>

    <form action="control/login.php" method="post">
        <div class="form-group row">
            <label for="username">Username: </label>
            <input class="form-control" required type="text" name="username" id="username" />
        </div>
        <div class="form-group row">
            <label for="senha">Senha: </label>
            <input class="form-control" requided type="password" name="senha" id="senha" />
        </div>
        
        <input class="btn btn-primary button-login" type="submit" value="Enviar" />
    </form>

    <p>Não possui conta? <a href="view/cadastro.php">Registre-se</a> já!</p>
</div>
<?php 

}

require_once "includes/footer.php";
?>