<!DOCTYPE html>

<?php
	session_start();
	$_SESSION['PREV_LOC'] = './lib/borrow.php';

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
		if(isset($_GET['rm']))
			$id = htmlspecialchars($_GET['rm']);

		if($id != ""){
			$query = "DELETE FROM BORROW WHERE ID = :id";
			$prep = $pdo->prepare($query);

			if($prep->execute(['id' => $id])){
				$successMsg = "Successfully removed.";
			}
			else{
				$errorMsg = "Unable to remove.";
			}
		}
	}
?>

<script>
	function confirmDelete(title, id) {
		if(confirm("Delete " + title + "?")){
			location.href = "borrow.php?rm=" + id;
		}
	}
</script>

<html lang="en">
	<head>
		<!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="robots" content="noindex">

		<title>Borrowed Books</title>

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
			<div class="total-center width-90">
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
				<div>
					<table class="table table-bordered table-hover">
						<tr>
							<th class="col-md-4">Title</th>
							<th class="col-md-3">Borrower</th>
							<th class="col-md-2">Date</th>
							<th class="col-md-1"></th>
						</tr>
						<?php
							foreach ($pdo->query("SELECT ID,BOOKID,NAME,DATE FROM BORROW WHERE OWNER = '" . $_SESSION['USER'] . "'") as $row) {
								$query = 'SELECT TITLE FROM BOOKS WHERE ID=:bookid';
								$prep = $pdo->prepare($query);
								$prep->execute(['bookid' => $row['BOOKID']]);
								$result = $prep->fetch();
								echo '<tr>';
									echo '<td>' . htmlspecialchars($result[0]) . '</td>';
									echo '<td>' . htmlspecialchars($row['NAME']) . '</td>';
									echo '<td>' . htmlspecialchars($row['DATE']) . '</td>';
									echo '<td class="text-center"> <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete(\''.addslashes($row['NAME']).'\',\''.$row['ID'].'\')"><span class="glyphicon glyphicon-remove"></span></button> </td>';
								echo '</tr>';
							}
						?>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>