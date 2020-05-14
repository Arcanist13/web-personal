<!DOCTYPE html>

<?php
	require_once('lib.php');

	session_start();

	if(!isset($_SESSION['ADMIN']) || !$_SESSION['ADMIN']){
		header("Location: ./index.php");
	}

	// Setup sqlite PDO handler for prepared statements
	$db = 'users.db';
	$dsn = 'sqlite:'.$db;
	$opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
	$pdo = new PDO($dsn, null, null, $opt);

	$users = $pdo->query("SELECT USERNAME, ADMIN, CREATED, ACTIVITY FROM Users")->fetchAll();

	$msg = "";

	if(isset($_GET) && !empty($_GET)){
		if(isset($_GET['rm'])){
			$username = htmlspecialchars($_GET['rm']);			
		}
		if(isset($_GET['msg'])){
			if($_GET['msg'] == "m1"){
				$msg = "User was successfully removed.";
			}
		}

		if($username != ""){
			$query = "DELETE FROM Users WHERE USERNAME = :username";
			$prep = $pdo->prepare($query);

			if($prep->execute(['username' => $username])){
				header("Location: ./admin.php?msg=m1");
			}
			else{
				$deleteFail = "Unable to remove " . $username . ".";
			}
		}
	}
?>

<script type="text/javascript">
	function dynamicSearch(){
		var input, table, list, i;

		input = document.getElementById('searchBar');
		table = document.getElementById('userList');
		list = table.getElementsByTagName('tr');

		for(i = 1; i < list.length; i++){
			name = list[i].getElementsByTagName('td').item(0).innerHTML;
			var re = new RegExp('(.)*'+input.value+'(.)*','i');
			if(name.match(re)){
				list[i].style.display = "";
			}
			else{
				list[i].style.display = "none";
			}
		}
	}

	function confirmDelete(name) {
		if(confirm("Delete " + name + "?")){
			location.href = "./admin.php?rm=" + name;
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
	    
		<title>Admin</title>

		<!-- Style -->
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    	<link rel="stylesheet" href="style.css">

    	<!-- JavaScrip -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php include 'homenav.php'; ?>

		<div class="container-fluid total-center width-80">
			<!-- Search -->
			<div class="text-center width-40">
				<form onsubmit="event.preventDefault();">
					<?php echo '<input type="text" class="form-control" name="search" id="searchBar" onkeyup="dynamicSearch()" placeholder="Search" autocomplete="off">'; ?>
				</form>
				<br/>
			</div>

			<div class="text-center">
				<?php
					if($msg != ""){
						echo '<div class="alert alert-success alert-dismissible fade in">';
							echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
							echo $msg;
						echo '</div>';
					}
				?>
			</div>

			<div>
				<table id="userList" class="table table-bordered table-hover">
					<thead class="tbl-main-th">
						<tr>
							<th class="col-md-5 active">Name</th>
							<th class="col-md-3 active">Activity</th>
							<th class="col-md-3 active">Created</th>
							<th class="col-md-1 active"></th>
						</tr>
					</thead>
					<tbody class="tbl-main-td">
						<?php
							foreach ($users as $row) {
								echo '<tr>';
									echo '<td>' . htmlspecialchars($row['USERNAME']) . '</td>';
									echo '<td>' . htmlspecialchars($row['ACTIVITY']) . '</td>';
									echo '<td>' . htmlspecialchars($row['CREATED']) . '</td>';

									
									echo '<td class="text-center">';
									if($row['USERNAME'] != $_SESSION['USER']){
		 								//echo '<button type="button" class="btn btn-sm btn-success" onclick="location.href=\'./editnpc.php?id=' . $row['ID'] . '\'"><span class="glyphicon glyphicon-edit"></span></button>';
		 								echo '<button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete(\''.addslashes($row['USERNAME']).'\')"><span class="glyphicon glyphicon-remove"></span></button>';
		 							}
		 							echo '</td>';

 								echo '</tr>';
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>