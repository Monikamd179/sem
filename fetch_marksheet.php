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

// Assuming register_no is passed as a GET parameter
$register_no = isset($_GET['register_no']) ? $_GET['register_no'] : '';

// Fetch core_subjects data for the given register_no
$core_sql = "SELECT * FROM core_subjects WHERE register_no = '$register_no'";
$core_result = $conn->query($core_sql);

// Fetch additional_subjects data for the given register_no
$additional_sql = "SELECT * FROM additional_subjects WHERE register_no = '$register_no'";
$additional_result = $conn->query($additional_sql);

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
    <h1>Marks Statement for Register No: <?php echo htmlspecialchars($register_no); ?></h1>
    <h2>Core Subjects:</h2>
    <table>
        <tr>
            <th>Semester</th>
            <th>Subject Name</th>
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
            echo "<tr><td colspan='7'>No core subject data found</td></tr>";
        }
        ?>
    </table>

    <h2>Additional Subjects:</h2>
    <table>
        <tr>
            <th>Semester</th>
            <th>Subject Name</th>
            <th>Course Code</th>
            <th>Credits</th>
            <th>Marks</th>
            <th>Grade</th>
            <th>Point</th>
        </tr>
        <?php
        if ($additional_result->num_rows > 0) {
            while($row = $additional_result->fetch_assoc()) {
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
            echo "<tr><td colspan='7'>No additional subject data found</td></tr>";
        }
        ?>
    </table>

    <h2>Cumulative Credits and GPA</h2>
    <?php
    // Fetch cumulative credits and GPA data for core subjects
    $cumulative_core_sql = "SELECT SUM(credits) AS total_credits, AVG(points) AS gpa FROM core_subjects WHERE register_no = '$register_no'";
    $cumulative_core_result = $conn->query($cumulative_core_sql);

    // Fetch cumulative credits and GPA data for additional subjects
    $cumulative_additional_sql = "SELECT SUM(credits) AS total_credits, AVG(points) AS gpa FROM additional_subjects WHERE register_no = '$register_no'";
    $cumulative_additional_result = $conn->query($cumulative_additional_sql);

    $total_credits = 0;
    $total_points = 0;
    $total_subjects = 0;

    if ($cumulative_core_result->num_rows > 0) {
        $core_row = $cumulative_core_result->fetch_assoc();
        $total_credits += $core_row['total_credits'];
        $total_points += $core_row['gpa'] * $core_row['total_credits'];
        $total_subjects += $core_row['total_credits'];
    }

    if ($cumulative_additional_result->num_rows > 0) {
        $additional_row = $cumulative_additional_result->fetch_assoc();
        $total_credits += $additional_row['total_credits'];
        $total_points += $additional_row['gpa'] * $additional_row['total_credits'];
        $total_subjects += $additional_row['total_credits'];
    }

    $cumulative_gpa = ($total_subjects > 0) ? ($total_points / $total_subjects) : 0;

    echo "<p>Cumulative Credits Earned: " . $total_credits . "</p>";
    echo "<p>Cumulative Grade Point Average: " . number_format($cumulative_gpa, 2) . "</p>";
    ?>

</body>
</html>
<?php
$conn->close();
?>
