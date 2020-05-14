<!DOCTYPE html>

<?php
	session_start();

	if(!isset($_SESSION['USER']) || (isset($_SESSION['ADMIN']) && !$_SESSION['ADMIN'])){
		header("Location: ./library.php?msg=e1");
	}

	// Setup sqlite PDO handler for prepared statements
	$db = 'library.db';
	$dsn = 'sqlite:'.$db;
	$opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
	$pdo = new PDO($dsn, null, null, $opt);

	$errorMsg = "";

	$title = "";
	$authour = "";
	$series = "";
	$publisher = "";
	$genre = "";
	$isbn = "";
	$year = "";
	$edition = "";
	$impression = "";

	if(isset($_GET) && !empty($_GET)){
		$id = htmlspecialchars($_GET['id']);

		if($id != ""){
			$query = "SELECT * FROM BOOKS WHERE ID = :id";
			$prep = $pdo->prepare($query);
			$prep->execute(['id' => $id]);
			$result = $prep->fetch();

			if($result){
				$title = $result[1];
				$authour = $result[2];
				$series = $result[3];
				$publisher = $result[8];
				$genre = $result[9];
				$isbn = $result[7];
				$year = $result[4];
				$edition = $result[5];
				$impression = $result[6];
			}
			else{
				$errorMsg = "Cannot find book with ID = " . $id;
			}
		}
	}

	if(isset($_POST) && !empty($_POST)){
		// Get data
		$title = htmlspecialchars($_POST['title']);
		$authour = htmlspecialchars($_POST['authour']);
		$series = htmlspecialchars($_POST['series']);
		$publisher = htmlspecialchars($_POST['publisher']);
		$genre = htmlspecialchars($_POST['genre']);
		$isbn = htmlspecialchars($_POST['isbn']);
		$year = htmlspecialchars($_POST['year']);
		$edition = htmlspecialchars($_POST['edition']);
		$impression = htmlspecialchars($_POST['impression']);
		$id = htmlspecialchars($_POST['id']);

		if($title != ""){
			$query = "UPDATE BOOKS SET TITLE = :title, AUTHOUR = :authour, SERIES = :series, YEAR = :year, EDITION = :edition, IMPRESSION = :impression, ISBN = :isbn, PUBLISHER = :publisher, GENRE = :genre WHERE ID = :id";
			$prep = $pdo->prepare($query);

			// check if insert successfull
			if($prep->execute(['title' => $title, 'authour' => $authour, 'series' => $series, 'year' => $year, 'edition' => $edition, 'impression' => $impression, 'isbn' => $isbn, 'publisher' => $publisher, 'genre' => $genre, 'id' => $id])){
				header("Location: library.php?msg=b2");
			}
			else{
				$errorMsg = "Unable to edit the book.";
			}
		}
		else{
			$errorMsg = "Book must have a title.";
		}
	}
?>

<html lang="en">
	<head>
		<!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="robots" content="noindex">

		<title>Edit <?php echo $title; ?></title>

		<!-- Style -->
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    	<link rel="stylesheet" href="style.css">

    	<!-- jQuery & JavaScrip -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    	<script async src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php include './libNav.php'; ?>

		<div class="container-fluid">
			<div class="text-center total-center">
				<div class="width-80">
					<?php echo '<h2>Edit '. $title .'</h2>'; ?>
					<br />
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
					<form action="editbook.php" method="post">
						<div class="form-group">
							<?php echo '<input type="text" class="form-control" name="title" placeholder="Title" value="'. $title .'" />'; ?>
						</div>

						<div class="form-group">
							<?php echo '<input type="text" class="form-control" name="authour" placeholder="Authour" value="'. $authour .'" />'; ?>
						</div>
						
						<div class="form-group">
							<?php echo '<input type="text" class="form-control" name="series" placeholder="Series" value="'. $series .'" />'; ?>
						</div>

						<div class="form-group">
							<?php echo '<input type="text" class="form-control" name="publisher" placeholder="Publisher" value="'. $publisher .'" />'; ?>
						</div>

						<div class="form-group">
							<?php echo '<input type="text" class="form-control" name="genre" placeholder="Genre" value="'. $genre .'" />'; ?>
						</div>

						<div class="form-group">
							<?php echo '<input type="text" class="form-control" name="isbn" placeholder="ISBN" value="'. $isbn .'" />'; ?>
						</div>

						<div class="form-group">
							<?php echo '<input type="text" class="form-control" name="year" placeholder="Year" value="'. $year .'" />'; ?>
							<?php echo '<input type="text" class="form-control" name="edition" placeholder="Edition" value="'. $edition .'" />'; ?>
							<?php echo '<input type="text" class="form-control" name="impression" placeholder="Impression" value="'. $impression .'" />'; ?>
						</div>

						<?php echo '<input type="hidden" name="id" value="'. $id .'">'; ?>
						
						<div class="form-group">
							<input type="submit" class="btn btn-success" value="Update!">
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>