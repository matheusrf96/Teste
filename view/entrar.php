<?php 
require_once ROOT_PATH."view/includes/header.php"; 

?>

<h1>Hello World!</h1>
<form action="<?php echo ROOT_PATH; ?>control/login.php" method="post">
    Username: <input type="text" name="username" /><br />
    Senha: <input type="password" name="senha" /><br />
    <input type="submit" value="Enviar" />
</form>

<p>Não possui conta? <a href="<?php echo ROOT_PATH; ?>view/cadastrar.php">Registre-se</a> já!</p>

<?php require_once ROOT_PATH."view/includes/footer.php"; ?>