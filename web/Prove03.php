<?php
   session_start();
   if(!isset($_SESSION["cart"])){
      $_SESSION["cart"] = array("Broken TV" => 0, "JarJar" => 0, "Pirate Magnet" => 0, "Cleric" => 0, "Sorcerer" => 0, "Ranger" => 0, "Druid" => 0);
   }
   
   function AddToCart($item){
      echo $item;
      $_SESSION["cart"][$item] += 1;
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
      <script >
         function addToCart(item) {
            var p = "<?php ?>";
            var str = "AddToCart(" + item + "); ?>";
            alert(str);
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
               foreach($_SESSION["cart"] as $item => $x) {
                  if($count == 0) echo "<tr>";
                  echo "<td> $item <br> <button onclick=\"addToCart('$item')\">Add to Cart</button> </td>";
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