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
      $scriptureID = $db -> lastInsertId("scripture_id_seq");

      foreach ($topics as $topicID) {
         echo "Topic: $topicID, Scripture: $scriptureID <br>";
         $statement = $db -> prepare('INSERT INTO linked (topicID, scriptureID) VALUES (?, ?)');
         $statement -> execute([$topicID, $scriptureID]);
      }
   }
   catch (PDOException $ex) {
      echo "Error connecting to DB. Details: $ex";
      die();
   }
   echo "Success!";
?>