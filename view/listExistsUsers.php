<?php
	$mysite = dirname($_SERVER['SCRIPT_NAME']);
	$link='<link rel="stylesheet" href="'.$mysite.'/css/list.css">';
?>
<?php ob_start(); ?>
<div class="container">
	<h3>Список всех пользователей</h3>
	<table class="table table-hover">
    	<thead>
      		<tr>
        		<th>Логин</th>
        		<th>E-mail</th>
        		<th>Доступ</th>
      		</tr>
    	</thead>
    <tbody>

	<?php foreach($data['users'] as $user): ?>
		<tr>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php 
					$access = '';
					switch($user['access']) {
						case 1:
							$access = 'Pupil';
							break; 
						case 2:
							$access = 'Moder';
							break;
						case 3:
							$access = 'Admin';
							break;
						case 4:
							$access = 'Super User';
							break;  
						default:
							$access = 'loser';
							break;
					} 
					echo $user['access']. ' - '.$access;
				?></td>
		<tr>
	<?php endforeach ?>

	</tbody>
  </table>

</div>
<?php $content=ob_get_clean(); ?>

<?php include 'view/layout.php'; ?>
