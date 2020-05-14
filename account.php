<!DOCTYPE html>

<?php
	session_start();

	require_once('lib.php');

	if(!isset($_SESSION['USER'])){
		header("Location: ./index.php");
	}

	if(isset($_GET) && !empty($_GET)){
		//Delete account
		if(isset($_GET['rm']) && $_GET['rm'] == "TRUE"){
			$db = 'users.db';
			$dsn = 'sqlite:'.$db;
			$opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
			$pdo = new PDO($dsn, null, null, $opt);

			$query = "DELETE FROM USERS WHERE USERNAME = :username";
			$prep = $pdo->prepare($query);

			if($prep->execute(['username' => $_SESSION['USER']])){
				session_unset();
				session_destroy();
				header("Location: index.php");
			}
		}
	}

	$errMsg = "";
	$sucMsg = "";

	if(isset($_GET['msg']) && $_GET['msg'] == "s1"){
		$sucMsg = "Successfully changed your password.";
	}

	//Change password
	if(isset($_POST) && !empty($_POST)){
		// Get input
		$old_psk = htmlspecialchars($_POST['old_psk']);
		$new_psk1 = $_POST['new_psk1'];
		$new_psk2 = $_POST['new_psk2'];

		//Check confirm password
		if($new_psk1 == $new_psk2){
			//Check valid password
			if(validPassword($new_psk1)){
				$enc_psk = password_hash($new_psk1, PASSWORD_DEFAULT);
				if($enc_psk){
					// Setup sqlite PDO handler for prepared statements
					$db = 'users.db';
					$dsn = 'sqlite:'.$db;
					$opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
					$pdo = new PDO($dsn, null, null, $opt);

					$query = "UPDATE USERS SET PASSWORD = :password WHERE USERNAME = :username";
					$prep = $pdo->prepare($query);

					if($prep->execute(['username' => $_SESSION['USER'], 'password' => $enc_psk])){
						header("Location: account.php?msg=s1");
					}
				}
				else{
					$errMsg = "Failed to change the password.";
				}
			}	
			else{
				$errMsg = "Invalid password. Passwords must be at least length 5 and have one numeric character.";
			}			
		}
		else{
			$errMsg = "New passwords do not match.";
		}
	}
?>

<script>
	function confirmDelete() {
		if(confirm("Are you sure you want to delete your Account?\n\nThis action is irreversable.")){
			location.href = "?rm=TRUE";
		}
	}
</script>

<html lang="en">
	<head>
		<!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="robots" content="noindex">

	    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	    
		<title>Account Settings</title>

		<!-- Style -->
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    	<link rel="stylesheet" href="style.css">

    	<!-- JavaScrip -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php include 'homenav.php'; ?>

		<div class="container-fluid width-80">
			<div class="nav-offset text-center">
				<h2>Account Settings</h2>
				</br>
				<?php
					if($sucMsg != ""){
						echo '<div class="alert alert-success alert-dismissible fade in">';
							echo '<a href="#" class="close text-center" data-dismiss="alert" aria-label="close">&times;</a>';
							echo $sucMsg;
						echo '</div>';
					}
					if($errMsg != ""){
						echo '<div class="alert alert-danger alert-dismissible fade in">';
							echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
							echo $errMsg;
						echo '</div>';
					}
				?>
			</div>
			<div class="width-40">
				<h4>Change Password</h4>

				<form action="account.php" method="post">
					<div class="form-group">
						<input type="password" class="form-control" name="old_psk" placeholder="Old Password"></br>
						<input type="password" class="form-control" name="new_psk1" placeholder="New Password">
						<input type="password" class="form-control" name="new_psk2" placeholder="Confirm New Password"></br>
						<div class="text-center">
							<input type="submit" class="btn btn-primary" value="Change Password">
						</div>
						
					</div>
				</form>

				</br>

				<div class="text-center">
					<button type="button" class="btn btn-default btn-danger" onclick="confirmDelete()">Delete Account</button></br>
					<font color="blue">*Warning: This action cannot be reversed.</font>
				</div>
			</div>
		</div>
	</body>
</html>