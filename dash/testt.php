<?php
$port ="3307";
$host = "localhost";
$dbname ="pizza";
$username = "john";
$password = "toto-php";


$dsn = "mysql:host=$host;dbname=$dbname;port=$port";

$dataconn = new PDO($dsn, $username, $password);
