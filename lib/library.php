<!DOCTYPE html>

<?php
	session_start();
	$_SESSION['PREV_LOC'] = './lib/library.php';

	// Setup sqlite PDO handler for prepared statements
	$db = 'library.db';
	$dsn = 'sqlite:'.$db;
	$opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
	$pdo = new PDO($dsn, null, null, $opt);

	//Select books from users library
	$books = $pdo->query("SELECT * FROM BOOKS WHERE OWNER GLOB '*".$_SESSION['view']."*'");

	$errorMsg = "";
	$successMsg = "";

	$title = "";
	$add = "";

	if(isset($_GET) && !empty($_GET)){
		if(isset($_GET['rm']))
			$id = htmlspecialchars($_GET['rm']);
		if(isset($_GET['msg']))
			$add = htmlspecialchars($_GET['msg']);

		if($id != ""){
			$query = "DELETE FROM BOOKS WHERE ID = :id";
			$prep = $pdo->prepare($query);

			if($prep->execute(['id' => $id])){
				$successMsg = "Successfully removed book.";

				// Check if the user has no books remaining in their library
				$check = $pdo->query("SELECT * FROM BOOKS WHERE OWNER GLOB '*".$_SESSION['USER']."*'")->fetchAll();
				if(count($check) == 0){
					$_SESSION['LIBRARY'] = 0;

					$db = '../users.db';
					$dsn = 'sqlite:'.$db;
					$opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
					$pdo = new PDO($dsn, null, null, $opt);
					$query = "UPDATE USERS SET LIBRARY = 0 WHERE USERNAME = :name";
					$prep = $pdo->prepare($query);
					$prep->execute(['name' => $_SESSION['USER']]);

					unset($_SESSION['view']);
					header("Location: mainframe.php");
				}
			}
			else{
				$errorMsg = "Unable to remove " . $title . ".";
			}
		}
		if($add != ""){
			if($add == "b1")
				$successMsg = "Successfully added a new book!";
			if($add == "b2")
				$successMsg = "Successfully editied!";
			if($add == "b3")
				$successMsg = "Successfully borrowed!";
			if($add == "e1")
				$errorMsg = "You cannot access this page!";
		}
	}
?>

<script>
	function confirmDelete(title, id) {
		if(confirm("Delete " + title + "?")){
			location.href = "library.php?rm=" + id;
		}
	}

	function dynamicSearch(){
		var input, table, list, i;

		input = document.getElementById('searchBar');
		table = document.getElementById('bookList');
		list = table.getElementsByTagName('tr');

		for(i = 1; i < list.length; i++){
			title = list[i].getElementsByTagName('td').item(1).innerHTML;
			authour = list[i].getElementsByTagName('td').item(2).innerHTML;
			series = list[i].getElementsByTagName('td').item(4).innerHTML;
			genre = list[i].getElementsByTagName('td').item(5).innerHTML;
			var re = new RegExp('(.)*'+input.value+'(.)*','i');
			if(title.match(re) || authour.match(re) || series.match(re) || genre.match(re)){
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

		<title>Library</title>

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
				<?php
					if(isset($_SESSION['view']) && isset($_SESSION['USER']) && $_SESSION['view'] == $_SESSION['USER']){
						echo '<div class="text-center">';
							echo '<button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href=\'./newbook.php\'">Add Book!</button>';
							echo '<br/>';
						echo '</div>';
					}
					
				?>
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
					<?php
						if(isset($_SESSION['view']) && isset($_SESSION['USER']) && $_SESSION['view'] != $_SESSION['USER']){
							if($_SESSION['LIBRARY'] == 1){
								echo '<div class="text-center">';
									echo '<button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href=\'./mainframe.php?view='.$_SESSION['USER'].'\'">Goto your Library</button>';
									echo '<br/>';
								echo '</div>';	
							}
							else{
								echo '<div class="text-center">';
									echo '<button type="button" class="btn btn-success btn-lg btn-block" onclick="location.href=\'./mainframe.php?new='.$_SESSION['USER'].'\'">Create Your Library!</button>';
									echo '<br/>';
								echo '</div>';
							}
						}
					?>
				</div>
				<div class="text-center">
					<form onsubmit="event.preventDefault();">
						<?php echo '<input type="text" class="width-80 form-control" name="search" id="searchBar" onkeyup="dynamicSearch()" placeholder="Search" autocomplete="off">'; ?>
					</form>
					<br/>
				</div>
				<div>
					<table id="bookList" class="table table-bordered table-hover">
						<thead class="tbl-main-th">
							<tr class="active">
								<th class="col-md-1">ID</th>
								<th class="col-md-5">Title</th>
								<th class="col-md-4">Author</th>
								<th class="col-md-2"></th>
							</tr>
						</thead>
						<tbody class="tbl-main-td">
							<?php
								$count = 0;
								foreach ($books as $row) {
									$count += 1;
									echo '<tr>';
										echo '<td>' . $count . '</td>';
										$title = str_replace("/", ", ", $row['TITLE']);
										echo '<td>' . htmlspecialchars($title) . '</td>';
										$authours = str_replace("/", ", ", $row['AUTHOUR']);
										echo '<td>' . htmlspecialchars($authours) . '</td>';
										echo '<td class="text-center">';
										echo '<button type="button" class="btn btn-sm btn-primary" onclick="location.href=\'newborrow.php?id='.$row['ID'].'\'"><span class="glyphicon glyphicon-book"></span></button>';
										if(isset($_SESSION['view']) && isset($_SESSION['USER']) && $_SESSION['view'] == $_SESSION['USER']){
											echo '<button type="button" class="btn btn-sm btn-success" onclick="location.href=\'editbook.php?id=' . $row['ID'] . '\'"><span class="glyphicon glyphicon-edit"></span></button>';
											echo '<button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete(\''.addslashes($row['TITLE']).'\', \''.$row['ID'].'\')"><span class="glyphicon glyphicon-remove"></span></button>';
										}
										echo '</td>';
										echo '<td style="display:none;">' . $row['SERIES'] . '</td>';
										echo '<td style="display:none;">' . $row['GENRE'] . '</td>';
									echo '</tr>';
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>