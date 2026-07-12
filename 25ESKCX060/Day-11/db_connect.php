<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "industrial_training";

$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully to the database!";
?>
