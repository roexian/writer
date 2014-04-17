<?php

$title = $_POST["title"];
$story = $_POST["story"];

//echo $title;
//echo $story;

$db = new PDO('mysql:host=localhost;port=8889;dbname=dingus', 'writey', 'Iw2wad4m');
$stmt = $db->prepare("INSERT INTO blog1(postTitle,postStory) VALUES(:title,:story)");
$stmt->execute(array(':title' => $title,':story' => $story));

header('location: viewpage.php');
exit;
//$sql = "INSERT INTO blog1 (postTitle,postStory) VALUES ($title, $story)";
//$q = $db->exec($sql);





//try {
//    $conn = new PDO('mysql:host=localhost;port=8889;dbname=dingus', 'writey', 'Iw2wad4m');
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//} catch(PDOException $e) {
//    echo 'ERROR: ' . $e->getMessage();
//}
?>