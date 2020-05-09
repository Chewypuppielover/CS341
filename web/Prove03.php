<?php
   session_start();
   if(!isset($_Session["cart"])){
      $_Session["cart"] = array();
      $_Session["products"] = array("Broken TV", "JarJar", "Pirate Magnet", "Cleric", "Sorcerer", "Ranger", "Druid");
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
      <script type='text/javascript'>
         function addToCart(item){
            <?php 
               $index = count($_Session["cart"]);
               $_Session["cart"][$index] = item;
            ?>
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
      <div style="display:flex">
         <table>
            <th> Products </th>
            <?php
               $count = 0;
               foreach($_Session["products"] as $item) {
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
   </body>
</html>