<!DOCTYPE html>

<?php
	session_start();
	$_SESSION['PREV_LOC'] = './lib/wishlist.php';

	if(!isset($_SESSION['USER'])){
		header("Location: ./library.php?msg=e1");
	}


	// Setup sqlite PDO handler for prepared statements
	$db = 'library.db';
	$dsn = 'sqlite:'.$db;
	$opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
	$pdo = new PDO($dsn, null, null, $opt);

	$successMsg = "";
	$errorMsg = "";

	if(isset($_GET) && !empty($_GET)){
		$title = "";
		if($_GET['rm'] != ""){
			$title = htmlspecialchars($_GET['rm']);
		}

		$query = "DELETE FROM WISHLIST WHERE TITLE = :title AND OWNER = :owner";
		$prep = $pdo->prepare($query);

		if($prep->execute(['title' => $title, 'owner' => $_SESSION['USER']])){
			$successMsg = "Successfully removed " . $title . ".";
		}
		else{
			$errorMsg = "Unable to remove " . $title . ".";
		}
	}

	if(isset($_POST) && !empty($_POST)){
		// Get data
		$title = htmlspecialchars($_POST['title']);
		$authour = htmlspecialchars($_POST['authour']);

		if(strlen($title) > 0){
			// Get date/time
			date_default_timezone_set('Australia/Adelaide');
			$date = date('d/m/y h:i:s a', time());

			$query = "INSERT INTO WISHLIST (TITLE, AUTHOUR, DATE, OWNER) VALUES (:title, :authour, :date, :owner)";
			$prep = $pdo->prepare($query);

			// check if insert successfull
			if($prep->execute(['title' => $title, 'authour' => $authour, 'date' => $date, 'owner' => $_SESSION['USER']])){
				$successMsg = "Successfully added book!";
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

<script>
	function confirmDelete(title) {
		if(confirm("Delete " + title + "?")){
			location.href = "wishlist.php?rm=" + title;
		}
	}

	function dynamicSearch(){
		var input, table, list, i;

		input = document.getElementById('searchBar');
		table = document.getElementById('bookList');
		list = table.getElementsByTagName('tr');

		for(i = 1; i < list.length; i++){
			title = list[i].getElementsByTagName('td').item(0).innerHTML;
			authour = list[i].getElementsByTagName('td').item(1).innerHTML;
			var re = new RegExp('(.)*'+input.value+'(.)*','i');
			if(title.match(re) || authour.match(re)){
				list[i].style.display = "";
			}
			else{
				list[i].style.display = "none";
			}
		}
	}
</script>

<html lang="en">
	<head>
		<!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="robots" content="noindex">

		<title>Wishlist</title>

		<!-- Style -->
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    	<link rel="stylesheet" href="style.css">

    	<!-- jQuery & JavaScrip -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    	<script async src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php include './libNav.php'; ?>

		<div class="total-center width-90">
			<div class="text-center">
				<h3>Add a book to the wishlist</h3>
			</div>

			<div class="width-80">
				<?php
					if($successMsg != ""){
						echo '<div class="alert alert-success alert-dismissible fade in">';
							echo '<a href="#" class="close text-center" data-dismiss="alert" aria-label="close">&times;</a>';
							echo $successMsg;
						echo '</div>';
					}
					if($errorMsg != ""){
						echo '<div class="alert alert-danger alert-dismissible fade in">';
							echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
							echo $errorMsg;
						echo '</div>';
					}
				?>
			</div>

			<?php
				echo '<form action="wishlist.php" method="post" class="text-center form-group form-inline">';
					echo '<input type="text" class="form-control" name="title" placeholder="Title" />';
					echo '<input type="text" class="form-control" name="authour" placeholder="Authour" />';
					echo '<input type="submit" class="btn btn-primary" value="Add!">';
				echo '</form>';
			?>
			<br />

			<div class="text-center">
				<form onsubmit="event.preventDefault();">
					<?php echo '<input type="text" class="width-80 form-control" name="search" id="searchBar" onkeyup="dynamicSearch()" placeholder="Search" autocomplete="off">'; ?>
				</form>
				<br/>
			</div>
			
			<div>
				<table id="bookList" class="table table-bordered table-hover">
					<tr>
						<th class="col-md-4">Title</th>
						<th class="col-md-3">Authour</th>
						<th class="col-md-1"></th>
					</tr>
					<?php
						foreach ($pdo->query("SELECT * FROM WISHLIST WHERE OWNER = '" . $_SESSION['USER'] . "'") as $row) {
							echo '<tr>';
								echo '<td>' . htmlspecialchars($row['TITLE']) . '</td>';
								echo '<td>' . htmlspecialchars($row['AUTHOUR']) . '</td>';
								if(isset($_SESSION['ADMIN']) && $_SESSION['ADMIN']){
									echo '<td class="text-center"> <button type="button" class="btn btn-danger" onclick="confirmDelete(\''.addslashes($row['TITLE']).'\')"><span class="glyphicon glyphicon-remove"></span></button> </td>';
								}
							echo '</tr>';
						}
					?>
				</table>
			</div>
		</div>
	</body>
</html>