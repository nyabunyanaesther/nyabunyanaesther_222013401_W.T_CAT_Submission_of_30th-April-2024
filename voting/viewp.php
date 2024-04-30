<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View position Information</title>
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

    <h2>POSITION INFORMATION</h2>

    <table >
        <thead>
            <tr>
                <th>PCODE</th>
                <th>TITLE</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Database connection
           require_once "./connection/config.php";

            // Fetch bus records from the database
            $sql = "SELECT * FROM position";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . (isset($row['pcode']) ? $row['pcode'] : '') . "</td>";
                    echo "<td>" . (isset($row['title']) ? $row['title'] : '') . "</td>";
                    echo "<td>
                            <a href='updatep.php?'>Update</a>
                            <a href='deletep.php'>Delete</a>
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

 
    <button type="button" onclick="location.href='userhome.php';">Go Back</button>

</body>
</html>
