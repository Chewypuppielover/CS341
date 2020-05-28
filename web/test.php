<?php
   print_r($_GET);
   session_start();
   print_r($_SESSION["cart"]); 
            
   if(isset($_GET['End_Session'])) {
      echo "ending session";
      session_unset();
      session_destroy();
   }
?>