<?php
$servername = "localhost"; // Update with your server name
$username = "root"; // Update with your database username
$password = ""; // Update with your database password
$dbname = "university"; // Update with your database name

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>
