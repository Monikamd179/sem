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

    // Assuming $core_subjects is defined elsewhere, otherwise, you need to define it
    $core_subjects = [
        1 => [
            "CSCA 411 - Data Structures and Algorithms (3 Credits)",
            "CSCA 412 - Object Oriented Programming (3 Credits)",
            "CSCA 413 - Database Management Systems (3 Credits)",
            "CSCA 414 - Data Structures and Algorithms Lab (2 Credits)",
            "CSCA 415 - Object Oriented Programming Lab (2 Credits)",
            "CSCA 416 - Database Management Systems Lab (2 Credits)"
        ],
        2 => [
            "CSCA 421 - Computer Networks (3 Credits)",
            "CSCA 422 - Operating Systems (3 Credits)",
            "CSCA 423 - Communication Skills (2 Credits)",
            "CSCA 424 - Computer Networks Lab (2 Credits)",
            "CSCA 425 - Operating Systems Lab (2 Credits)"
        ],
        3 => [
            "CSCA 511 - Software Engineering (3 Credits)",
            "CSCA 512 - Internet and Web Technologies (3 Credits)",
            "CSCA 513 - Mini Project (2 Credits)",
            "CSCA 514 - Internet and Web Technologies Lab (2 Credits)",
            "CSCA 515 - Academic Out-Reach Programme (1 Credit)"
        ],
        4 => [
            "CSCA 521 - Project Work (4 Credits)",
            "CSCA 522 - Project Seminar (4 Credits)",
            "CSCA 523 - Project Report and Viva-voce (4 Credits)",
            "CSCA 524 - Compulsory Subject Name (3 Credits)" 
        ]
    ];

    foreach ($core_subjects[$semester] as $index => $subject) {
        $points = $core_points[$index];
        $marks = $core_marks[$index];
        $grade = $core_grades[$index];

        $stmt = $connection->prepare("INSERT INTO core_subjects (register_no, subject, points, marks, grade, semester) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $register_no, $subject, $points, $marks, $grade, $semester);

        if ($stmt->execute()) {
            // Success
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}

// Check if additional subjects data is set
if (isset($_POST['subjects']) && isset($_POST['points']) && isset($_POST['marks']) && isset($_POST['grades'])) {
    $subjects = $_POST['subjects'];
    $points = $_POST['points'];
    $marks = $_POST['marks'];
    $grades = $_POST['grades'];

    // Loop through additional subjects data and insert into additional_subjects table
    foreach ($subjects as $subjectKey => $subject) {
        $pointsValue = $points[$subjectKey];
        $marksValue = $marks[$subjectKey];
        $gradeValue = $grades[$subjectKey];

        $stmt = $connection->prepare("INSERT INTO additional_subjects (register_no, subject, points, marks, grade, semester) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $register_no, $subject, $pointsValue, $marksValue, $gradeValue, $semester);

        if ($stmt->execute()) {
            // Success
        } else {
            echo "Error: " . $stmt->error;
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
            <th>Subject</th>
            <th>Points</th>
            <th>Marks</th>
            <th>Grade</th>
        </tr>
        <?php
        $result = $connection->query("SELECT * FROM core_subjects WHERE register_no = '$register_no' AND semester = '$semester'");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['subject'] . "</td>";
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
            <th>Subject</th>
            <th>Points</th>
            <th>Marks</th>
            <th>Grade</th>
        </tr>
        <?php
        $result = $connection->query("SELECT * FROM additional_subjects WHERE register_no = '$register_no' AND semester = '$semester'");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['subject'] . "</td>";
                echo "<td>" . $row['points'] . "</td>";
                echo "<td>" . $row['marks'] . "</td>";
                echo "<td>" . $row['grade'] . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
    <button class="print-button" onclick="generatePDF()">Print PDF</button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script>
        function generatePDF() {
            const doc = new jsPDF();

            // Add content to PDF
            doc.text("Statement of Grades", 10, 10);
            doc.text("Student Details:", 10, 20);
            // Add more content as needed

            // Save PDF
            doc.save("student_grades.pdf");
        }
    </script>
</body>
</html>
<?php
// Close the connection
$connection->close();
?>
