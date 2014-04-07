<?php

require("../../cse476/db.inc");

echo '<?xml version="1.0" encoding="UTF-8" ?>';

// Connect to the database
$pdo = pdo_connect();

$username = $_GET['username'];
$password = $_GET['password'];

$usernameQ = $pdo->quote($username);
$passwordQ = $pdo->quote($password);

$query = "SELECT username FROM stacker_user WHERE username =" . $usernameQ;

$rows = $pdo->query($query);
echo var_dump($rows);

if(ISSET($row['username'])){
	echo '<stacker create="no" />';
}
else{
	$query = <<<QUERY
	INSERT INTO stacker_user (username, password) VALUES($usernameQ, $passwordQ)
QUERY;
	if($pdo->query($query)){
		echo '<stacker create="yes" />';
	}
}


?>