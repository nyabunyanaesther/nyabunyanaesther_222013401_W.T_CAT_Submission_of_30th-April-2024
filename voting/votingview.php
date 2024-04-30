<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View voting Information</title>
    <link rel="stylesheet" type="text/css" href="style.css">
        <style>
        body {
            text-align: center; 
        }
        table {
            width: 70%; 
            margin: 0 auto; 
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid greenyellow;
            padding: 8px;
            text-align: left;
            background-color: skyblue;
        }

        th {
            background-color: yellowgreen;
        }
    </style>
</head>
<body>

    <h2>voting INFORMATION</h2>

    <table >
        <thead>
            <tr>
                <th>vote_id</th>
                <th>student_reg</th>
                <th>candidate_id</th>
                <th>score</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Database connection
           require_once "./connection/config.php";

            // Fetch bus records from the database
            $sql = "SELECT * FROM voting";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . (isset($row['vote_id']) ? $row['vote_id'] : '') . "</td>";
                    echo "<td>" . (isset($row['student_reg']) ? $row['student_reg'] : '') . "</td>";
                     echo "<td>" . (isset($row['candidate_id']) ? $row['candidate_id'] : '') . "</td>";
                      echo "<td>" . (isset($row['score']) ? $row['score'] : '') . "</td>";
                    echo "<td>
                            <a href='#?'>Update</a>
                            <a href='deletevoting.php'>Delete</a>
                        </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No records found</td></tr>";
            }

            // Close the database connection
            $conn->close();
            ?>
        </tbody>
    </table>

 
    <button type="button" onclick="location.href='adminhome.php';">Go Back</button>

</body>
</html>
