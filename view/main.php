<?php 

require_once "includes/header.php"; 

?>

<p>Hello, <?php echo $_SESSION['usuario']['username']; ?>! </p>

<?php print_r($_SESSION); ?>

<?php require_once "includes/footer.php"; ?>