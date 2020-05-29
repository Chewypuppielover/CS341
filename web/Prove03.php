<?php
   session_start();
   if(!isset($_SESSION["cart"])) $_SESSION["cart"] = array(
         "Broken TV" => 0, "JarJar" => 0, "Pirate Magnet" => 0,
         "Cleric" => 0, "Sorcerer" => 0, "Ranger" => 0,
         "Druid" => 0, "Necromancer" => 0, "Holly" => 0);
   if(!isset($_SESSION["DEBUG"])) $_SESSION["DEBUG"] = false;
   $MAXCOL = 3;
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset = "utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>Store Products </title>
      <script type="text/javascript">
         var DEBUG = false;
         if(DEBUG) alert("JS is Working, page loaded");
      </script>
   </head>
   <body>
      <?php
            if($_SESSION["DEBUG"]) echo "POST: ", print_r($_POST,true),"<br>";
         if(isset($_POST['item'])) {
            $item = $_POST["item"];
            unset($_POST["item"]);
            $_SESSION["cart"][$item] += 1;
               if($_SESSION["DEBUG"]) echo "item = $item \n<br>";
               if($_SESSION["DEBUG"]) echo "POST: ", print_r($_POST,true);
         }
            if($_SESSION["DEBUG"]) echo "<pre>SESSION ",print_r($_SESSION,true),"</pre>";
      ?>
      <header style="text-align:center;">
         <h1>Sally's Terrible Store </h1>
         <h3><a href="Prove03_cart.php"> Cart </a></h3>
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