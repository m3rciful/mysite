<!DOCTYPE html>
<html lang="en">
<head>
	<?php $mysite = dirname($_SERVER['SCRIPT_NAME']); ?>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?php echo $mysite;?>/css/index.css">
	<?php if(isset($link)) echo $link; ?>

	<title>Индексная страница (front controller)</title>

</head>
<body>

	<?php require_once 'topmenu.php'; ?>
	
	<?php echo $content; ?>

</body>
</html>