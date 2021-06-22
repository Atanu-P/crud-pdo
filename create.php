<?php
	require "db.php";
	
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$fname = $_POST["fname"];
		$lname = $_POST["lname"];
		$age = $_POST["age"];
		
		try{
			$statement = $pdo->prepare(
				"insert into users(fname, lname, age) values(:fname, :lname, :age);"
			);
			
			$statement->execute(['fname'=>$fname, 'lname'=>$lname, 'age'=>$age]);
			
			echo "<h2 style='color:green;'>Inserted {$fname} {$lname} </h2>";
			
		} catch(PDOException $e){
			$e->getMessage();
		}
		
		
	}
?>

<html>
	<head>
		<title>CRUD</title>
	</head>
	<body>
	<br>
	<a href="read.php?show=all">Show All Users</a>
		<form action="#" method="POST">
			<label for="fname">First Name</label><br>
			<input type="text" name="fname" value=""><br>
			<label for="lname">last Name</label><br>
			<input type="text" name="lname" value=""><br>
			<label for="age">Age</label><br>
			<input type="text" name="age" value=""><br>
			<button type="submit">Save</button>
		</form>
	</body>
</html>



























