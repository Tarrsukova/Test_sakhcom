<?php
	require_once 'database.php';
	require_once 'function.php';
?>
<?php 
		$id=$_GET['id'];
		$news_category = get_news_category($id);
		
			if (isset($_POST['save']))
	{	
		$id=$_GET['id'];
		$title=$_POST['title'];
		$description=$_POST['description'];
		$text=$_POST['text'];
		$image=$_POST['image'];
		$theme = $_POST['theme'];
	$id=$_GET['id'];
	$link = mysqli_connect('localhost','Olga','qwe123!@#', 'Test_sakhcom') 
            or die("Ошибка " . mysqli_error($link)); 
	
	$query ="UPDATE news SET title='$title' , description='$description', text ='$text', image='$image', theme='$theme' where id = '$id' ";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

    if($result){
	echo "<span>Данные обновлены</span>";}
}
?>