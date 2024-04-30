<?php
require_once "./connection/config.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    // Collect form data
    $candidate_id = $_POST['candidate_id'];

    // Delete bus record
    $sql = "DELETE FROM candidate WHERE candidate_id=$candidate_id";

    if ($conn->query($sql) === TRUE) {
        echo "Bus record deleted successfully";
          header("Location: viewcandidate.php");
    } else {
        echo "Error deleting candidate record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete candidate Record</title>
</head>
<body>
    <h2>Delete candidate Record</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="candidate_id">Select candidate_id to Delete:</label>
        <select name="candidate_id">
            <?php
            // Fetch bus records
            $sql = "SELECT * FROM candidate";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['candidate_id'] . "'>" . $row['student_reg'] . " - " . $row['pcode'] . $row['names'] . "</option>";
                }
            } else {
                echo "<option value=''>No candidate available</option>";
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