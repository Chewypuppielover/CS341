<?php
   session_start();
?><?php
   if(!isset($_SESSION["cart"])){
      $_SESSION["cart"] = array("Broken TV" => 0, "JarJar" => 0, "Pirate Magnet" => 0, "Cleric" => 0, "Sorcerer" => 0, "Ranger" => 0, "Druid" => 0);
   }
   
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      echo "caught post <br>";
      print_r($_POST);
      AddToCart($_POST["item"]);
   }
   
   function AddToCart($item){
      echo "<br>";
      $_SESSION["cart"][$item] += 1;
      print_r($_SESSION["cart"]);
   }  
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset = "utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>Store Products </title>
      <!--<link rel="stylesheet" href=".css">-->
      <!--<script src="jsFuncts.js"> </script> type='text/javascript'-->
      <script>
         function reset()
         {
            location.reload();
            
         }
      </script>
      <style></style>
   </head>
   <body>
      <header style="text-align:center;">
         <h1>Sally's Terrible Store </h1>
         <a href="Prove03_cart.php"> Cart </a>
      </header>
      <hr/>
      <div id="status"> </div>
      <div style="display:flex">
         <table>
            <th> Products </th>
            <?php
               $count = 0;
               foreach($_SESSION["cart"] as $item => $x) {
                  if($count == 0) echo "<tr>";
                  echo "<td><form method='post'><input type='text' name='item' value='$item' hidden> $item <br> ";
                  echo "<input type='submit' value='Add To Cart'></form></td>";
                  $count += 1;
                  if($count == 3) {
                     $count = 0;
                     echo "</tr>";
                  }
               }
               if($count != 0) echo "</tr>";
            ?>
         </table>
      </div>
      <form method='get'><input type='submit' name='End Session' value='End Session'>
      <div id="info">
         <?php
            print_r($_SESSION["cart"]); 
            
            if(isset($_GET['End Session'])) {
               echo "ending session"
               session_unset();
               session_destroy();
            }
         ?>
      </div>
   </body>
</html>