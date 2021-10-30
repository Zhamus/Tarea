<?php
	/*$db_username = 'roman';
	$db_password = 'soyelnery12';
	$conn = new PDO( 'mysql:host=18.191.125.118;dbname=db_pdo_crud', $db_username, $db_password );
	if(!$conn){
		die("Fatal Error: Connection Failed!");
	}*/
	$conn = mysqli_connect(
		'18.191.125.118',
		'roman',
		'soyelnery12',
		'db_pdo_crud',
	  ) or die(mysqli_erro($mysqli));
?>
