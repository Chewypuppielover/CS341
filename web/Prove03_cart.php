<?php
   session_start();
   if(!isset($_Session["cart"])){
      $_Session["cart"] = array("No items in Cart");
   }

   function removeFromCart($item){
      $index = array_search($item, $_Session["cart"]);
      $_Session["cart"][$index] = null;
   }
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset = "utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>Products Cart </title>
      <!--<link rel="stylesheet" href=".css">-->
      <!--<script src="jsFuncts.js"> </script>-->
      <script type='text/javascript'></script>
      <style></style>
   </head>
   <body>
      <header style="text-align:center;">
         <h1>Sally's Terrible Store </h1>
         <a href="Prove03.php"> Products </a>
      </header>
      <table>
         <th> Products in Cart</th>
         <?php
            $count = 0;
            foreach($_Session["cart"] as $item) {
               if($count == 0) echo "<tr>";
               echo "<td> $item <br> <button onclick=\"removeFromCart($item)\">Remove From Cart</button> </td>";
               $count += 1;
               if($count == 3) {
                  $count = 0;
                  echo "</tr>";
               }
            }
            if($count != 0) echo "</tr>";
         ?>
      </table>
      <?php print_r($_Session["cart"]); ?>
   </body>
</html>