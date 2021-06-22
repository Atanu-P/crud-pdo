<?php
	require "db.php";
	
	if($_SERVER['REQUEST_METHOD']=="POST" && isset($_GET["id"])){
		$fname = $_POST["fname"];
		$lname = $_POST["lname"];
		$age = $_POST["age"];
		$id = $_GET["id"];
		
		try{
			$statement = $pdo->prepare(
				"update users set fname=:fname, lname=:lname, age=:age where id=:id"
			);
			
			$statement->execute(['fname'=>$fname, 'lname'=>$lname, 'age'=>$age , 'id'=>$id]);
			
			echo "<br><h2 style='color:green;'>User data updated</h2>";
			
		} catch(PDOException $e){
			$e->getMessage();
		}
		
		
	}
	
	if(isset($_GET["id"])){
		
		$id = $_GET["id"];
		
		
		try{
			$statement = $pdo->prepare(
				"select * from users where id=:id;"
			);
			
			$statement->execute(["id"=>$id]);
			
			$fetch = $statement->fetchAll(PDO::FETCH_OBJ);
			
			
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
		<form action="#" method="POST">
			<label for="fname">First Name</label><br>
			<input type="text" name="fname" value="<?= $fetch[0]->fname; ?>"><br>
			<label for="lname">last Name</label><br>
			<input type="text" name="lname" value="<?= $fetch[0]->lname; ?>"><br>
			<label for="age">Age</label><br>
			<input type="text" name="age" value="<?= $fetch[0]->age; ?>"><br>
			<button type="submit">Update</button>
		</form>
		<a href="read.php?show=all">Go back</a>
	</body>
</html>



























