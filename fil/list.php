<!DOCTYPE html>

<?php
	session_start();
	$_SESSION['PREV_LOC'] = './fil/list.php';

	// Setup sqlite PDO handler for prepared statements
	$db = 'fuckitlist.db';
	$dsn = 'sqlite:'.$db;
	$opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
	$pdo = new PDO($dsn, null, null, $opt);

	$list = $pdo->query("SELECT * FROM LIST WHERE STATUS = 1")->fetchAll();

	$count = 0;
	$total = 0;
	foreach ($list as $row) {
		if($row['COMPLETE'] != ""){
			$count++;
		}
		$total++;
	}

	$successMsg = "";
	$errorMsg = "";

	if(isset($_GET) && !empty($_GET)){
		if(isset($_GET['msg'])){
			$add = htmlspecialchars($_GET['msg']);
		}

		if($add != ""){
			if($add == "b1")
				$successMsg = "Successfully added a new item!";
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

	function complete(id, rem){
		var http = new XMLHttpRequest();
		var url = "complete.php";
		
		var params = "id=" + id + "&rem=" + rem;
		http.open("POST", url, true);

		http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		http.send(params);

		if(rem == ""){
			document.getElementById("list"+id).setAttribute("class", "complete active");
			document.getElementById("listbtn"+id).setAttribute("class", "btn btn-sm btn-success");
		}
		else{
			document.getElementById("list"+id).setAttribute("class", "");
			document.getElementById("listbtn"+id).setAttribute("class", "btn btn-sm btn-grey");
		}
	}

	function setModal(id){
		document.getElementById("listPopTitle").innerHTML = document.getElementById("listDesc"+id).innerHTML;
		document.getElementById("listPopStory").innerHTML = document.getElementById("listStory"+id).innerHTML;
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

			<div class="text-center lrg-font">
				<?php
					echo 'Complete: ' . $count . '/' . $total;
				?>
				<br /><br />
			</div>

			<?php
				if(isset($_SESSION['ADMIN']) && $_SESSION['ADMIN']){
					echo '<div class="text-center">';
						echo '<button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href=\'./newlist.php\'">Add Quest!</button>';
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
									echo '<th class="col-md-1"></th>';
								}
							?>
						</tr>
					</thead>
					<tbody class="tbl-main-td">
						<?php
							$count = 1;
							foreach ($list as $row) {
								echo '<tr id="list'.$row['ID'].'"';
									if($row['COMPLETE'] != ""){
										echo ' class="complete active">';
									}
									else{
										echo '>';
									}
									echo '<td>' . $count . '</td>';

									echo '<td ';
									if ($row['STORY'] != ""){
										echo 'data-toggle="modal" data-target=".bs-example-modal-lg" onclick="setModal(\''.$row['ID'].'\')" id="listDesc'.$row['ID'].'"';
									}
									echo '>' . nl2br(htmlspecialchars($row['DESC'])) . '</td>';

									//Set modal description
									echo '<div id="listStory'.$row['ID'].'" style="display: none;">'.nl2br($row['STORY']).'</div>';

									if(isset($_SESSION['ADMIN']) && $_SESSION['ADMIN']){
										//Complete item
										echo '<td class="text-center">';
										echo '<button id="listbtn'.$row['ID'].'" type="button" class="btn btn-sm';
										if($row['COMPLETE'] == ""){
											echo ' btn-grey" onclick="complete(\'' . $row['ID'] . '\', \'\')"><span class="glyphicon glyphicon-ok"></span></button>';
										}
										else{
											echo ' btn-success" onclick="complete(\'' . $row['ID'] . '\', \'1\')"><span class="glyphicon glyphicon-ok"></span></button>';
										}
										echo '</td>';

										//Edit
										echo '<td class="text-center">';
										echo '<button type="button" class="btn btn-sm btn-success" onclick="location.href=\'editlist.php?id=' . $row['ID'] . '\'"><span class="glyphicon glyphicon-edit"></span></button>';
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

		<!-- Modal Begin -->
		<div id="listModal" class="modal bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<table class="table table-bordered table-hover">
							<tr><thead><th class="active">
								<h2 class="deep-red">
									<span id="listPopTitle"></span>
									<button type="button" class="btn btn-sm btn-danger right-align divider close" data-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove"></span></button>
								</h2>
							</th></thead></tr>
							<tr><td><p id="listPopStory"></p></td></tr>
						</table>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<script>
			$('#listModal').on('hidden.bs.modal', function () {
			    document.getElementById('listPopStory').innerHTML = "";
			})
		</script>

	</body>
</html>