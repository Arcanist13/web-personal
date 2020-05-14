<!DOCTYPE html>

<?php
	session_start();
	$_SESSION['PREV_LOC'] = 'index.php';
?>

<html lang="en">
	<head>
		<!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="robots" content="noindex">

	    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	    
		<title>Gavin's Landing Page</title>

		<!-- Style -->
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    	<link rel="stylesheet" href="style.css">

    	<!-- JavaScrip -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php include 'homenav.php'; ?>

		<div class="container-fluid title-center width-80">
			<div class="row text-center">
				<div class="col-xs-2"></div>
				<div class="col-xs-4">
					<button type="button" class="btn btn-primary main-button" onclick="location.href='lib/mainframe.php'">Library</button>
				</div>
				<div class="col-xs-4">
					<button type="button" class="btn btn-warning main-button" onclick="location.href='fil/list.php'">F.I.L.</button>
				</div>
				<div class="col-xs-2"></div>
			</div>
		</div>
	</body>
</html>