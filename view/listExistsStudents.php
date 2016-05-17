<?php
	$mysite = dirname($_SERVER['SCRIPT_NAME']);
	$link='<link rel="stylesheet" href="'.$mysite.'/css/list.css">';
?>
<?php ob_start(); ?>
<div class="container">
	<h3>Список всех учеников</h3>
		<ol>
			<?php foreach($data['persons'] as $person): ?>
				<li class="well well-sm">
					<a href="<?php echo $mysite;?>/index.php/insertstudenttogroup?person_id=<?php echo $person->getId();?>&group_id=<?php echo $data['group_id']?>">
						<?php echo $person->getName().' '.$person->getSurname(); ?>
					</a>
				</li>
			<?php endforeach ?>
		</ol>
</div>
<?php $content=ob_get_clean(); ?>

<?php include 'view/layout.php'; ?>
