<?php ob_start();

    $link='<link rel="stylesheet" href="/mysite/css/show.css">';
 ?>
<div class="container">
    <h2>Cведения об одной группе:</h2>
    <div class="well well-sm"><?php echo $data['group']->getGroupName()." ".$data['group']->getCourse().$data['group']->getAbbreviation(); ?></div>
    <div class="well well-sm">Начало обучения: <?php echo $data['group']->getBeginMonth().".".$data['group']->getBeginYear();?></div>
    <div class="well well-sm">Окончание: <?php echo $data['group']->getEndMonth() .".". $data['group']->getEndYear();?></div>
    <h3>Ученики:</h3><a href="/mysite/index.php/addnewstudent">добавить нового ученика</a><br>
    <a href="/mysite/index.php/addstudent?id=<?php echo $data['group']->getId() ?>">добавить существующего ученика в группу</a>
    <ul class="list-group">
        <?php if(isset($data['students'])){ foreach($data['students'] as $student): ?>
            <li class="list-group-item">
                <a href="/mysite/index.php/showstudent?id=<?php echo $student->getId();?>">
                    <?php echo $student->getPerson()->getName().' '.$student->getPerson()->getSurname(); ?>
                </a>
            </li>
        <?php endforeach; } ?>
    </ul>
</div>
<?php $content=ob_get_clean(); ?>

<?php include 'view/layout.php'; ?>
