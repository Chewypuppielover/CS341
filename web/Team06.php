<?php 
   require('DBconnect.php');
   $db = get_db(); 
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset = "utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>Database Scripture Entry</title>
   </head>
   <body>
      <form method='post' action='Team06_insert.php'>
         Book: <input type='text' name='book'> <br>
         Chapter: <input type='text' name='chapter'> <br>
         Verse: <input type='text' name='verse'> <br>
         Scripture: <input type='textarea' name='content'> <br>
         Topic: <br>
         <?php 
            try {
               $statement = $db->prepare('SELECT id, name FROM topics');
               $statement-> execute();
               while ($row = $statement->fetch(PDO::FETCH_ASSOC))
               {
                  $id = $row['id'];
                  $name = $row['name'];
                  echo "<input type='checkbox' name='topics[]' id='$name' value='$id'>";
                  echo "<label for='$name'>$name</label><br>";
               }
            }
            catch (PDOException $ex) {
               echo "Error connecting to DB. Details: $ex";
               die();
            }
         ?>
         <input type='submit' value='Insert'>
      </form>
   </body>
</html>