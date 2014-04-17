<html>
<link rel="stylesheet" type="text/css" href="writer.css" />
<body>
	<div style="word-wrap:normal">
<?php
$db = new PDO('mysql:host=localhost;port=8889;dbname=dingus', 'writey', 'Iw2wad4m');
foreach($db->query('SELECT * FROM blog1') as $row)
 {
    echo $row['postTitle'].'<br />'.$row['postStory'] . '<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['postDateTime']. "<p />";
 }
//$stmt = $db->query('SELECT * FROM table');
//$row_count = $stmt->rowCount();
//echo $row_count.' rows selected';
exit;
?>
	</div>
</body>
</html>