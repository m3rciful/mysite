<nav class="navbar navbar-default navbar-fixed-top">
  	<div class="container-fluid">
	    <div class="navbar-header">
	    	<a title="Главная страница" class="navbar-brand" href="/index.php">my<b>site</b></a>
	    </div>
	    <?php
	    	$sid = new Session('START'); 
			$user=new User( $sid->getSession(), 'READ');

			if($user->getId()) 
			{
				echo "<p class='navbar-text' title='Уровень доступа: ".$user->getAccess()."'>Привет, <b>".$user->getUser()."</b></p>";
				echo "<a class='btn btn-default navbar-btn' href='/mysite/index.php/logout' role='button'>Выйти</a>";
	    	} 
	    ?>
	</div>
</nav>