<?php
	$mysite = dirname($_SERVER['SCRIPT_NAME']);
	$link='<link rel="stylesheet" href="'.$mysite.'/css/list.css">';
?>
<?php ob_start(); ?>
<div class="container">
	<h3>Список всех записей в таблице</h3>
		<ol>
			<?php foreach($rows as $row): ?>
				<li class="well well-sm">
					<a href="<?php echo $mysite;?>/index.php/show?id=<?php echo $row['id'];?>">
						<?php echo $row['title']; ?>
					</a>
				</li>
			<?php endforeach ?>
		</ol>
</div>
<?php $content=ob_get_clean(); ?>

<?php include 'view/layout.php'; ?>
