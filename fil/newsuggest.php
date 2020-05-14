<!DOCTYPE html>

<?php
	session_start();

	if(!isset($_SESSION['USER'])){
		header("Location: ./list.php?msg=e1");
	}

	// Setup sqlite PDO handler for prepared statements
	$db = 'fuckitlist.db';
	$dsn = 'sqlite:'.$db;
	$opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
	$pdo = new PDO($dsn, null, null, $opt);

	$errorMsg = "";

	if(isset($_POST) && !empty($_POST)){
		// Get data
		$description = htmlspecialchars($_POST['description']);
		$creator = htmlspecialchars($_POST['creator']);

		if(strlen($description) > 0){
			// Check existing
			$query = "SELECT * FROM LIST WHERE DESC = :description COLLATE NOCASE";
			$prep = $pdo->prepare($query);
			$prep->execute(['description' => $description]);
			$result = $prep->fetch();

			if($result == false){
				$query = "INSERT INTO LIST (DESC, CREATOR, STATUS) VALUES (:description, :creator, :status)";
				$prep = $pdo->prepare($query);

				// check if insert successfull
				if($prep->execute(['description' => $description, 'creator' => $creator, 'status' => 0])){
					header("Location: suggest.php?msg=b1");
				}
				else{
					$errorMsg = "Unable to add the quest.";
				}
			}
			else{
				$errorMsg = "Quest of this description already exist.";
			}
		}
		else{
			$errorMsg = "Quest must have a description.";
		}
	}
?>

<html lang="en">
	<head>
		<!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="robots" content="noindex">

		<title>Suggest Quest</title>

		<!-- Style -->
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    	<link rel="stylesheet" href="style.css">

    	<!-- jQuery & JavaScrip -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    	<script async src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php include './listNav.php'; ?>
		
		<div class="container-fluid text-center total-center">
			<div>
				<h2>Suggest Quest</h2>
				<br />
			</div>

			<div class="width-80">
				<?php
					if($errorMsg != ""){
						echo '<div class="alert alert-danger alert-dismissible fade in">';
							echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
							echo $errorMsg;
						echo '</div>';
					}
				?>
			</div>

			<div class="width-80">
				<form action="./newsuggest.php" method="post">
					<div class="form-group">
						<input class="form-control" name="description" placeholder="Description"/>
					</div>

					<?php
						echo '<input type="hidden" name="creator" value="'.$_SESSION['USER'].'"/>';
					?>
					
					<div class="form-group">
						<input type="submit" class="btn btn-success" value="Suggest Quest!">
					</div>
				</form>
			</div>
		</div>
	</body>
</html>