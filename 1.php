<?php 
session_start();
$date=date("Y-m-d H:i:s");
	if (isset($_POST['on']))
{	
	$title=$_POST['title'];
	$description=$_POST['description'];
	$text=$_POST['text'];
	$image=$_POST['image'];
	$theme = $_POST['theme'];
//здесь прописываем код обработки формы
$db = mysql_connect('localhost','Olga','qwe123!@#');
mysql_select_db('Test_sakhcom', $db);
$result =mysql_query("INSERT INTO `news`( `title` ,`date` , `description`, `text` , `image`, `theme` )
 VALUES ('$title','$date', '$description', '$text', '$image' ,'$theme' )",$db);
}
echo mysql_error();
mysql_close($db);
header ('Location:index.php');
exit;	
?>