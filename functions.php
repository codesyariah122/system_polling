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

	return json_encode($rows);
}

function polling($data, $table){
    $framework = @$data['framework'];

    $allowedTables = ['framework']; 
    if (!in_array($table, $allowedTables)) {
        throw new Exception("Invalid table name");
    }

    $dbh = connect();
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Gunakan prepared statement
    $sql = "UPDATE `$table` SET value = value+1 WHERE `framework` = :framework";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':framework', $framework, PDO::PARAM_STR);

    $stmt->execute();

    return $stmt->rowCount();
}

function resetPolling($data){
	$framework = @$data['framework'];

	$dbh = connect();
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//reset value framework
	$sql = "UPDATE `framework` SET value = 0/value, win = win+1 WHERE `framework` = '$framework'";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(':value', $framework);
	$stmt->bindParam(':win', $framework);
	$stmt->execute();
	return $stmt->rowCount();
}

function sessionPolling($data, $framework){
	$_SESSION['data'] = $data;
	$_SESSION['framework'] = $framework;
}

function getTopFrameworks($limit = 2) {
    $dbh = connect();
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT framework, value FROM framework ORDER BY value DESC LIMIT :limit";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT); // Bind limit
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_OBJ);
    return !empty($results) ? json_encode($results) : json_encode(['error' => 'No data found']);
}

