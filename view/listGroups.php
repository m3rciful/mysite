<?php
	$mysite = dirname($_SERVER['SCRIPT_NAME']);
	$link='<link rel="stylesheet" href="'.$mysite.'/css/list.css">';
?>
<?php ob_start(); ?>
<div class="container">
	<h3>Список активных групп на текущий год</h3>
	<a href="<?php echo $mysite;?>/index.php/addgroup">Добавить новую группу</a>
		<ol>
			<?php foreach($data["list"] as $row): ?>
				<li class="well well-sm">
					<a href="<?php echo $mysite;?>/index.php/showgroup?id=<?php echo $row->getId();?>">
						<?php echo $row->getCourse().$row->getAbbreviation()." ".$row->getGroupname(); ?>
					</a>
				</li>
			<?php endforeach ?>
		</ol>
</div>
<?php $content=ob_get_clean(); ?>

<?php include 'view/layout.php'; ?>
