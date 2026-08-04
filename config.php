<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "health_db"; // Make sure this matches your DB name in phpMyAdmin

$con = mysqli_connect($hostname, $username, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>