<?php
include 'db_connection.php'; // Include the database connection script

$name = $_POST['name'];
$register_no = $_POST['register_no'];
$date_of_birth = $_POST['date_of_birth'];
$session = $_POST['session'];
$programme = $_POST['programme'];
$specialization = $_POST['specialization'];
$semester = $_POST['semester'];

// Prepare and bind
$stmt = $connection->prepare("INSERT INTO students (name, register_no, date_of_birth, session, programme, specialization) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $name, $register_no, $date_of_birth, $session, $programme, $specialization);

if ($stmt->execute()) {
    echo "New student record created successfully<br>";
} else {
    echo "Error: " . $stmt->error;
}

// Insert core subjects if they exist
if (isset($_POST['core_points']) && isset($_POST['core_marks']) && isset($_POST['core_grades'])) {
    $core_points = $_POST['core_points'];
    $core_marks = $_POST['core_marks'];
    $core_grades = $_POST['core_grades'];

    $core_subjects = [
        1 => [
            ["Data Structures and Algorithms", "CSCA 411", 3],
            ["Object Oriented Programming", "CSCA 412", 3],
            ["Database Management Systems", "CSCA 413", 3],
            ["Data Structures and Algorithms Lab", "CSCA 414", 2],
            ["Object Oriented Programming Lab", "CSCA 415", 2],
            ["Database Management Systems Lab", "CSCA 416", 2]
        ],
        2 => [
            ["Computer Networks", "CSCA 421", 3],
            ["Operating Systems", "CSCA 422", 3],
            ["Communication Skills", "CSCA 423", 2],
            ["Computer Networks Lab", "CSCA 424", 2],
            ["Operating Systems Lab", "CSCA 425", 2]
        ],
        3 => [
            ["Software Engineering", "CSCA 511", 3],
            ["Internet and Web Technologies", "CSCA 512", 3],
            ["Mini Project", "CSCA 513", 2],
            ["Internet and Web Technologies Lab", "CSCA 514", 2],
            ["Academic Out-Reach Programme", "CSCA 515", 1]
        ],
        4 => [
            ["Project Work", "CSCA 521", 4],
            ["Project Seminar", "CSCA 522", 4],
            ["Project Report and Viva-voce", "CSCA 523", 4],
            ["Compulsory Subject Name", "CSCA 524", 3]
        ]
    ];

    foreach ($core_subjects[$semester] as $index => $subject) {
        $subject_name = $subject[0];
        $subject_code = $subject[1];
        $credits = $subject[2];
        $points = $core_points[$index];
        $marks = $core_marks[$index];
        $grade = $core_grades[$index];

        $stmt = $connection->prepare("INSERT INTO core_subjects (register_no, subject_name, subject_code, credits, points, marks, grade, semester) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssisssi", $register_no, $subject_name, $subject_code, $credits, $points, $marks, $grade, $semester);

        if ($stmt->execute()) {
            // Success
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}

// Insert core subjects if they exist
if (isset($_POST['core_points']) && isset($_POST['core_marks']) && isset($_POST['core_grades'])) {
    $core_points = $_POST['core_points'];
    $core_marks = $_POST['core_marks'];
    $core_grades = $_POST['core_grades'];

    foreach ($core_subjects[$semester] as $index => $subject) {
        $subject_name = $subject[0];
        $subject_code = $subject[1];
        $credits = $subject[2];

        // Check if array keys exist before accessing them
        if (isset($core_points[$index]) && isset($core_marks[$index]) && isset($core_grades[$index])) {
            $points = $core_points[$index];
            $marks = $core_marks[$index];
            $grade = $core_grades[$index];

            $stmt = $connection->prepare("INSERT INTO core_subjects (register_no, subject_name, subject_code, credits, points, marks, grade, semester) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssisssi", $register_no, $subject_name, $subject_code, $credits, $points, $marks, $grade, $semester);

            if ($stmt->execute()) {
                // Success
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            // Handle the case where the array keys are undefined
            echo "Error: Core subject data is missing for index $index";
        }
    }
}

// Insert additional subjects if they exist
if (isset($_POST['subjects']) && isset($_POST['points']) && isset($_POST['marks']) && isset($_POST['grades'])) {
    $subjects = $_POST['subjects'];
    $points = $_POST['points'];
    $marks = $_POST['marks'];
    $grades = $_POST['grades'];

    foreach ($subjects as $subjectKey => $subject) {
        // Extract subject name, subject code, and credits from the subject string
        preg_match('/^(\w+)\s+-\s+(.*?)\s+\((\d+)\s+Credits\)$/', $subject, $matches);
        $subject_code = $matches[1];
        $subject_name = $matches[2];
        $credits = (int)$matches[3];

        // Check if array keys exist before accessing them
        if (isset($points[$subjectKey]) && isset($marks[$subjectKey]) && isset($grades[$subjectKey])) {
            $pointsValue = $points[$subjectKey];
            $marksValue = $marks[$subjectKey];
            $gradeValue = $grades[$subjectKey];

            $stmt = $connection->prepare("INSERT INTO additional_subjects (register_no, subject_name, subject_code, credits, points, marks, grade, semester) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssisssi", $register_no, $subject_name, $subject_code, $credits, $pointsValue, $marksValue, $gradeValue, $semester);

            if ($stmt->execute()) {
                // Success
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            // Handle the case where the array keys are undefined
            echo "Error: Additional subject data is missing for index $subjectKey";
        }
    }
}

// Close the statement
$stmt->close();

// Fetch and display the data
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Grades</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            margin-top: 20px;
        }
        .print-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Statement of Grades</h1>
    <h2>Student Details:</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Register No</th>
            <th>Date of Birth</th>
            <th>Session</th>
            <th>Programme</th>
            <th>Specialization</th>
        </tr>
        <?php
        $result = $connection->query("SELECT * FROM students WHERE register_no = '$register_no'");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['register_no'] . "</td>";
                echo "<td>" . $row['date_of_birth'] . "</td>";
                echo "<td>" . $row['session'] . "</td>";
                echo "<td>" . $row['programme'] . "</td>";
                echo "<td>" . $row['specialization'] . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
    <h2>Core Subjects:</h2>
    <table>
        <tr>
            <th>Subject Code</th>
            <th>Subject Name</th>
            <th>Credits</th>
            <th>Points</th>
            <th>Marks</th>
            <th>Grade</th>
        </tr>
        <?php
        $result = $connection->query("SELECT * FROM core_subjects WHERE register_no = '$register_no' AND semester = '$semester'");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['subject_code'] . "</td>";
                echo "<td>" . $row['subject_name'] . "</td>";
                echo "<td>" . $row['credits'] . "</td>";
                echo "<td>" . $row['points'] . "</td>";
                echo "<td>" . $row['marks'] . "</td>";
                echo "<td>" . $row['grade'] . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
    <h2>Additional Subjects:</h2>
    <table>
        <tr>
            <th>Subject Code</th>
            <th>Subject Name</th>
            <th>Credits</th>
            <th>Points</th>
            <th>Marks</th>
            <th>Grade</th>
        </tr>
        <?php
        $result = $connection->query("SELECT * FROM additional_subjects WHERE register_no = '$register_no' AND semester = '$semester'");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['subject_code'] . "</td>";
                echo "<td>" . $row['subject_name'] . "</td>";
                echo "<td>" . $row['credits'] . "</td>";
                echo "<td>" . $row['points'] . "</td>";
                echo "<td>" . $row['marks'] . "</td>";
                echo "<td>" . $row['grade'] . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
    <a href="download_pdf.php?register_no=<?php echo $register_no; ?>" class="print-button">Download PDF</a>
</body>
</html>
<?php
// Close the connection
$connection->close();
?>
