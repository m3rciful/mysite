<?php $mysite = dirname($_SERVER['SCRIPT_NAME']); ?>

<nav class="navbar navbar-default navbar-fixed-top">
  	<div class="container-fluid">
	    <div class="navbar-header">
	    	<!-- Логотип сайта -->
	    	<a class="navbar-brand" href="<?php echo $mysite; ?>/index.php" title="Главная страница">my<b>site</b></a>
	    </div>
	    <?php
	    	$sid = new Session('START'); 
			$user=new User( $sid->getSession(), 'READ');

			if($user->getId()) {
				echo "<p class='navbar-text'>Привет, <b>".$user->getUser()."</b></p>";
				echo "<a class='btn btn-default navbar-btn' href='".$mysite."/index.php/logout' role='button'>Выйти</a>";
	    	} 
	    	if($user->getAccess() > 3) {
	    		echo "<ul class='nav navbar-nav navbar-right'>";
        		echo "<li><a href='".$mysite."/index.php/showuser'><span class='glyphicon glyphicon-user' aria-hidden='true'></span> Пользователи</a></li>";
        		echo "<li><a href='".$mysite."/index.php/adduser'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Добавить нового</a></li>";
        		echo "</ul>";
	    	}
	    ?>
	</div>
</nav>