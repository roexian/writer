<html>
	<!-- The intent of this project is to lean html/php/mysql -->
	<title>blogSite Test</title>
	<body style="font-family: Arial; font-size: 11pt">
		<div>Welcome to writer, a blog project created for learning php and mysql. - B </p><span style="font-style: italic; font-size: 10pt">All fields are required.</span></div><p />
		<form action="post.php" method="post">
			<div>
				<label>Title:&nbsp;</label><input style="width: 200px" name="title" value="title"/>
				<p />
				<label>What do you wanna write about:<br /><textarea cols="100" rows="20" name="story"></textarea>
			</div>
			<input type="submit" name="submit" value="Post">
		</form>
	</body>
</html>