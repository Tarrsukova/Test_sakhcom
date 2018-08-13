<?php 
session_start();?>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php 
if (isset($_POST['on']))
{	
$theme = $_POST['theme'];
$db = mysql_connect('localhost','Olga','qwe123!@#');
mysql_select_db('Test_sakhcom', $db);
$result =mysql_query("SELECT * FROM news INNER JOIN category ON news.theme=category.id_category
WHERE category.id_category=$theme",$db);}
while($myrow = mysql_fetch_array($result)) 
{
	echo '<div>'.$myrow ['name_category'].'</div>';
	echo '<div>'."Пользователь:".$myrow['id_category']."<br>".'</div>';
	echo '<div style="color:#191970">'."Сообщение:".$myrow ['text']."<br>"."<br>".'</div>';
	
}
mysql_close($db);
?>
</body>
</html>
