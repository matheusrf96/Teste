<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: ".ROOT_PATH."view/main.php");
   }
?>