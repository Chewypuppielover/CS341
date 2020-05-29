<?php
   session_start();
   $MAXCOL = 3;
   $_SESSION["DEBUG"] = false;
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
      <hr/>
      <table>
         <th> Products in Cart</th>
         <?php
            $col = 0;
            $count = 0;
            foreach($_SESSION["cart"] as $item => $x) {
               if($x != 0) {
                  $count += 1;
                  if($col == 0) echo "<tr>";
                  echo "<td><form method='post'>
                        <input type='text' name='item' value='$item' hidden>$x... $item <br>
                        <input type='submit' value='Remove one from Cart'></form></td>";
                  $col += 1;
                  if($col == $MAXCOL) {
                     $col = 0;
                     echo "</tr>";
                  }
               }
            }
            if($col != 0) echo "</tr>";
            if($count == 0) echo "<tr><td> No items in Cart </td></tr>";
         ?>
      </table>
      <br>
      <form method="post">
         <input type="submit" id="clr" name="End_Session" value="Clear Cart">
      </form>
      <div id="info">
         
      </div>
      <script type="text/javascript">
         window.onload = function () {
            var DEBUG = false;
            if(DEBUG) alert("JS is Working, page loaded");
            //document.getElementById("clr").addEventListener("click", function(){reset('button');} );
            document.getElementById("info").addEventListener("change", function(){reset('div');} );
         };
         
         function reset(source) {
            alert("reset called by " + source);
            location.reload();
            alert(document.getElementById("info").innerHTML);// = "";
         }
      </script>
   </body>
</html>