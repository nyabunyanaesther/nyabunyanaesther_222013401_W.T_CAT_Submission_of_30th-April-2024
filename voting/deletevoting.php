<?php
require_once "./connection/config.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    // Collect form data
    $vote_id = $_POST['vote_id'];

    // Delete vote record
    $sql = "DELETE FROM voting WHERE vote_id=$vote_id";

    if ($conn->query($sql) === TRUE) {
        echo "Vote record deleted successfully"; // Added a space after "record" for proper formatting
        header("Location: votingview.php");
        exit; // Stop further execution after redirection
    } else {
        echo "Error deleting vote record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Votes Record</title>
</head>
<body>
    <h2>Delete Votes Record</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="vote_id">Vote ID to Delete:</label> <!-- Changed "vote_id" to "Vote ID" for clarity -->
        <select name="vote_id">
            <?php
            // Fetch vote records
            $sql = "SELECT * FROM voting";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['vote_id'] . "'>" . $row['student_reg'] . " - Candidate ID: " . $row['candidate_id'] . " - Score: " . $row['score'] . "</option>";
                }
            } else {
                echo "<option value=''>No votes</option>";
            }
            ?>
        </select>
        <br><br>
        <input type="submit" name="delete" value="Delete">
    </form>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>
