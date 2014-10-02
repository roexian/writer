<?php

include 'config.inc.php';

$title = $_POST["title"];
$story = $_POST["story"];

//echo $title;
//echo $story;

$db = new PDO("mysql:host=".$dbHost.";port=".$dbPort.";dbname=".$dbName, $dbUser, $dbPass);
$stmt = $db->prepare("INSERT INTO blog1 (postTitle, postStory) VALUES (:title, :story)");
$stmt = bindParam(":title", $title);
$stmt = bindParam(":story", $story);
$stmt->execute();

header("location: viewpage.php");
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