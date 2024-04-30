<?php
require_once "./connection/config.php";

// Fetch data from the candidate table
$sql = "SELECT * FROM candidate";
$result = $conn->query($sql);

// Check if the form is submitted for update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Retrieve the submitted form data
    $candidate_id = $conn->real_escape_string($_POST['candidate_id']);
    $student_reg = $conn->real_escape_string($_POST['student_reg']);
    $pcode = $conn->real_escape_string($_POST['pcode']);
    $names = $conn->real_escape_string($_POST['names']);

    // Update the candidate record in the database
   $update_sql = "UPDATE candidate SET student_reg='$student_reg', pcode='$pcode', names='$names' WHERE candidate_id='$candidate_id'";


    if ($conn->query($update_sql) === TRUE) {
        echo "<script>alert('Record updated successfully');</script>";
        echo "<script>window.location.href = 'viewcandidate.php';</script>"; // Redirect to the view page
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Retrieve data based on the ID from the URL parameter if available
if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $select_sql = "SELECT * FROM candidate WHERE candidate_id='$id'";
    $result_update = $conn->query($select_sql);

    if ($result_update->num_rows == 1) {
        // Fetch the candidate data to pre-fill the update form
        $row = $result_update->fetch_assoc();
        $student_reg = $row['student_reg'];
        $pcode = $row['pcode'];
        $names =$row['names'];
    } else {
        echo "Candidate not found";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Candidate</title>
</head>
<body>
    <h2>Candidate Information</h2>
    <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="candidate_id">Enter Candidate ID:</label>
        <input type="text" id="candidate_id" name="id" required>
        <button type="submit">View</button>
    </form>

    <?php if (isset($id)) : ?>
        <h1>Update Candidate Information</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="candidate_id" value="<?php echo $id; ?>">
            <label for="student_reg">Student Registration:</label>
            <input type="text" id="student_reg" name="student_reg" value="<?php echo $student_reg; ?>" required><br><br>
            <label for="pcode">Position ID:</label>
            <input type="number" id="pcode" name="pcode" value="<?php echo $pcode; ?>" required><br><br>
            <label for="names">NAMES:</label>
            <input type="text" id="names" name="names" value="<?php echo $names; ?>" required><br><br>
            <button type="submit" name="update">Update</button>
        </form>
    <?php endif; ?>

</body>
</html>

<?php $conn->close(); ?>
