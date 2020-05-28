<?php
   session_start();
   //if(!isset($_SESSION["cart"])) $_SESSION["cart"] = array("No items in Cart");
?><?php
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      echo "caught post <br>";
      print_r($_POST);
      RemoveFromCart($_POST["item"]);
   }
   
   function RemoveFromCart($item){
      echo "<br>";
      $_SESSION["cart"][$index] -= 1;
      print_r($_SESSION["cart"]);
   }
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset = "utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>Products Cart </title>
   </head>
   <body>
      <header style="text-align:center;">
         <h1>Sally's Terrible Store </h1>
         <a href="Prove03.php"> Products </a>
      </header>
      <table>
         <th> Products in Cart</th>
         <?php
            if(!isset($_SESSION["cart"])) echo "<tr><td> No items in Cart </td></tr>";
            else {
               $count = 0;
               foreach($_SESSION["cart"] as $item => $x) {
                  if($x != 0) {
                     if($count == 0) echo "<tr>";
                     echo "<td><form method='post'><input type='text' name='item' value='$item' hidden> $item <br> ";
                     echo "<input type='submit' value='Remove one from Cart'></form></td>";
                     $count += 1;
                     if($count == 3) {
                        $count = 0;
                        echo "</tr>";
                     }
                  }
               }
               if($count != 0) echo "</tr>";
            }
         ?>
      </table>
      <?php print_r($_SESSION); ?>
   </body>
</html>