<?php
	require "db.php";
	
	if($_GET["show"]=="all"){
		
		
		try{
			$statement = $pdo->prepare(
				"select * from users;"
			);
			
			$statement->execute();
			$results = $statement->fetchAll(PDO::FETCH_OBJ);
					
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
		<a href="create.php">Creat Users</a>
		<table border="1px" cellpadding="5px">
			<tr>
				<th>Id</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Age</th>
				<th>Edit</th>
				<th>Delete
			</tr>
			<?php foreach($results as $r){ ?>
				
			<tr>
				<td><?= $r->id; ?></td>
				<td><?= $r->fname; ?></td>
				<td><?= $r->lname; ?></td>
				<td><?= $r->age; ?></td>
				<td><a href="update.php?id=<?= $r->id; ?>">Edit</a></td>
				<td><a href="delete.php?id=<?= $r->id; ?>">Delete</a></td>
			</tr>
				
			<?php } ?>
		</table>
	</body>
</html>



























