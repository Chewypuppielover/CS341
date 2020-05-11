<?php
   session_start();
   if(!isset($_SESSION["cart"])){
      $_SESSION["cart"] = array("Broken TV" => 0, "JarJar" => 0, "Pirate Magnet" => 0, "Cleric" => 0, "Sorcerer" => 0, "Ranger" => 0, "Druid" => 0);
   }
   
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      echo "caught post";
      echo $_POST["item"];
   }
   
   function AddToCart($item){
      echo $item;
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
      <script ></script>
      <style></style>
   </head>
   <body>
      <header style="text-align:center;">
         <h1>Sally's Terrible Store </h1>
         <a href="Prove03_cart.php"> Cart </a>
      </header>
      <hr/>
      <!--<div style="display:flex">-->
      <form method="post">
         <table>
            <th> Products </th>
            <?php
               $count = 0;
               foreach($_SESSION["cart"] as $item => $x) {
                  if($count == 0) echo "<tr>";
                  echo "<td> <input type='text' name='item' value='$item' disabled> <br> ";
                  echo "<input type='submit' name='item' value='Add To Cart'></td>";
                  $count += 1;
                  if($count == 3) {
                     $count = 0;
                     echo "</tr>";
                  }
               }
               if($count != 0) echo "</tr>";
            ?>
         </table>
      </form>
      <?php print_r($_SESSION["cart"]); ?>
   </body>
</html>