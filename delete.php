<?php
	require "db.php";
	
	if($_SERVER['REQUEST_METHOD']=="GET" && isset($_GET["id"])){
		
		$id = $_GET["id"];
		
		try{
			$statement = $pdo->prepare(
				"delete from users where id=:id"
			);
			
			$statement->execute(['id'=>$id]);
			
			echo "<script>location.href='read.php?show=all';</script>";
			
		} catch(PDOException $e){
			$e->getMessage();
		}
	} else {
		echo "<script>location.href='read.php?show=all';</script>";
	}
		
		
	
	
	
?>




























