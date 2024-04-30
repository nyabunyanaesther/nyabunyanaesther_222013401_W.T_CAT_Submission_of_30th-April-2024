<?php
require_once "./connection/config.php";

// Fetch data from the candidate table
$sql = "SELECT * FROM position";
$result = $conn->query($sql);

// Check if the form is submitted for update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Retrieve the submitted form data
    $pcode = $conn->real_escape_string($_POST['pcode']);
    $title = $conn->real_escape_string($_POST['title']);

    // Update the candidate record in the database
    $update_sql = "UPDATE position SET title='$title' WHERE pcode='$pcode'";

    if ($conn->query($update_sql) === TRUE) {
        echo "<script>alert('Record updated successfully');</script>";
        echo "<script>window.location.href = 'viewp.php';</script>"; // Redirect to the view page
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Retrieve data based on the ID from the URL parameter if available
if (isset($_GET['pcode'])) {
    $pcode = $conn->real_escape_string($_GET['pcode']);
    $select_sql = "SELECT * FROM position WHERE pcode='$pcode'";
    $result_update = $conn->query($select_sql);

    if ($result_update->num_rows == 1) {
        // Fetch the candidate data to pre-fill the update form
        $row = $result_update->fetch_assoc();
        $title = $row['title'];

    } else {
        echo "Position not found";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Position</title>
</head>
<body>
    <h2>Position Information</h2>
    <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="pcode">Enter pcode:</label>
        <input type="number" id="pcode" name="pcode" required>
        <button type="submit">View</button>
    </form>

    <?php if (isset($_GET['pcode'])) : ?>
        <h1>Update Position Information</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="pcode" value="<?php echo $pcode; ?>">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="<?php echo $title; ?>" required><br><br>
            <button type="submit" name="update">Update</button>
        </form>
    <?php endif; ?>

</body>
</html>

<?php $conn->close(); ?>
