<!DOCTYPE html>

<?php
	$filepath = '/home/arcanist/spigot/logs/latest.log';
	$data = [];

	if(file_exists($filepath) && is_file($filepath)){
		$file = fopen($filepath, 'r');

		while (($line = fgets($file)) !== false) {
			array_push($data, $line);
			
		}
		fclose($file);
	}
?>

<!-- <script type="text/javascript">
	var timer = setInterval(refresh, 5000);

	function refresh() {
		location.reload(true);
	}
</script> -->

<html>
	<head>
		<title>Server Logs</title>

		<!-- Bootstrap -->
    	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    	<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="">
			<?php
				$temp = array_reverse($data);
				foreach ($temp as $line) {
					echo "<p>". htmlspecialchars($line) ."</p>";
				}
			?>
		</div>
	</body>
</html>