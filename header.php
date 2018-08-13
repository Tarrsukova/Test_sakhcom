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
		<div class="header">
			<div class="container">
				<div class="logo">
					<img src="img/logo.png" alt="картиночка">
					</div>
					<div class="nav">
					<ul>
						<?php 
						$category = get_category();
						?>
						<?php if(count($category) === 0):?> 
						<li><a href="#">Добавить категорию</a></li>
						<?php else: ?>
						
						<?php foreach($category as $cat): ?>
						<li><a href="/category.php?id=<?=$cat["id_category"]?>"><?=$cat["name_category"]?></a></li>
						<?php endforeach; ?>
					
						<?php endif; ?>
						<? if ($_SESSION['login']) {
						echo '<li> Вы вошли как, '.$_SESSION['login'].'</li>
							<li><a href="exit.php">Выход</a></li>';	
						}
						else
						echo '<li><a href="vhod.php">Вход</a>
						<li> <a href="reg.php">Регистрация</a>';
						?>
						<li><a class="btn btn-news" href="news_add.php">Добавить новость</a></li>
					</ul>
				</div>
			</div>
		</div>
	</body>
</html>
