<?php 
session_start();
?>
<?php
	$db = mysql_connect('localhost','Olga','qwe123!@#');
	mysql_select_db('Test_sakhcom', $db);

	$login = $_SESSION['login'];
	$id_news = $_POST['id_news']; 
	$query1 = mysql_query("Select * from news INNER JOIN like_news ON news.id=like_news.id_news where id_news='$id_news'");
	$count = $query1['like_news'];
	while( $res= mysql_fetch_array($query1))
	{
			if($res['id_news']) $count++;
			$query2 = mysql_query("UPDATE news SET like_news='$count' where id = '$id_news' ");
	}
	if($_POST['like'])
	{ 
	$query = mysql_query("Select * from like_news where id_news='$id_news' and  login = '$login' ");
	$r = mysql_fetch_array($query);
	/*  $id_news = $_POST['id_news'];  */ 
	/*  echo $_POST['id_news']; */
	/*  var_dump( $r['id_news']); */
		 if( $r['id_news']==NULL){
			$result = mysql_query("INSERT INTO `like_news` set `id_news` = '$id_news' ,`login` = '$login'" );
			 /* if($result){
				header(" Location: index.php ");
			 }
			 else{
				 header(" Location: http://example.com ");
			 } */
	}}
	if($_POST['dislike'])
	{  
	$id_news = $_POST['id_news']; 
	$query = mysql_query("Select * from like_news where id_news='$id_news' and  login = '$login' ");
	$r = mysql_fetch_array($query);
		 if( !$r['id_news']==NULL OR $query == false){
			$result = mysql_query("DELETE FROM `like_news` where `id_news` = '$id_news' and `login` = '$login' " );
		 }
	}
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
	$id=$_GET['id'];
	$news_category = get_news_category($id);
?>
	<div class="container clearfix">
		<div class="news">		
			<h2 class="title"><?=$news_category['title']?></h2><br>
			<div class="news_col"> 
				<img src="<?=$news_category['image']?>" width="250" height="250">
				<?=$news_category['text']?><br><br>
				<ul>
				<li class="news_li">autor</li>
				<li class="news_li"><?=$news_category['date']?></li>
				<li class="news_li"><?=$news_category['name_category']?></li>
				<li class="news_li">Нравится: <?=$news_category['like_news']?></li>
				<form action="" method="post">
					<div class="like">
						<input type="hidden" value="<?php echo $news_category['id']?>" name="id_news">
						<input type="submit" name="like" value="like" >
						<input type="submit" name="dislike" value="dislike">
						<input type="button" name="1" value="обновить" onclick='window.location.reload()'>
					</div>
				</form>	<br>
			<a  class="btn" href="delete.php?id=<?=$news_category['id']?>">удалить новость</a>
			<a class="btn" href="news_edit.php?id=<?=$news_category['id']?>">редактировать новость</a>
			</div>
		</div>
	</div>
<?php
	require_once 'footer.php' 
?>	
</body>
</html>