<?php
$servername = "localhost";
$username = "Esther";
$password = "222013401";
$dbname = "student_voting";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>