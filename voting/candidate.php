<?php
require_once "./connection/config.php"; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $student_reg = $_POST['student_reg'];
    $pcode = $_POST['pcode'];
    $names =$_POST['names'];

    // SQL to insert data into the candidate table
    $sql = "INSERT INTO candidate (student_reg, pcode,names) VALUES ('$student_reg', '$pcode','$names')";

    if ($conn->query($sql) === TRUE) {
        echo "Candidate registered successfully";
        echo "<script>window.location.href = 'userhome.php';</script>"; 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method";
}
?>
