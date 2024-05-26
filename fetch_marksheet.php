<?php
$servername = "localhost";
$username = "root"; // Change this if your username is different
$password = ""; // Change this if you have a password set
$dbname = "university";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch additional_subjects data
$additional_sql = "SELECT * FROM additional_subjects";
$additional_result = $conn->query($additional_sql);

// Fetch core_subjects data
$core_sql = "SELECT * FROM core_subjects";
$core_result = $conn->query($core_sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Fetch Marks</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Marks Statement</h1>
    <table>
        <tr>
            <th>Semester</th>
            <th>Subject_name</th>
            <th>Course Code</th>
            <th>Credits</th>
            <th>Marks</th>
            <th>Grade</th>
            <th>Point</th>
        </tr>
        <?php
        if ($core_result->num_rows > 0) {
            while($row = $core_result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['semester']}</td>
                        <td>{$row['subject_name']}</td>
                        <td>{$row['subject_code']}</td>
                        <td>{$row['credits']}</td>
                        <td>{$row['marks']}</td>
                        <td>{$row['grade']}</td>
                        <td>{$row['points']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No data found</td></tr>";
        }
        ?>
    </table>

    <h2>Cumulative Credits and GPA</h2>
    <?php
    // Fetch cumulative credits and GPA data
    $cumulative_sql = "SELECT SUM(credits) AS total_credits, AVG(points) AS gpa FROM core_subjects";
    $cumulative_result = $conn->query($cumulative_sql);

    if ($cumulative_result->num_rows > 0) {
        $cumulative_row = $cumulative_result->fetch_assoc();
        echo "<p>Cumulative Credits Earned: " . $cumulative_row['total_credits'] . "</p>";
        echo "<p>Cumulative Grade Point Average: " . number_format($cumulative_row['gpa'], 2) . "</p>";
    } else {
        echo "<p>No cumulative data found</p>";
    }
    ?>
</body>
</html>
<?php
$conn->close();
?>