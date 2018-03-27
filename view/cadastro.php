<?php require_once "includes/header.php"; ?>

<h1>Cadastro</h1>

<form action="../control/cadastrar.php" method="post">
    Username: <input required type="text" name="username" id="username" /><br />
    E-mail: <input required type="email" name="email" id="email" /><br />
    Senha: <input required type="password" name="senha" id="senha" /><br />
    <input type="submit" value="Enviar" />
</form>

<?php require_once "includes/footer.php"; ?>