<?php
   $book = $_POST['book'];
   $chapter = $_POST['chapter'];
   $verse = $_POST['verse'];
   $content = $_POST['content'];
   $topics = $_POST['topics'];

   require('DBconnect.php');
   $db = get_db();

   try {
      $statement = $db -> prepare('INSERT INTO scripture (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content)');
      $statement -> execute(['book' => $book, 'chapter' => $chapter, 'verse' => $verse, 'content' => $content]);
      $scriptureId = $db->lastInsertId();

      foreach ($topics as $topic)
      {
         echo "Topic: $topic, Scripture: $scriptureID <br>";
         $statement = $db -> prepare('INSERT INTO linked VALUES (?, ?)');
         $statement -> execute([$topic, $scriptureID]);
      }
   }
   catch (PDOException $ex) {
      echo "Error connecting to DB. Details: $ex";
      die();
   }
   echo "Success!";
?>