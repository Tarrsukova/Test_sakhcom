<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
 <?php
 $link = mysqli_connect('localhost','Olga','qwe123!@#', 'Test_sakhcom') 
            or die("Ошибка " . mysqli_error($link)); 
    $id = mysqli_real_escape_string($link, $_GET['id']);
	
if (isset($_GET['id'])) { //проверяем, есть ли переменная
    $query ="DELETE FROM news WHERE id = '$id'"; //удаляем строку из таблицы
	
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
 
    mysqli_close($link);
	
	 echo '<h2>Новость удалена</h2>
       <a href="index.php">вернуться ко всем новостям</a>';

}
?>

</body>
</html>