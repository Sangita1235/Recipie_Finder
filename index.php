<?php
$servername = "mysql_container"; 
$username = "root"; 
$password = "rootpassword"; 
$database = "recipe_finder"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

header("Location: login.php");
exit; 
?>

