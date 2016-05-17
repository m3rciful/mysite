<?php
	$mysite = dirname($_SERVER['SCRIPT_NAME']);
	$link='<link rel="stylesheet" href="'.$mysite.'/css/show.css">';
?>
<?php ob_start(); ?>
<div class="container">
	<h2><?php echo $row['title']; ?></h2>
	<div class="well well-sm">Автор: <?php echo $row['author'];?></div>
	<div class="well well-sm">Дата: <?php echo $row['date'];?></div>
	<div class="well well-sm">Текст статьи: <?php echo $row['content'];?></div>
</div>
<?php $content=ob_get_clean(); ?>

<?php include 'view/layout.php'; ?>
