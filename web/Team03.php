<?php
   $name = $_POST["Name"];
   $email = $_POST["Email"];
   $major = $_POST["Major"];
   $comments = $_POST["Comments"];
   $countries = $_POST["Loc"];
?>
<html>
   <head>
      <title> Team02 php </title>
   </head>
   <body>
      <?php 
         echo "Name: $name </br>"; 
         echo "Email: $email <a href=\"$email\">Send email</a> </br>";
         echo "Major: $major </br>";
         echo "$comments </br>";
         echo "Has been to: ";//$countries";
         foreach($countries as $country){echo "$country, ";}
      ?>
   </body>
</html>