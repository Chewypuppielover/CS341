<?php
   session_start();
   //if(!isset($_SESSION["cart"])) $_SESSION["cart"] = array("Broken TV" => 0, "JarJar" => 0, "Pirate Magnet" => 0,"Cleric" => 0, "Sorcerer" => 0, "Ranger" => 0,"Druid" => 0, "Necromancer" => 0, "Holly" => 0);
?><?php
   print_r($_SESSION["cart"]);
   echo "\n<br>";
   
   if(isset($_POST['item'])) {
      echo "caught post <br>";
      print_r($_POST);
      RemoveFromCart($_POST["item"]);
   }
   
   function RemoveFromCart($item){ $_SESSION["cart"][$item] -= 1;}
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset = "utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>Products Cart </title>
      <script type="text/javascript">
         function reset() {
            document.getElementById("info") = "";
            location.reload();
         }
      </script>
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
               $col = 0;
               $count = 0;
               foreach($_SESSION["cart"] as $item => $x) {
                  if($x != 0) {
                     $count += 1;
                     if($col == 0) echo "<tr>";
                     echo "<td><form method='post'><input type='text' name='item' value='$item' hidden>$x... $item <br> ";
                     echo "<input type='submit' value='Remove one from Cart'></form></td>";
                     $col += 1;
                     if($col == 3) {
                        $col = 0;
                        echo "</tr>";
                     }
                  }
               }
               if($col != 0) echo "</tr>";
               if($count == 0) echo "<tr><td> No items in Cart </td></tr>";
            }
         ?>
      </table>
      <br>
      <form method='post'><input type='submit' name='End_Session' value='Clear Cart'>
      <div id="info" onchange="reset()">
         <?php
            if(isset($_POST['End_Session'])) {
               echo "ending session";
               session_unset();
               session_destroy();
               session_start();
            }
         ?>
      </div>
   </body>
</html>