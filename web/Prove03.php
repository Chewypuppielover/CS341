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
      <header>
         <h1>Sally's Terrible Store </h1>
         <a href="Prove03_cart.php"> Cart </a>
      </header>
      <div style="display:flex">
         <table>
            <th> Products </th>
            <?php
               foreach($_Session["products"] as $item) {
                  echo "<tr>" . $item . "</tr>";
               }
            ?>
           <tr>
               <td> <label><input type="checkbox" name="products" value="i1" id="i1" onclick="total('i1')">Broken TV </td><td> $5 </td></label>
               <td> <label><input type="checkbox" name="products" value="i5" id="i5" onclick="total('i5')">Banana PB&J sandwich </td><td> $10 </td></label>
           </tr>
           <tr>
               <td> <label><input type="checkbox" name="products" value="i4" id="i4" onclick="total('i4')">Pirate Magnet </td><td> $5 </td></label>
               <td> <label><input type="checkbox" name="products" value="i3" id="i3" onclick="total('i3')">Grapes </td><td> $15 </td></label>
           </tr>
           <tr>
               <td> <label><input type="checkbox" name="products" value="i6" id="i6" onclick="total('i6')">
                  Answer to Life, the universe, and everything </td><td> $42 </td></label>
               <td> <label><input type="checkbox" name="products" value="i2" id="i2" onclick="total('i2')">Jar Jar </td><td> $20 </td></label>
           </tr>
         </table>
      </div>
   </body>
</html>