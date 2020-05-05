<?php
    $name = $_POST["Name"];
    $email = $_POST["Email"];
    $major = $_POST["Major"];
    $comments = $_POST["Comments"];
    $countries = $_POST["Loc"];
?>
<html>
  <head>
    <title Team02 php </title>
  </head>
  <body>
    <?php echo $name; 
          echo $email;
          echo $major;
          echo $comments;
          echo $countries;
    ?>
  </body>
</html>