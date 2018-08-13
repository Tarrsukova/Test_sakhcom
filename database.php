<?php 

	$link = mysqli_connect('localhost','Olga','qwe123!@#','Test_sakhcom');

if(mysqli_connect_errno())
{
	echo 'ошибка в подключении ('.mysqli_connect_errno().'): '. mysqli_connect_error();
	exit();
}