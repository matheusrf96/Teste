<?php 

require_once "includes/header.php"; 

if(isset($_SESSION['usuario'])){ ?>

    <p>Hello, <?php echo $_SESSION['usuario']['username']; ?>! <a href="../control/logout.php">Logout</a></p>

    <div class="row">
        <div class="col">
            <h3>Lista de contatos:</h3>
        </div>
        <div class="col">
            <h3>Lista de alertas:</h3>
        </div>
    </div>

<?php 
}
else{   
    header('Location: ../index.php');
} 
?>

<?php require_once "includes/footer.php"; ?>