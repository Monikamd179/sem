<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$register_no = $_POST['register_no'];
$date_of_birth = $_POST['date_of_birth'];
$session = $_POST['session'];
$programme = $_POST['programme'];
$specialization = $_POST['specialization'];
$semester = $_POST['semester'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO students (name, register_no, date_of_birth, session, programme, specialization) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $name, $register_no, $date_of_birth, $session, $programme, $specialization);

if ($stmt->execute()) {
    echo "New student record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Insert core subjects if they exist
if (isset($_POST['core_points']) && isset($_POST['core_marks']) && isset($_POST['core_grades'])) {
    $core_points = $_POST['core_points'];
    $core_marks = $_POST['core_marks'];
    $core_grades = $_POST['core_grades'];

    for ($i = 0; $i < count($core_points); $i++) {
        $subject = $core_subjects[$semester][$i]; // Assuming core_subjects array exists
        $points = $core_points[$i];
        $marks = $core_marks[$i];
        $grade = $core_grades[$i];

        $stmt = $conn->prepare("INSERT INTO core_subjects (register_no, subject, points, marks, grade, semester) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $register_no, $subject, $points, $marks, $grade, $semester);

        if ($stmt->execute()) {
            echo "Core subject record created successfully";
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

        $stmt = $conn->prepare("INSERT INTO additional_subjects (register_no, subject, points, marks, grade, semester) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $register_no, $subject, $pointsValue, $marksValue, $gradeValue, $semester);

        if ($stmt->execute()) {
            echo "Additional subject record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}

// Close the statement and connection
$stmt->close();
$conn->close();

// Redirect to semester.php
header("Location: semester.php");
exit();
?>
