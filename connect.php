<?php

$host = "localhost";
$un = "root";
$password = "";
$db = "php_baza";

$connection = mysqli_connect($host, $un, $password, $db);

if (!$connection){
	die(alert('Failed Connection.'));
}

?>