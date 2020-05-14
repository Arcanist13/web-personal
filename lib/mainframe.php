<!DOCTYPE html>

<?php
	session_start();
	$_SESSION['PREV_LOC'] = './lib/mainframe.php';

	// Setup sqlite PDO handler for prepared statements
	$db = '../users.db';
	$dsn = 'sqlite:'.$db;
	$opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
	$pdo = new PDO($dsn, null, null, $opt);

	$users = $pdo->query("SELECT USERNAME FROM USERS WHERE LIBRARY = 1")->fetchAll();
	$relSize = floor(12.0/count($users));

	$library = NULL;
	if(isset($_SESSION['USER'])){
		$libray = $pdo->query("SELECT LIBRARY FROM USERS WHERE USERNAME = '" . $_SESSION['USER'] . "'")->fetchAll();
	}

	if(isset($_GET) && !empty($_GET)){
		if(isset($_GET['view']) && $_GET['view'] != ""){
			$_SESSION['view'] = $_GET['view'];
			header("Location: library.php");
		}

		if(isset($_GET['new']) && $_GET['new'] != ""){
			$_SESSION['LIBRARY'] = 1;

			$query = "UPDATE USERS SET LIBRARY = 1 WHERE USERNAME = :name";
			$prep = $pdo->prepare($query);
			$prep->execute(['name' => $_SESSION['USER']]);

			$_SESSION['view'] = $_SESSION['USER'];
			header("Location: library.php");
		}
	}
?>

<html lang="en">
	<head>
		<!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="robots" content="noindex">

	    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	    
		<title>Library Mainframe</title>

		<!-- Style -->
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    	<link rel="stylesheet" href="style.css">

    	<!-- jQuery & JavaScrip -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    	<script async src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php include './libNav.php'; ?>

		<div class="container-fluid total-center width-80">
			<?php
				if(isset($_SESSION['USER']) && isset($_SESSION['LIBRARY']) && $_SESSION['LIBRARY'] == 0){
					echo '<div class="row text-center">';
					echo '<div class="text-center">';
						echo '<button type="button" class="btn btn-success btn-lg btn-block" onclick="location.href=\'./mainframe.php?new='.$_SESSION['USER'].'\'">Create Your Library!</button>';
						echo '<br/>';
					echo '</div>';
					echo '</div>';
				}
			?>
			<div class="row text-center">
				<?php
					$count = 0;
					foreach($users as $user){
						if($count % 3 == 0){
							echo '<div class="row">';
						}
						echo '<div class="col-xs-4">';
						echo '<button type="button" class="btn ';
						if(isset($_SESSION['USER']) && $_SESSION['USER'] == $user['USERNAME']){
							echo 'btn-success';
						}
						else{
							echo 'btn-primary';
						}
						echo ' main-button" onclick="location.href=\'mainframe.php?view='.$user['USERNAME'].'\'">'.$user['USERNAME'].'</button>';
						echo '</div>';
						if($count % 3 == 2){
							echo '</div>';
						}
						$count += 1;
					}
				?>
			</div>
		</div>
	</body>
</html>