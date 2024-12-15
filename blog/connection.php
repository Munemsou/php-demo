<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

// Enable error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// echo "Connected successfully"; // For debugging purposes, remove this in production
?>
