<?php
$servername = "mysql_container"; // DB container name in the same Docker network
$username = "root"; 
$password = "rootpassword"; // MySQL root password
$database = "recipe_finder"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

header("Location: login.php");
exit; 
?>

