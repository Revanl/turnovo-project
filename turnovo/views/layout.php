<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="storage/css/style.css" />
	</head>
	<body class="text-center container">
		<header>
			<a href="index.php"><h1 class="panel panel-success">Iani's shop</h1></a>
		</header>
		<?php 
		//echo $_GET['Id'];
		?>
		<div class="panel panel-info text-center">
			<?php require_once("routes.php"); ?>
		</div>
		<footer>

		</footer>
	</body>
</html>