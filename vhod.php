<?php
session_start();
?>
<?php
if (isset($_GET['on']))
{
	$login=$_GET['login'];
	$password=$_GET['password'];
	
	$db = mysql_connect('localhost','Olga','qwe123!@#');
	mysql_select_db('Test_sakhcom', $db);
	
	$result = mysql_query("SELECT * FROM users where login='$login' and password= '$password'",$db);
	echo mysql_error();
		
	if ($result)
	{$_SESSION['login']=$_GET["login"];
	mysql_close($db);
	header ('Location:index.php');
	exit;}
	else echo "пользователь не найден".'<br>'.'<a href="vhod.php"> Перейти к авторизации</a>';
	mysql_close($db);
}
?><!DOCTYPE html>
<html lang="ru" >
  <head>
    <meta charset="utf-8">
    <title>Тест сахком</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
<?php
	require_once 'header.php' ;
?>
	<div class="content">
		<div class="container">
			<h2 class="title"> Войдите, чтобы добавить новость!</h2>
				<div class="form">
				<form action="" method="get">
				  <label for="login">Введите логин</label>
				  <input type="text" id="login" name="login">
				 <br>
				  <label for="password">Введите пароль</label>
				  <input type="password" id="password" name="password"><br><br>
				  <input type="submit" name="on" value="Ок" class="btn btn-ok">
				</form>
			</div>
		</div>
	 </div>
<?php
	require_once 'footer.php' ;
?>
  </body>
</html>
