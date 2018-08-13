<?php 
session_start();
$db = mysql_connect('localhost','Olga','qwe123!@#');
mysql_select_db('Test_sakhcom', $db);
$login = $_SESSION['login'];
if($_POST['like'])
{ 
$id_news = $_POST['id_news']; 
$query = mysql_query("Select * from like_news where id_news='$id_news' and  login = '$login' ");
$r = mysql_fetch_array($query);
/*  $id_news = $_POST['id_news'];  */ 
	 if( $r['id_news']==NULL){
		$result = mysql_query("INSERT INTO `like_news` set `id_news` = '$id_news' ,`login` = '$login'" );
		/* echo mysql_error(); */
		 if($result==true){
			header(" Location: ");
			echo mysql_error();
		 }
		 else{
			 header(" Location: ");
			 echo mysql_error();
		 }
	 } 
}
if($_POST['dislike'])
{  
$id_news = $_POST['id_news']; 
$query = mysql_query("Select * from like_news where id_news='$id_news' ");
$r = mysql_fetch_array($query);
/*  echo $_POST['id_news']; */
	/*  var_dump( $r['id_news']); */
	 if( !$r['id_news']==NULL){
		$result = mysql_query("DELETE FROM `like_news` where `id_news` = '$id_news' " );
		/* echo mysql_error(); */
		 if($result==true){
			 header(" Location: index.php ");
			 echo mysql_error();
		 }
		 else{
			  header(" Location: index.php");
			  echo mysql_error();
		 }
	 }
}
?>