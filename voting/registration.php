<?php
require_once "./connection/config.php";

$student_reg = $_POST['student_reg'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone']; 
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO student(student_reg, fname, lname, phone, email, password) VALUES ('$student_reg', '$fname', '$lname', '$phone', '$email', '$password')";


if ($conn->query($sql) === TRUE) {
   echo "Successfully registered!";
   header("Location: userlogin.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
