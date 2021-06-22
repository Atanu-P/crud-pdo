<?php
	require "db.php";
	initMigration($pdo);
?>

<html>
	<head>
		<title>CRUD</title>
	</head>
	<body>
		<br>
		<a href="create.php">Creat Users</a>
		<a href="read.php?show=all">Show All Users</a>
	</body>
</html>