<?php
	// Setup sqlite PDO handler for prepared statements
	$db = 'fuckitlist.db';
	$dsn = 'sqlite:'.$db;
	$opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
	$pdo = new PDO($dsn, null, null, $opt);

	if(isset($_POST) && !empty($_POST)){
		// Get data
		$id = $_POST['id'];
		$add = $_POST['add'];

		if($add == "1"){
			$query = "UPDATE LIST SET STATUS = 1 WHERE ID = :id";
		}
		else{
			$query = "UPDATE LIST SET STATUS = -1 WHERE ID = :id";
		}
		
		$prep = $pdo->prepare($query);

		$prep->execute(['id' => $id]);
	}
?>