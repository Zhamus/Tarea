<?php
	$db_username = 'roman';
	$db_password = 'soyelnery12';
	$conn = new PDO( 'mysql:host=18.191.125.118;dbname=db_pdo_crud', $db_username, $db_password );
	if(!$conn){
		die("Fatal Error: Connection Failed!");
	}
?>