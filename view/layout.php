<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="/mysite/css/index.css">
	<?php if(isset($link)) echo $link; ?>

	<title>Индексная страница (front controller)</title>

</head>
<body>

	<nav class="navbar navbar-default navbar-fixed-top">
  		<div class="container-fluid">
	    	<div class="navbar-header"><a title="Главная страница" class="navbar-brand" href="/mysite/index.php">mysite</a></div>
	    	<ul class="nav navbar-nav navbar-right">
	    		<li><a href='/mysite/index.php/logout'>Выйти</a></li>
	    	</ul>
	  	</div>
	</nav>

	<?php echo $content; ?>

</body>
</html>