<?php 

require_once "includes/header.php"; 

if(isset($_SESSION['usuario'])){ ?>

    <p>Hello, <?php echo $_SESSION['usuario']['username']; ?>! </p>
    <p><?php print_r($_SESSION['usuario']); ?></p>
    <a href="../control/logout.php">Logout</a>

<?php 
}
else{   
    header('Location: ../index.php');
} 
?>

<?php require_once "includes/footer.php"; ?>