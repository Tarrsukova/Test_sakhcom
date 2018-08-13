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
<?php 
		$id=$_GET['id'];
		$news_category = get_news_category($id);
		
		if (isset($_POST['save']))
	{	
		$title=$_POST['title'];
		$description=$_POST['description'];
		$text=$_POST['text'];
		$image=$_POST['image'];
		$theme = $_POST['theme'];
	
	$link = mysqli_connect('localhost','Olga','qwe123!@#', 'Test_sakhcom') 
            or die("Ошибка " . mysqli_error($link)); 
			
	/* $db = mysql_connect('localhost','Olga','qwe123!@#');
	mysql_select_db('Test_sakhcom', $db);
	$result =mysql_query("UPDATE news SET title='$title' , description='$description', text ='$text', image='$image', theme='$theme' where id = '$id' ");
	}
	echo mysql_error(); */
	$query ="UPDATE news SET title='$title' , description='$description', text ='$text', image='$image', theme='$theme' where id = '$id' ";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    
}
?>
	<div class="content">
		<div class="container">
<?php if($result){
			echo  '<a style="color:red" href="news.php?id='.$news_category['id'].'">Просмотреть изменения</a>
		   <a style="color:black" href="index.php">вернуться ко всем новостям</a>
		   ';
		}
?>          
			<h2 class="title">Редактировать новость</h2>
			<form class="form" method="POST"  action="">
				<label for="title">title</label>
				<input type="text" name="title" value="<?=$news_category['title']?>"><br>
				
				<label for="description">description</label>
				<textarea name="description" value="<?=$news_category['description']?>">	</textarea>	<br>
				
				<label for="text">text</label>
				<textarea name="text" value="<?=$news_category['text']?>">	</textarea>	<br>
				<label for="date">Дата</label><br>
				<input type="date" name="date" value=""<?=$news_category['date']?>><br><br>
				
				<label for="image">image</label>
				<input type="text" name="image" value="<?=$news_category['image']?>"><br>
				<br>
				<select name="theme" id="topic" value="<?=$news_category['theme']?>">
			
			<?php 
						$category = get_category();
			?>
			<?php foreach($category as $cat): ?>
			<option value="<?=$cat["id_category"]?>"><?=$cat["name_category"]?> </option>
			<?php endforeach; ?>
				</select><br><br>
				<input type="submit" name="save" class="btn btn-ok" value="сохранить">
				
			</form>
		</div>
	
	</div>
<?php
	require_once 'footer.php' ;
?>
	</body>
</html>