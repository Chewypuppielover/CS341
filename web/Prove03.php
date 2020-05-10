<?php
   session_start();
   if(!isset($_SESSION["cart"])){
      $_SESSION["cart"] = array();
      $_SESSION["products"] = array("Broken TV", "JarJar", "Pirate Magnet", "Cleric", "Sorcerer", "Ranger", "Druid");
   }
   
   function addToCart($item){
      $index = count($_SESSION["cart"]);
      $_SESSION["cart"][$index] = item;
   }  
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset = "utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>Store Products </title>
      <!--<link rel="stylesheet" href=".css">-->
      <!--<script src="jsFuncts.js"> </script>-->
      <script type='text/javascript'></script>
      <style></style>
   </head>
   <body>
      <header style="text-align:center;">
         <h1>Sally's Terrible Store </h1>
         <a href="Prove03_cart.php"> Cart </a>
      </header>
      <hr/>
      <div style="display:flex">
         <table>
            <th> Products </th>
            <?php
               $count = 0;
               foreach($_SESSION["products"] as $item) {
                  if($count == 0) echo "<tr>";
                  echo "<td> $item <br> <button onclick=\"addToCart($item)\">Add to Cart</button> </td>";
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
      <?php print_r($_SESSION["cart"]); ?>
   </body>
</html>