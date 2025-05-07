<?php
// Database connection file
$servername = "localhost";
$username = "u248222996_mec";
$password = "Mec@mirpur123";
$dbname = "u248222996_mec"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
