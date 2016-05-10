<?php
ob_start();?>
<?php
	$link='<link rel="stylesheet" href="/mysite/css/list.css">'
 ?>
<div class="container">
	<h3>Список всех пользователей</h3>
	<hr>
	<table class="table table-hover">
    	<thead>
      		<tr>
        		<th>Логин</th>
        		<th>Пароль</th>
        		<th>E-mail</th>
        		<th>Доступ</th>
      		</tr>
    	</thead>
    <tbody>

	<?php foreach($data['users'] as $user): ?>
		<tr>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['access']; ?></td>
		<tr>
	<?php endforeach ?>

	</tbody>
  </table>

</div>
<?php $content=ob_get_clean(); ?>

<?php include 'view/layout.php'; ?>
