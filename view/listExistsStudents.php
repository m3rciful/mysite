<?php
ob_start();?>
<?php
	$link='<link rel="stylesheet" href="/mysite/css/list.css">'
 ?>
<div class="container">
	<h3>Список всех учеников</h3>
		<ol>
			<?php foreach($data['persons'] as $person): ?>
				<li class="well well-sm">
					<a href="/mysite/index.php/insertstudenttogroup?person_id=<?php echo $person->getId();?>&group_id=<?php echo $data['group_id']?>">
						<?php echo $person->getName().' '.$person->getSurname(); ?>
					</a>
				</li>
			<?php endforeach ?>
		</ol>
</div>
<?php $content=ob_get_clean(); ?>

<?php include 'view/layout.php'; ?>
