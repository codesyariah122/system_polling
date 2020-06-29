<?php
require 'config.php';
$dir = 'contents';

function html($direktori, $layout, $ext='.ext', $title){
	global $dir;

	if(file_exists($dir.'/'.$layout.$ext)){
		$title = ($layout === 'footer') ? '' : $title;
		require_once $dir.'/'.$layout.$ext;
	}else{
		echo "<h1 class='text-red'>Layout tidak tersedia</h1>";
	}

}

function connect(){
	$server = DB_HOST;
	$user = DB_USER;
	$pass = DB_PASS;
	$db = DB_NAME;

	try{
		$conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
		//echo "Connect Successfully";
	}catch(PDOException $e){
		echo "Conection Failed : ".$e->getMessage();
	}
}

function framework($query){
$dbh = connect();
$result = $dbh->prepare($query);
$result->execute();

$rows = [];
while($row = $result->fetch(PDO::FETCH_OBJ)):
	$rows[] = $row;
endwhile;

return $rows;

}


function polling($data,$table){
$framework = $data['framework'];
// echo $framework; die;
$conn = connect();
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE `$table` SET value=value+1 WHERE `id` = $framework";
$stmt = $conn->prepare($sql);

$stmt->execute();

return $stmt->rowCount();

}

