<?php
   session_start();
   if(!isset($_SESSION["cart"])) $_SESSION["cart"] = array(
         "Broken TV" => 0, "JarJar" => 0, "Pirate Magnet" => 0,
         "Cleric" => 0, "Sorcerer" => 0, "Ranger" => 0,
         "Druid" => 0, "Necromancer" => 0, "Holly" => 0);
   $MAXCOL = 3;
?><?php
   $DEBUG = true;
   if($DEBUG) echo "<pre>", print_r($_SESSION, true),
                  print_r($_POST, true), "</pre>";
   if(isset($_POST['item'])) {
      $item = $_POST["item"];
      if($DEBUG) echo "item = $item \n<br>";
      $_SESSION["cart"][$item] += 1;
      unset($_POST["item"]);
      if($DEBUG) echo "<br>", print_r($_POST, true), "<br>";
   }
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset = "utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>Store Products </title>
   </head>
   <body>
      <header style="text-align:center;">
         <h1>Sally's Terrible Store </h1>
         <a href="Prove03_cart.php"> Cart </a>
      </header>
      <hr/>
      <div style="margin-left:20%">
         <table>
            <th> Products </th>
            <?php
               $col = 0;
               foreach($_SESSION["cart"] as $item => $x) {
                  if($col == 0) echo "<tr>";
                  echo "<td><form method='post'>
                        <input type='text' name='item' value='$item' hidden> $item <br>
                        <input type='submit' value='Add To Cart'></form></td>";
                  $col += 1;
                  if($col == $MAXCOL) {
                     $col = 0;
                     echo "</tr>";
                  }
               }
               if($col != 0) echo "</tr>";
            ?>
         </table>
      </div>
   </body>
</html>