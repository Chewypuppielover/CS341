<?php
  $book = $_POST['book'];
  $chapter = $_POST['chapter'];
  $verse = $_POST['verse'];
  $content = $_POST['content'];
  $topics[] = $_POST['topics[]'];
  
  require('DBconnect.php');
  $db = get_db();

try {
  $statement = $db -> prepare('INSERT INTO scripture (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content)');
  $statement -> execute(['book' => $book, 'chapter' => $chapter, 'verse' => $verse, 'content' => $content]);
  
  $scriptureId = $db->lastInsertId("scripture_id_seq");

  foreach ($topics as $topic)
  {
    $stm = $db -> prepare("SELECT id FROM topics WHERE topic = ?");
    $stm -> execute([$topic]);
    $topicID = $stm -> fetch();

    $statement = $db -> prepare('INSERT INTO linked VALUES (?, ?)');
    $statement -> execute([$scriptureID, $topicID['id']]);
  }
}