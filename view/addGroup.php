<?php
    $link='
        <link rel="stylesheet" href="/mysite/css/index.css">
        <script defer src="/mysite/js/addGroup.js"></script>';
 ?>
<?php ob_start(); ?>
<div class="container">
    <h3>Добавление новой группы</h3>
    <form role="form" action="/mysite/index.php/insertgroup" method="POST" onsubmit="return validate()">
        <div class="form-group" >
          <label for="_abbreviation">Абревиатура:</label>
          <input type="text" class="form-control" id="_abbreviation" name="abbreviation" placeholder="Абревиатура">
        </div>
        <div class="form-group" >
          <label for="_groupname">Название группы:</label>
          <input type="text" class="form-control" id="_groupname" name="groupname" placeholder="Название группы">
        </div>
        <div class="form-group" >
          <label for="_begin_year">Год начала обучения:</label>
          <input type="text" class="form-control" id="_begin_year" name="begin_year" placeholder="Год начала обучения">
        </div>
        <div class="form-group" >
          <label for="_end_year">Год окончания обучения:</label>
          <input type="text" class="form-control" id="_end_year" name="end_year" placeholder="Год начала обучения">
        </div>
        <div class="form-group" >
          <label for="_begin_month">Месяц начала обучения:</label>
          <input type="text" class="form-control" id="_begin_month" name="begin_month" placeholder="Месяц начала обучения" value="9">
        </div>
        <div class="form-group">
          <label for="_end_month">Месяц окончания обучения:</label>
          <input type="text" class="form-control" id="_end_month" name="end_month" placeholder="Месяц окончания обучения" value="6">
        </div>

        <button type="reset" class="btn btn-default">Очистить</button>
        <button type="submit" class="btn btn-default">Добавить</button>
    </form>
</div>

<?php $content=ob_get_clean(); ?>

<?php include 'view/layout.php'; ?>