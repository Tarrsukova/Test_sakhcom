<?
if (isset($_GET['on'])) {
  if ($_GET['login']=='' || $_GET['password']=='') {
    echo "Логин или пароль пустые";
    echo "<br><a href='reg.php'>Вернуться к странице ругистрации</a>";
    exit;
  }
  $login= $_GET['login'];
  $password=$_GET['password'];
   /*  $password = md5($password . $login ); */
		$db = mysql_connect('localhost','Olga','qwe123!@#');
		mysql_select_db('Test_sakhcom', $db);
		$result = mysql_query("INSERT INTO `users`(`login`, `password`) VALUES ('$login','$password')",$db);
		
		if (!$result){
		echo "Логин уже занят";
		echo "<br><a href='reg.php'>Вернуться к странице регистрации</a>";
		exit;
  }
  mysql_close($db);
  header("Location: vhod.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="ru" >
  <head>
    <meta charset="utf-8">
    <title>Тестовое задание сахком</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
<?php
	require_once 'header.php' ;
?>
	<div class="content">
		<div class="container">
			<h2 class="title"> Зарегистрируйтесь!</h2>
			<div class="form">
				<form action="" method="get">
				  <label for="login">Введите логин</label>
				  <input type="text" id="login" name="login"><br>
				  <label for="password">Введите пароль</label>
				  <input type="password" id="password" name="password"><br>
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
