<?php 
require_once "includes/header.php"; 

?>

<h1>Hello World!</h1>
<form action="control/login.php" method="post">
    Username: <input required type="text" name="username" /><br />
    Senha: <input requided type="password" name="senha" /><br />
    <input type="submit" value="Enviar" />
</form>

<p>Não possui conta? <a href="view/cadastro.php">Registre-se</a> já!</p>

<?php require_once "includes/footer.php"; ?>