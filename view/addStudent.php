<?php

    $link='
        <link rel="stylesheet" href="/mysite/css/index.css">
        <script defer src="/mysite/js/addGroup.js"></script>';
 ?>
<?php ob_start(); ?>
<div class="container">
    <h3>Добавление нового ученика</h3>
    <form role="form" action="/mysite/index.php/insertstudent" method="POST" onsubmit="return validate()">
        <div class="form-group" >
          <label for="_group_id">Группа:</label>
          <select class="form-control" id="_group_id" name="group_id">
              <?php  foreach($data['groups'] as $group): ?>
                <option value="<?php echo $group->getId(); ?>"><?php echo $group->getGroupName(); ?></option>
              <?php endforeach ?>
          </select>
        </div>
        <div class="form-group" >
          <label for="_name">Имя:</label>
          <input type="text" class="form-control" id="_name" name="name" placeholder="имя">
        </div>
        <div class="form-group" >
          <label for="_surname">Фамилия:</label>
          <input type="text" class="form-control" id="_surname" name="surname" placeholder="Фамилия">
        </div>
        <div class="form-group" >
          <label for="_code">Личный код:</label>
          <input type="text" class="form-control" id="_code" name="code" placeholder="Личный код">
        </div>
        <div class="form-group" >
          <label for="_registry">Код регистра:</label>
          <input type="text" class="form-control" id="_registry" name="registry" placeholder="Код регистра">
        </div>
        <div class="form-group" >
          <label for="_eban">Банковский счет:</label>
          <input type="text" class="form-control" id="_eban" name="eban" placeholder="Банковский счет">
        </div>
        <div class="form-group" >
          <label for="_bankname">Имя банка:</label>
          <input type="text" class="form-control" id="_bankname" name="bankname" placeholder="Имя банка" value="">
        </div>
        <h3>Адрес:</h3>
        <div class="form-group">
          <label for="_street">Улица:</label>
          <input type="text" class="form-control" id="_street" name="street" placeholder="Улица" value="">
        </div>
        <div class="form-group">
          <label for="_house">Дом:</label>
          <input type="text" class="form-control" id="_house" name="house" placeholder="Дом" value="">
        </div>
        <div class="form-group">
          <label for="_room">Квартира:</label>
          <input type="text" class="form-control" id="_room" name="room" placeholder="Квартира" value="">
        </div>
        <div class="form-group">
          <label for="_city_id">Город:</label>
          <select class="form-control" id="_city_id" name="city_id">
              <?php  foreach($data['cities'] as $city): ?>
                <option value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option>
              <?php endforeach ?>
          </select>
        </div><div class="form-group">
          <label for="_country_id">Страна:</label>
          <select class="form-control" id="_country_id" name="country_id">
              <?php  foreach($data['countries'] as $country): ?>
                <option value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
              <?php endforeach ?>
          </select>
        </div>

        <button type="reset" class="btn btn-default">Очистить</button>
        <button type="submit" class="btn btn-default">Добавить</button>
    </form>
</div>

<?php $content=ob_get_clean(); ?>

<?php include 'view/layout.php'; ?>