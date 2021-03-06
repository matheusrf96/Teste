<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Securehood</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="/tcc/view/assets/css/style.css" />
    <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="/tcc/view/assets/js/main.js"></script>
</head>
<body>
    <nav class="navbar header">
        <?php 
        if($_SERVER['REQUEST_URI'] != '/tcc/view/main.php' && $_SERVER['REQUEST_URI'] != '/tcc/index.php'){
            echo "<a href='/tcc/view/main.php'><img class='arrow-left' src='/tcc/view/assets/img/arrow-left.png' /></a>";
        }
        ?>
        <div class="container">
            <a class="navbar-brand" href="#">Securehood</a>
        </div>
    </nav>

    <div id="wrap">
    <div class="container" id="main">