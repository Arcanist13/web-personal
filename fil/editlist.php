<!DOCTYPE html>

<?php
	session_start();

	if(!isset($_SESSION['USER']) || (isset($_SESSION['ADMIN']) && !$_SESSION['ADMIN'])){
		header("Location: ./list.php?msg=e1");
	}

	// Setup sqlite PDO handler for prepared statements
	$db = 'fuckitlist.db';
	$dsn = 'sqlite:'.$db;
	$opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
	$pdo = new PDO($dsn, null, null, $opt);

	$errorMsg = "";

	$id = "";
	$description = "";
	$story = "";
	$tags = "";

	if(isset($_GET) && !empty($_GET)){
		$id = htmlspecialchars($_GET['id']);

		if($id != ""){
			$query = "SELECT * FROM LIST WHERE ID = :id";
			$prep = $pdo->prepare($query);
			$prep->execute(['id' => $id]);
			$result = $prep->fetch();

			if($result){
				$description = $result[1];
				$story = $result[3];
				$tags = $result[4];
			}
			else{
				$errorMsg = "Cannot find quest with ID = " . $id;
			}
		}
	}

	if(isset($_POST) && !empty($_POST)){
		// Get data
		$id = htmlspecialchars($_POST['id']);
		$description = $_POST['description'];
		$story = $_POST['story'];
		$tags = $_POST['tags'];

		if($description != ""){
			$query = "UPDATE LIST SET DESC = :description, STORY = :story, TAGS = :tags WHERE ID = :id";
			$prep = $pdo->prepare($query);

			// check if insert successfull
			if($prep->execute(['description' => $description, 'id' => $id, 'story' => $story, 'tags' => $tags])){
				header("Location: ./list.php");
			}
			else{
				$errorMsg = "Unable to edit the quest.";
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

		<title>Edit Quest</title>

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
				<form action="./editlist.php" method="post">
					<div class="form-group">
						<?php echo '<input class="form-control" name="description" placeholder="Description" value="' . $description . '"/>'; ?>
					</div>
					<div class="form-group">
						<?php echo '<textarea class="form-control" rows="20" cols="70" name="story" placeholder="Story">'. $story .'</textarea>'; ?>
					</div>
					<div class="form-group">
						<?php echo '<input class="form-control" name="tags" placeholder="Tags" value="'. $tags .'"/>'; ?>
					</div>

					<?php echo '<input type="hidden" name="id" value="'. $id .'">'; ?>
					
					<div class="form-group">
						<input type="submit" class="btn btn-success" value="Update!">
					</div>
				</form>
			</div>

			<div>
				<p><h3>Helpful HTML</h3></p>
				<p>&lt;b&gt;&lt;/b&gt;</p>
				<p>&lt;i&gt;&lt;/i&gt;</p>
			</div>
		</div>
	</body>
</html>