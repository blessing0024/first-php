<?php

$host = "localhost";
$dbname = "register_db";
$username = "root";
$password = "";

$mysqli = new mysqli(hostname: $host,
                    database: $dbname,
                    username: $username,
                    password: $password);

if ($mysqli->connect_errno){
    die("Connection Error: " . $mysqli->connect_error);
}
return $mysqli;