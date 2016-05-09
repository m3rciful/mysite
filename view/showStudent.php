<?php ob_start();

    $link='<link rel="stylesheet" href="/mysite/css/show.css">';
 ?>
<div class="container">
    <h2>Cведения о студенте: <?php echo $data['student']->getPerson()->getName().' '.$data['student']->getPerson()->getSurname();?></h2>
    <div class="well well-sm">id: <?php echo $data['student']->getId()." <br>Registry: ".$data['student']->getRegistry()."<br>Группа:".$data['student']->getGroup()->getAbbreviation()."<br>Курс:".$data['student']->getGroup()->getCourse(); ?></div>
    <div class="well well-sm">Начало обучения: <?php echo $data['student']->getGroup()->getBeginMonth().".".$data['student']->getGroup()->getBeginYear();?></div>
    <div class="well well-sm">Окончание: <?php echo $data['student']->getGroup()->getEndMonth() .".". $data['student']->getGroup()->getEndYear();?></div>
    <div class="well well-sm">Банк: <?php echo $data['student']->getPerson()->getBankname() ."<br>№ счета: ". $data['student']->getPerson()->getEban();?></div>
    <div class="well well-sm">Адрес:<br>Улица: <?php echo $data['student']->getAddress()->getStreet() ."<br>Дом: ". $data['student']->getAddress()->getHouse()."<br>Квартира: ".$data['student']->getAddress()->getRoom()."<br>Город: ".$data['student']->getAddress()->getCity()->getName()."<br>Страна: ".$data['student']->getAddress()->getCity()->getCountry()->getName();?></div>
</div>
<?php $content=ob_get_clean(); ?>

<?php include 'view/layout.php'; ?>
