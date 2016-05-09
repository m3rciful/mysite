<?php 
	$link='
		<link rel="stylesheet" href="/mysite/css/index.css">
  		<script defer src="/mysite/js/admin.js"></script>'; 
 ?>
<?php ob_start(); ?>
<div class="container">
	<h3>Редактирование статьи</h3>
	<form role="form" action="/mysite/index.php/update" method="POST" onsubmit="return validate()">
	    <div class="form-group" >
	      <label for="title">Заголовок:</label>
	      <input type="text" class="form-control" id="title" name="_title" placeholder="Заголовок" value="<?php echo $row['title'] ?>">
	      <input type="hidden" id="id" name="_id" value="<?php echo $row['id'] ?>">
	    </div>
	    <div class="form-group">
	      <label for="content">Текст:</label>
	      <textarea class="form-control" id="content" name="_content" placeholder="Текст" rows="10"><?php echo $row['content'] ?></textarea>
	    </div>
	    <div class="form-group">
	      <label for="author">Автор:</label>
	      <input type="text" class="form-control" id="author" name="_author" placeholder="Автор" value="<?php echo $row['author'] ?>">
	    </div>
	    <button type="reset" class="btn btn-default">Очистить</button>
	    <button type="submit" class="btn btn-default">Изменить</button>
	</form>
	
	<h3>Список всех записей в таблице</h3>
	<ol>
		<?php foreach($rows as $row): ?>
			<li>
				<span class="span-delete">
					<a href="/mysite/index.php/delete?id=<?php echo $row['id'];?>">
						<span class="glyphicon glyphicon-trash"></span>
					</a>
				</span>
				<span class="span-edit">
					<a href="/mysite/index.php/edit?id=<?php echo $row['id'];?>">
						<span class="glyphicon glyphicon-pencil"></span>
					</a>
				</span>
				<span class="span-add">
					<a href="/mysite/index.php/show?id=<?php echo $row['id'];?>">
						<?php echo $row['title']; ?>
					</a>
				</span>
				
			</li>
		<?php endforeach ?>
	</ol>
</div>

<?php $content=ob_get_clean(); ?>

<?php include 'view/layout.php'; ?>