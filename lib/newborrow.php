<!DOCTYPE html>

<?php
	session_start();
	$_SESSION['PREV_LOC'] = './lib/newborrow.php';

	// Setup sqlite PDO handler for prepared statements
	$db = 'library.db';
	$dsn = 'sqlite:'.$db;
	$opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
	$pdo = new PDO($dsn, null, null, $opt);

	$errorMsg = "";
	$id = "";
	$date = "";

	$title = "";
	
	if(isset($_GET) && !empty($_GET)){
		if(isset($_GET['id']))
			$id = htmlspecialchars($_GET['id']);

		if($id != ""){
			$query = "SELECT * FROM BOOKS WHERE ID = :id";
			$prep = $pdo->prepare($query);
			$prep->execute(['id' => $id]);
			$result = $prep->fetch();

			$title = $result[1];
		}
	}

	if(isset($_POST) && !empty($_POST)){
		$bookid = htmlspecialchars($_POST['id']);
		$name = htmlspecialchars($_POST['name']);
		$date = htmlspecialchars($_POST['date']);
		$title = htmlspecialchars($POST['title']);

		$errorMsg = "";

		if($name != ""){
			$query = "INSERT INTO BORROW (BOOKID, NAME, DATE, OWNER) VALUES (:bookid, :name, :date, :owner)";
			$prep = $pdo->prepare($query);

			// check if insert successfull
			if($prep->execute(['bookid' => $bookid, 'name' => $name, 'date' => $date, 'owner' => $_SESSION['view']])){
				header("Location: library.php?msg=b3");
			}
			else{
				$errorMsg = "Unable to add the book.";
			}
		}
		else{
			$errorMsg = "Please enter the borrowers name.";
		}
	}
?>

<html lang="en">
	<head>
		<!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="robots" content="noindex">

		<title>Borrow Book</title>

		<!-- Style -->
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    	<link rel="stylesheet" href="style.css">

    	<!-- jQuery & JavaScrip -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    	<script async src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php include './libNav.php'; ?>

		<div class="container-fluid text-center total-center">
			<div>
				<?php echo '<h2>Borrow '. $title .'</h2>'; ?>
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

			<div class="width-50">
				<form action="newborrow.php" method="post">
					<div class="form-group">
						<p>Enter the borrowers name</p>
						<?php echo '<input type="text" class="form-control" name="name" placeholder="Name"/>'; ?>
					</div>
					
					<?php 
						echo '<input type="hidden" name="id" value="'. $id .'">';
						echo '<input type="hidden" name="title" value="'. $title .'">';
						date_default_timezone_set("Australia/Adelaide");
						echo '<input type="hidden" name="date" value="'. date('d/M/Y, h:i a') .'">';
					?>

					<div class="form-group">
						<input type="submit" class="btn btn-success" value="Borrow!">
					</div>
				</form>
			</div>
		</div>
	</body>
</html>