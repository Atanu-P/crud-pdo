<?php
	function connectDB(){
		
		try {
			$db = new PDO('mysql:host=localhost;dbname=crud','root','');
			
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			echo "DB connected<br>";
			
			return $db;
			
		} catch (PDOException $e){
			
			echo "$e->getMessage()";
		}
	}
	
	$pdo=connectDB();
	
	function initMigration($pdo){
		try{
			$statement = $pdo->prepare(
				"CREATE TABLE if not exists`users` ( 
				`id` INT NOT NULL AUTO_INCREMENT , 
				`fname` VARCHAR(100) NOT NULL , 
				`lname` VARCHAR(100) NOT NULL , 
				`age` INT NOT NULL , 
				PRIMARY KEY (`id`)
				);"
			);
		
			$statement->execute();
		
		}catch(PDOException $e){
			
			echo "$e->getMessage()";
			
		}
	}
?>