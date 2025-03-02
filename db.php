<?php
$servername = "127.0.0.1";
$username = "fanaa";
$password = "fanaa@2922";
$dbname = "Code_Snippet_Manager";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
