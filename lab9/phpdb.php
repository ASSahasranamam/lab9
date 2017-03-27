<?php


$mysqli =  mysqli_connect('server', 'username', 'pass','dbname');
$table="data";
$check=2;

if ($mysqli->connect_errno) {
	

    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
}

function check($result,$sql){
	if (!$result = $mysqli->query($sql)) {
		echo "Sorry, the website is experiencing problems.";
		echo "Error: Our query failed to execute and here is why: \n";
		echo "Query: " . $sql . "\n";
		echo "Errno: " . $mysqli->errno . "\n";
		echo "Error: " . $mysqli->error . "\n";
		exit;
	}
	if ($result->num_rows === 0) {
	
		$check=0;
		exit;
	}

}

function getall(){
	echo "hear";
	$sql = "SELECT * FROM $table";
	check($result, $sql);
	if ($check === 0) {
		echo "Db is empty";
		exit;
		
	}else{
		$arresult = $result->->fetch_array(MYSQLI_NUM);
		echo $arresult;
		exit;
	}

}


function post($request) {
	$sql = "SELECT * FROM $table WHERE email = $request[3]";
	check($result, $sql);
	if ($check === 0) {
	
		$sql = "insert into $table (firstname, lastname, email, age, zip) values ($request[1],$request[2],$request[3],$request[4],$request[5]";
		$mysqli->query($sql);
		exit;
	}else{
		echo "An entry already exists under that email";
	}
}
function get($request) {
	$sql = "SELECT * FROM person WHERE id = $request[0]";

	check($result, $sql);
	if ($check === 0) {
	
		echo "Sorry, that entry does not exist in this database";
		exit;
	}else{
		echo "$result";
		}
	}
	
function put($request, $bucket) {
	$sql = "SELECT * FROM $table WHERE id = $id[0]";
	$result = $mysqli->query($sql)
	if ($result->num_rows > 0) {
		$sql = "UPDATE $table set firstname = $request[1], lastname = $request[2],  age = $request[3], email = $request[4], zipcode = $request[5]";
		exit;
}
}
function deleter($request){
$sql = "SELECT * FROM $table WHERE id = $request[0]";

	$check($result,$sql)	
	if ($check === 0) {
	
		echo "Sorry, that entry does not exist in this database"
		exit;
	}else{
		$sql = "delete FROM person WHERE firstname = $request[0]";
		echo "That entry was deleted";
		exit();
		}
	}
}
$result->free();
$mysqli->close();
?>

