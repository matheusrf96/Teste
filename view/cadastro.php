<?php require_once "includes/header.php"; ?>

<!-- <a href="../index.php">Voltar</a> -->

<div class="form-login text-center">

    <h1>Cadastro</h1>

    <form action="../control/cadastrar.php" method="post">
        <div class="form-group row">
            <label for="username">Username: </label>
            <input class="form-control" required type="text" name="username" id="username" />
        </div>
        <div class="form-group row">
            <label for="email">E-mail: </label>
            <input class="form-control" requided type="email" name="email" id="email" />
        </div>
        <div class="form-group row">
            <label for="senha">Senha: </label>
            <input class="form-control" requided type="password" name="senha" id="senha" />
        </div>
        
        <input class="btn btn-primary button-login" type="submit" value="Cadastrar" />
    </form>

</div>
<?php require_once "includes/footer.php"; ?>