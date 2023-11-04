<?php
$host = "localhost";
$username = "admin";
$password = "2424";
$database = "Hospital";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
