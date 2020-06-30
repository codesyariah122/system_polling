<?php
require_once 'config.php';

function html($direktori, $layout, $ext='.ext', $title){
	global $dir;

	if(file_exists($dir.'/'.$layout.$ext)){
		$title = ($layout === 'footer') ? '' : $title;
		require_once $dir.'/'.$layout.$ext;
	}else{
		echo "<h1 class='red-text'>Layout not found</h1>";
	}
}

function connect(){
	$server = DB_HOST;
	$user = DB_USER;
	$pass = DB_PASS;
	$db = DB_NAME;

	try{
		$conn = new PDO("mysql:host=$server; dbname=$db", $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::
			ERRMODE_EXCEPTION);
		return $conn;
		// echo "Connection sucessfully";

	}catch(PDOException $e){
		echo "Connection failed :".$e->getMessage();
	}
}

function framework($query){
	$dbh = connect();
	$result = $dbh->prepare($query);
	$result->execute();

	$rows=[];
	while($row = $result->fetch(PDO::FETCH_OBJ)):
		$rows[] = $row;
	endwhile;

	return $rows;
}

function polling($data, $table){
	// var_dump($data); die();
	$framework = $data['framework'];
	$conn = connect();
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//string value
	$sql = "UPDATE `$table` SET value = value+1 WHERE `framework` = '$framework'";

	$stmt = $conn->prepare($sql);
	$stmt->execute();

	return $stmt->rowCount();
}