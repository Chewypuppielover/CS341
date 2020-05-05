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
    <?php echo "Name: $name </br>"; 
          echo "Email: $email <p><a href=\"$email\">Send email</a></p> </br>";
          echo "Major: $major </br>";
          echo "$comments </br>";
          echo "Has been to: ";//$countries";
          foreach($countries as $country){echo "$country, ";}
    ?>
  </body>
</html>