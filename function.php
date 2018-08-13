<?php 

function get_category(){
	
	global $link;
	
	$sql = "Select * from category";
	
	$result = mysqli_query($link, $sql);
	/*вместо числовых индксов в массиве наши значения id category_name*/
	$category= mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	return $category;
}
	function get_news(){
		
	global $link;

	$sql = "SELECT * FROM news INNER JOIN category ON news.theme=category.id_category  order by date ASC";
	
	$result = mysqli_query($link, $sql);
	
	$news= mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	return $news;
	
	}
		function get_news_sort(){
		
	global $link;
	
	$sql = "SELECT * FROM news INNER JOIN category ON news.theme=category.id_category order by date DESC";
	
	$result = mysqli_query($link, $sql);
	
	$news= mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	return $news;
	
	}
	function get_news_sort_like(){
		
		global $link;
	
	$sql = "SELECT * FROM news INNER JOIN category ON news.theme=category.id_category INNER JOIN like_news ON news.id=like_news.id_news order by like_news ASC";
	
	$result = mysqli_query($link, $sql);
	
	$news= mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	return $news;
	}
	
	function get_news_sort_like_desc(){
		
		global $link;
	
	$sql = "SELECT * FROM news INNER JOIN category ON news.theme=category.id_category INNER JOIN like_news ON news.id=like_news.id_news order by like_news DESC";
	
	$result = mysqli_query($link, $sql);
	
	$news= mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	return $news;
	}
	
	
	function get_news_category($id){
		
	global $link;
	
	$sql = "SELECT * FROM news INNER JOIN category ON news.theme=category.id_category WHERE id = ".$id ;
	
	$result = mysqli_query($link, $sql);
	
	$news_category= mysqli_fetch_assoc($result);
	
	return $news_category;
	}
	
	function get_users($login, $password){
		
	global $link;
	
	$sql ="SELECT * FROM users where login=".$login. "and password= ".$password;
	
	$result = mysqli_query($link, $sql);
	
	$users= mysqli_fetch_all($result,MYSQLI_ASSOC);
	
	return $users;
	
	}
	
	
?>