<?php 
session_start();
?>
<?php
	require_once 'database.php';
	require_once 'function.php';
?>
<!DOCTYPE HTML >
<html lang="ru"> 
<head>
<meta charset=utf-8>
<title>Тестовое задание сахком</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
	require_once 'header.php' ;
?>
	<div class="content">
		<div class="container">
			<h2 class="title">Добавить новость</h2>
			<form class="form" method="POST"  action="1.php">
				<label for="title">title</label>
				<input type="text" name="title"><br>
				
				<label for="description">description</label>
				<textarea name="description">	</textarea>	<br>
				
				<label for="text">text</label>
				<textarea name="text">	</textarea>	<br>
				
				<!--по умолчанию
				<label for="date">Дата</label><br>
				<input type="date" name="date"><br><br>
				-->
				<label for="image">image</label>
				<input type="text" name="image"><br>
				<br>
				<select name="theme" id="topic">
			
			<?php 
						$category = get_category();
			?>
			<?php
			/* $db = mysql_connect('localhost','Olga','qwe123!@#');
			mysql_select_db('Test_sakhcom', $db);
			$result =  mysql_query ("SELECT * FROM category ORDER BY name_category", $db) 
            or die ("<b>Query failed:</b> " . mysql_error());
			while ($myrow = mysql_fetch_array($result)){ */?>
			<?php foreach($category as $cat): ?>
			<option value="<?=$cat["id_category"]?>"><?=$cat["name_category"]?> </option>
			<?php endforeach; 
			/* while ($category){
 			echo "<option value=' ".$category['id_category']." '>".$category['name_category']."</option>";
			} */		
			/* foreach($category as $cat): ?>
			<select name="topic" id="topic">
			<option value="<?=$cat["id_category"]?>"> 1 </option>
			</select> 
			<?php endforeach; ?>
для вывода
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $op = $_POST['categories']; //тут будет выбраное значение из списка
    mysql_query ("SELECT * FROM categories where id=".$op);
    ну и вывод
}
			*/	?>
				</select><br><br>
				<input type="submit" name="on" class="btn btn-ok" value="ok">
				
			</form>
		</div>
	
	</div>
<?php
	require_once 'footer.php' ;
?>
	</body>
</html>