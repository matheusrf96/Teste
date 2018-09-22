<?php 
if(!isset($_GET)){
    header("location: ../index.php");
}
else{
    $id = $_GET['id'];

    require_once "includes/header.php"; 
?>

<div class="container">
    
    <form class="form-login" action="../control/editar-perfil.php?id=<?php echo $id;?>" method="POST">
        <div class="form-group row">
            <div class="text-center" id="box-foto-perfil">

                <?php $fotoPerfil = "/tcc/view/assets/img/naom.jpg"; ?>

                <a href="<?php echo $fotoPerfil; ?>" target="blank"><img id="foto-perfil" src="<?php echo $fotoPerfil; ?>" alt="Foto de Perfil" height="150" width="150"/></a>
                <p><?php echo $_SESSION['usuario']['username']; ?></p>
            </div>
        </div>
        <!-- Consertar... -->
        <div class="form-group row">
            <label for="email">E-mail: </label>
            <input class="form-control" required type="email" name="email" id="email" value="<?php echo $_SESSION['usuario']['email']?>"/>
        </div>
        <div class="form-group row">
            <label for="pNome">Primeiro Nome: </label>
            <input class="form-control" type="text" name="pNome" id="pNome" value="<?php echo $_SESSION['usuario']['primeiroNome']?>" />
        </div>
        <div class="form-group row">
            <label for="uNome">Último Nome: </label>
            <input class="form-control" type="text" name="uNome" id="uNome" value="<?php echo $_SESSION['usuario']['ultimoNome']?>" />
        </div>
        <div class="form-group row">
            <label for="alerta">Mensagem de Alerta:</label>
            <textarea class="form-control" name="alerta" id="alerta" cols="30" rows="5"><?php echo $_SESSION['usuario']['msgPanicoPadrao']?></textarea>
        </div>
        <div class="form-group row">
            <label for="foto">Foto de Perfil: </label>
            <input class="btn btn-default" class="form-control" type="file" name="foto" id="foto" accept="image/*" value="<?php echo $_SESSION['usuario']['caminhoFotoPerfil']?> "/>
        </div>
        <div class="form-group row">
            <label for="senha">Senha: </label>
            <input class="form-control" required type="password" name="senha" id="senha" />
        </div>
        <div class="form-group row">
            <input class="btn btn-primary" type="submit" value="Salvar">
        </div>
    </form>
</div>
<?php 
    require_once "includes/footer.php";
}
?>