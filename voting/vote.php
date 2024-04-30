<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $vote_id = $_POST['vote_id'];
    $student_reg = $_POST['student_reg'];
    $candidate_id = $_POST['candidate_id'];
    // Check if the score checkbox is checked
    $score = isset($_POST['score']) ? 1 : 0;

    // Validate form data (you may add more validation as needed)
    if (empty($vote_id) || empty($student_reg) || empty($candidate_id)) {
        echo "Please fill out all required fields.";
    } else {
        // Include database connection configuration
        require_once "./connection/config.php";

        // Prepare SQL statement to insert data into the database
        $sql = "INSERT INTO voting (vote_id, student_reg, candidate_id, score) VALUES ('$vote_id', '$student_reg', '$candidate_id', '$score')";

        // Execute SQL statement
        if ($conn->query($sql) === TRUE) {
            echo "Vote submitted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close database connection
        $conn->close();
    }
}
?>
