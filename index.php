<?php
$servername = "mysql_container"; // change this if your DB service has a different name in docker-compose
$username = "root";
$password = "rootpassword"; // replace with your MySQL root password
$database = "recipie_finder";     // replace with your actual DB name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}
echo "✅ Connected successfully to the database!";
?>
