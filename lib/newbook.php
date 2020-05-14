<!DOCTYPE html>

<?php
	session_start();

	if(!isset($_SESSION['USER'])){
		header("Location: ./library.php?msg=e1");
	}

	// Setup sqlite PDO handler for prepared statements
	$db = 'library.db';
	$dsn = 'sqlite:'.$db;
	$opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
	$pdo = new PDO($dsn, null, null, $opt);

	$errorMsg = "";

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

		if(strlen($title) > 0){
			$query = "INSERT INTO BOOKS (TITLE, AUTHOUR, SERIES, YEAR, EDITION, IMPRESSION, ISBN, PUBLISHER, GENRE, OWNER) VALUES (:title, :authour, :series, :year, :edition, :impression, :isbn, :publisher, :genre, :owner)";
			$prep = $pdo->prepare($query);

			// check if insert successfull
			if($prep->execute(['title' => $title, 'authour' => $authour, 'series' => $series, 'year' => $year, 'edition' => $edition, 'impression' => $impression, 'isbn' => $isbn, 'publisher' => $publisher, 'genre' => $genre, 'owner' => $_SESSION['USER']])){
				// Check if book exists in the wishlist
				$query = "SELECT * FROM WISHLIST WHERE TITLE = :title AND AUTHOUR = :authour AND OWNER = :owner";
				$prep = $pdo->prepare($query);
				if($prep->execute(['title' => $title, 'authour' => $authour, 'owner' => $_SESSION['USER']])){
					// Exists so remove
					$query = "DELETE FROM WISHLIST WHERE TITLE = :title AND AUTHOUR = :authour AND OWNER = :owner";
					$prep = $pdo->prepare($query);
					$prep->execute(['title' => $title, 'authour' => $authour, 'owner' => $_SESSION['USER']]);
				}
				header("Location: library.php?msg=b1");
			}
			else{
				$errorMsg = "Unable to add the book.";
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

		<title>Add Book</title>

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
				<h2>Add a book to the library</h2>
				<br />
				<?php
					echo '<p class="text-danger">' . $addErr . '</p>';
				?>
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
				<form action="newbook.php" method="post">
					<div class="form-group">
						<input type="text" class="form-control" name="title" placeholder="Title" />
					</div>

					<div class="form-group">
						<input type="text" class="form-control" name="authour" placeholder="Authour" />
					</div>
					
					<div class="form-group">
						<input type="text" class="form-control" name="series" placeholder="Series" />
					</div>

					<div class="form-group">
						<input type="text" class="form-control" name="genre" placeholder="Genre" />
					</div>

					<div>
						<a class="" data-toggle="collapse" href="#advCollapse" role="button" aria-expanded="false" aria-controls="collapseExample">Advanced</a>
					</div>
					<br />
					<div class="collapse" id="advCollapse">
						<div class="form-group">
							<input type="text" class="form-control" name="publisher" placeholder="Publisher" />
						</div>

						<div class="form-group">
							<input type="text" class="form-control" name="isbn" placeholder="ISBN" />
						</div>

						<div class="form-group form-inline">
							<input type="text" class="form-control" name="year" placeholder="Year" />
							<input type="text" class="form-control" name="edition" placeholder="Edition" />
							<input type="text" class="form-control" name="impression" placeholder="Impression" />
						</div>
						<br />
					</div>
					
					<div class="form-group">
						<input type="submit" class="btn btn-success" value="Add!">
					</div>
				</form>
			</div>
		</div>
	</body>
</html>