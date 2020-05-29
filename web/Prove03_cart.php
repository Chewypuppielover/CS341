<?php
   session_start();
   $MAXCOL = 3;
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset = "utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>Products Cart </title>
      <script type="text/javascript">
         alert("JS is Working, page loaded");
         document.getElementById("clear").addEventListener("click", reset('button'));
         document.getElementById("info").addEventListener("change", reset('div'));
         
         function reset(source) {
            alert("reset called by " + source);
            location.reload();
            alert(document.getElementById("info").innerHTML);// = "";
         }
      </script>
   </head>
   <body>
      <?php
         $DEBUGCOUNT = 0;
         $DEBUG = true;
         if($DEBUG) echo "POST: ",print_r($_POST,true),"<br>";
      if(isset($_POST['item'])) {
         $item = $_POST["item"];
         unset($_POST["item"]);
         $_SESSION["cart"][$item] -= 1;
            if($DEBUG) echo "item = $item \n<br>";
            if($DEBUG) echo "POST: ",print_r($_POST,true),"<br>";
      }
         if($DEBUG) echo "<pre>SESSION:<br>",print_r($_SESSION,true),"</pre>";
      ?>
      <header style="text-align:center;">
         <h1>Sally's Terrible Store </h1>
         <a href="Prove03.php"> Products </a>
      </header>
      <hr/>
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
                     if($col == $MAXCOL) {
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
      <form method='post'>
         <input type='submit' id='clear' name='End_Session' value='Clear Cart'>
      </form>
      <div id="info">
         <?php
            if(isset($_POST['End_Session'])) {
               $DEBUGCOUNT += 1;
               echo "ending session $DEBUGCOUNT";
               unset($_POST['End_Session']);
               session_unset();
               session_destroy();
               session_start();
               print_r($_SESSION);
            }
         ?>
      </div>
   </body>
</html>