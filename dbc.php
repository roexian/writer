<?php
$db = new PDO('mysql:host=localhost;port=8889;dbname=dingus;charset=utf8', 'writey', 'Iw2wad4m');
$stmt = $db->prepare("INSERT INTO blog1(postTitle,postStory) VALUES(:postTitle,:postStory)");
$stmt->execute(array(':postTitle' => $postTitle, ':postStory' => $postStory));
?>
	
