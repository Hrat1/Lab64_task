<?php
$serverName = "localhost";
$userName = "root";
$password = "root";
$dbName = "lab64_db";

$conn = new mysqli($serverName, $userName, $password, $dbName);

if (!$conn) {
    die("Connection Error: " . mysqli_connect_error());
}
