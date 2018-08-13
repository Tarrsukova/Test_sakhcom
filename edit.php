<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
// подключаемся к серверу
$link = mysqli_connect('localhost','Olga','qwe123!@#', 'Test_sakhcom') 
            or die("Ошибка " . mysqli_error($link)); 
			
// если запрос POST 
if(isset($_POST['name']) && isset($_POST['company']) && isset($_POST['id'])){
 
    $id = htmlentities(mysqli_real_escape_string($link, $_POST['id']));
    $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
    $company = htmlentities(mysqli_real_escape_string($link, $_POST['company']));
     
    $query ="UPDATE tovars SET name='$name', company='$company' WHERE id='$id'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
 
    if($result)
       	 echo '<h2>Данные обновлены</h2>
       <a href="index.php">вернуться ко всем новостям</a>';
}?>
 <div class="container">
			<h2 class="title">bpvtybnm новость</h2>
			<form class="form" method="POST"  action="">
				<label for="title">title</label>
				<input type="text" name="title"><br>
				
				<label for="description">description</label>
				<textarea name="description">	</textarea>	<br>
				
				<label for="text">text</label>
				<textarea name="text">	</textarea>	<br>
				<label for="date">Дата</label><br>
				<input type="date" name="date"><br><br>
				
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
// если запрос GET
if(isset($_GET['id']))
{   
    $id = htmlentities(mysqli_real_escape_string($link, $_GET['id']));
     
    // создание строки запроса
    $query ="SELECT * FROM tovars WHERE id = '$id'";
    // выполняем запрос
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    //если в запросе более нуля строк
    if($result && mysqli_num_rows($result)>0) 
    {
        $row = mysqli_fetch_row($result); // получаем первую строку
        $name = $row[1];
        $company = $row[2];
         
        echo "<h2>Изменить модель</h2>
            <form method='POST'>
            <input type='hidden' name='id' value='$id' />
            <p>Введите модель:<br> 
            <input type='text' name='name' value='$name' /></p>
            <p>Производитель: <br> 
            <input type='text' name='company' value='$company' /></p>
            <input type='submit' value='Сохранить'>
            </form>";
         
        mysqli_free_result($result);
    }
}
// закрываем подключение
mysqli_close($link);
?>
</body>
</html>