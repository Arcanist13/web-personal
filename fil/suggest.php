<!DOCTYPE html>

<?php
	session_start();
	$_SESSION['PREV_LOC'] = './fil/suggest.php';

	// Setup sqlite PDO handler for prepared statements
	$db = 'fuckitlist.db';
	$dsn = 'sqlite:'.$db;
	$opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
	$pdo = new PDO($dsn, null, null, $opt);

	$list = $pdo->query("SELECT * FROM LIST WHERE STATUS = 0")->fetchAll();

	$successMsg = "";
	$errorMsg = "";

	if(isset($_GET) && !empty($_GET)){
		if(isset($_GET['msg'])){
			$add = htmlspecialchars($_GET['msg']);
		}

		if($add != ""){
			if($add == "b1")
				$successMsg = "Successfully suggested a new item!";
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
	function dynamicSearch(){
		var input, table, list, i;

		input = document.getElementById('searchBar');
		table = document.getElementById('fuckitlist');
		list = table.getElementsByTagName('tr');

		for(i = 1; i < list.length; i++){
			id = list[i].getElementsByTagName('td').item(0).innerHTML;
			desc = list[i].getElementsByTagName('td').item(1).innerHTML;
			var re = new RegExp('(.)*'+input.value+'(.)*','i');
			if(desc.match(re) || id.match(re)){
				list[i].style.display = "";
			}
			else{
				list[i].style.display = "none";
			}
		}
	}

	function suggest(id, add){
		var http = new XMLHttpRequest();
		var url = "suggested.php";
		
		var params = "id=" + id + "&add=" + add;
		http.open("POST", url, true);

		http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		http.send(params);

		document.getElementById("list"+id).setAttribute("style", "display:none;");
	}
</script>

<html lang="en">
	<head>
		<!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="robots" content="noindex">

		<title>Fuck it list!</title>

		<!-- Style -->
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    	<link rel="stylesheet" href="style.css">

    	<!-- jQuery & JavaScrip -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    	<script async src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php include './listNav.php'; ?>
		
		<div class="container-fluid total-center width-90">

			<?php
				if(isset($_SESSION['USER']) && $_SESSION['USER']){
					echo '<div class="text-center">';
						echo '<button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href=\'./newsuggest.php\'">Suggest Quest!</button>';
						echo '<br/>';
					echo '</div>';
				}
				
			?>
			
			<div class="width-80">
				<?php
					if($deleteSuc != ""){
						echo '<div class="alert alert-success alert-dismissible fade in">';
							echo '<a href="#" class="close text-center" data-dismiss="alert" aria-label="close">&times;</a>';
							echo $deleteSuc;
						echo '</div>';
					}
					if($deleteFail != ""){
						echo '<div class="alert alert-danger alert-dismissible fade in">';
							echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
							echo $deleteFail;
						echo '</div>';
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
				<table id="fuckitlist" class="table table-bordered table-hover">
					<thead class="tbl-main-th">
						<tr class="active">
							<th class="col-md-1">ID</th>
							<th class="col-md-9">Description</th>
							<?php
								if(isset($_SESSION['ADMIN']) && $_SESSION['ADMIN']){
									echo '<th class="col-md-1"></th>';
								}
							?>
						</tr>
					</thead>
					<tbody class="tbl-main-td">
						<?php
							$count = 1;
							foreach ($list as $row) {
								echo '<tr id="list'.$row['ID'].'">';

									echo '<td>'.$count.'</td>';

									echo '<td>' . nl2br(htmlspecialchars($row['DESC'])) . '</td>';

									if(isset($_SESSION['ADMIN']) && $_SESSION['ADMIN']){
										//Complete item
										echo '<td class="text-center">';
										echo '<button id="listbtn'.$row['ID'].'" type="button" class="btn btn-sm btn-success" onclick="suggest(\'' . $row['ID'] . '\', \'1\')"><span class="glyphicon glyphicon-ok"></span></button>';
										echo '<button id="listbtn'.$row['ID'].'" type="button" class="btn btn-sm btn-danger" onclick="suggest(\'' . $row['ID'] . '\', \'-1\')"><span class="glyphicon glyphicon-remove"></span></button>';
										echo '</td>';
									}
									echo '</td>';
								echo '</tr>';
								$count = $count + 1;
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>