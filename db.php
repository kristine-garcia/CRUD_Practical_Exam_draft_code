<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "secret_spoon";

$conn = new mysqli(hostname: $host, username: $username, password: $password, database: $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
