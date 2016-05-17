<?php
    $mysite = dirname($_SERVER['SCRIPT_NAME']);
    $link='<link rel="stylesheet" href="'.$mysite.'/css/index.css">';
?>
<?php ob_start(); ?>
<div class="container">
    <h3>Добавление нового пользователя</h3>
    <form role="form" action="<?php echo $mysite;?>/index.php/insertuser" method="POST">
        <div class="form-group" >
          <label for="_name">Логин:</label>
          <input type="text" class="form-control" id="_name" name="name" placeholder="Логин">
        </div>
        <div class="form-group" >
          <label for="_pass">Пароль:</label>
          <input type="password" class="form-control" id="_pass" name="pass" placeholder="Пароль">
        </div>
        <div class="form-group" >
          <label for="_email">Эл. адрес:</label>
          <input type="email" class="form-control" id="_email" name="email" placeholder="E-mail">
        </div>
        <div class="form-group" >
          <label for="_access">Доступ:</label>
          <select class="form-control" id="_access" name="access">
                <option value="0" selected>LEVEL 0 - Loser</option>
                <option value="1">LEVEL 1 - Pupil</option>
                <option value="2">LEVEL 2 - Moder</option>
                <option value="3">LEVEL 3 - Admin</option>
                <option value="4">LEVEL 4 - Super User</option>
          </select>
        </div>
        
        <button type="reset" class="btn btn-default">Очистить</button>
        <button type="submit" class="btn btn-default">Добавить</button>
    </form>
</div>

<?php $content=ob_get_clean(); ?>

<?php include 'view/layout.php'; ?>