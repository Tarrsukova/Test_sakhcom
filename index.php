<?php
session_start();
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
	require_once 'header.php' 
?>	
<?php
if (isset($_POST['on_date'])){
$news = get_news();
}
elseif (isset($_POST['on_date_desc'])){
$news = get_news_sort();
}
elseif (isset($_POST['on_like'])){
$news = get_news_sort_like();
}
elseif (isset($_POST['on_like_desc'])){
$news = get_news_sort_like_desc();
}
else{
	$news = get_news();
};
?>	
<div class="content"> 
	<div class="news">
		<div class="container">
			<h2 class="title"> <a href="index.php">Все новости <a></h2>
			<p>Показать выбранную категорию</p>
			<form class="form" method="POST"  action="" style="width:250px;">
				<select name="theme" id="topic">
				<?php 
					$category = get_category();
				?>
				<?php foreach($category as $cat): ?>
					<option value="<?=$cat["id_category"]?>"><?=$cat["name_category"]?> </option>
				<?php endforeach; ?>
				</select><br><br>
				<input type="submit" name="on" class="btn btn-ok" value="ok" > <br><br>
				<div style="position: absolute; top: 160px; left: 600px;">
					<div style="position: relative; top: 20px; left: 0px;">
						<p>Сортировать по дате</p>
						<input type="submit" name="on_date" class="btn-date" value="▲">
						<input type="submit" name="on_date_desc" class="btn-date" value="▼">
					</div>
					<div style="position: relative; top: -73px; left: 200px ;">
						<p >Сортировать по лайкам</p>
						<input type="submit" name="on_like" class="btn-date" value="▲" >
						<input type="submit" name="on_like_desc" class="btn-date" value="▼">
					</div>
				</div>
			</form>
<?php 
	if (isset($_POST['on']))
	{	
	$theme = $_POST['theme'];

	$db = mysql_connect('localhost','Olga','qwe123!@#');
	mysql_select_db('Test_sakhcom', $db);
	$result =mysql_query("SELECT * FROM news INNER JOIN category ON news.theme=category.id_category INNER JOIN like_news ON news.id=like_news.id_news
	WHERE category.id_category=$theme order by date DESC",$db);
	  while($myrow = mysql_fetch_array($result)) 
	{
		echo '<div class="news_col">
				<img src="'.$myrow['image'].'" alt="изображение" width="200" height="200"  style="float:left; margin-right:50px">
				<a href="news.php?id='.$myrow['id'].'">'.$myrow['title'].'</a><br><br>
				<div>'.mb_substr($myrow ['text'], 0, 200)."<br>".'</div>
				<a href="news.php?id='.$myrow['id'].'"></a>
			<ul>
				<li class="news_li"> <a href="#"> autor</li>
				<li class="news_li"> <a href="#">'.$myrow['date'].'</li>
				<li class="news_li"> <a href="#"> '.$myrow['name_category'].'</li>
				<li class="news_li">'.$myrow['like_news'].'</li>
			</ul>
		</div>';
	}}
else{
	foreach ($news as $news_col){
	echo '<div class="news_col">
			<img src="'.$news_col['image'].'" alt="изображение" width="200" height="200"  style="float:left; margin-right:50px">
			<a href="news.php?id='.$news_col['id'].'">'.$news_col['title'].'</a><br><br>
			<div style="">'.mb_substr($news_col ['text'], 0, 200)."<br>".'</div>
			<a href="news.php?id='.$news_col['id'].'"></a>
		<ul>
			<li class="news_li"> <a href="#"> autor</li>
			<li class="news_li"> <a href="#">'.$news_col['date'].'</li>
			<li class="news_li"> <a href="#"> '.$news_col['name_category'].'</li>
			<li class="news_li"> Нравится: '.$news_col['like_news'].'</li>
		</ul>
	</div>';}
	};
?>		
		</div>
	</div>
</div>
<?php
	require_once 'footer.php' 
?>	
</body>
</html>