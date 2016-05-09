<?php ob_start(); ?>
<?php
	$link='<link rel="stylesheet" href="/mysite/css/signin.css">';
 ?>
<div class="container">
	
	 <form class="form-signin" action="/mysite/index.php/login" method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Логин</label>
        <input type="text" id="_username" name="username" class="form-control" placeholder="Логин" required autofocus><br>
        <label for="inputPassword" class="sr-only">Пароль</label>
        <input type="password" id="_password" name="password" class="form-control" placeholder="Пароль" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Запомнить?
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
      </form>

</div>
<?php $content=ob_get_clean(); ?>

<?php include 'view/layout.php'; ?>
