<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "2019_projet5_services";


$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);