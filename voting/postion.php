<?php
require_once "./connection/config.php";

// Retrieve form data
$pcode = $_POST['pcode'];
$title = $_POST['title'];

// Prepare SQL statement to insert data into the database
$sql = "INSERT INTO position (pcode, title) VALUES ('$pcode', '$title')";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
   echo "Successfully registered!";
   header("Location: adminhome.php");
   exit; // Ensure script execution stops after redirect
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>
