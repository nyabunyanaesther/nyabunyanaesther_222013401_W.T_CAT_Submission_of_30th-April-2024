<?php
require_once "./connection/config.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    // Collect form data
    $pcode = $_POST['pcode'];

    // Delete bus record
    $sql = "DELETE FROM position WHERE pcode=$pcode";

    if ($conn->query($sql) === TRUE) {
        echo "Bus record deleted successfully";
          header("Location: viewp.php");
    } else {
        echo "Error deleting position record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Bus Record</title>
</head>
<body>
    <h2>Delete  Record</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="pcode">Select pcode to Delete:</label>
        <select name="pcode">
            <?php
            // Fetch bus records
            $sql = "SELECT * FROM position";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['pcode'] . "'>" . $row['title'] . " - ". "</option>";
                }
            } else {
                echo "<option value=''>No position available</option>";
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