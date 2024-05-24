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

$semester = $_POST['semester'];
$name = $_POST['name'];
$register_no = $_POST['register_no'];
$session = $_POST['session'];
$programme = $_POST['programme'];
$specialization = $_POST['specialization'];
$marks = $_POST['marks'];

foreach ($marks as $subject => $mark) {
    $grade_point = 0;
    if ($mark >= 90) {
        $grade_point = 10;
    } elseif ($mark >= 80) {
        $grade_point = 9;
    } elseif ($mark >= 70) {
        $grade_point = 8;
    } elseif ($mark >= 60) {
        $grade_point = 7;
    } elseif ($mark >= 50) {
        $grade_point = 6;
    } elseif ($mark >= 40) {
        $grade_point = 5;
    }

    $grade = calculateGrade($grade_point);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO marks (register_no, semester, subject, mark, grade_point, grade) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sisiss", $register_no, $semester, $subject, $mark, $grade_point, $grade);

    if ($stmt->execute()) {
        echo "Mark for $subject saved successfully<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }
}

$stmt->close();
$conn->close();

// Construct the redirect URL with query parameters
$query_params = http_build_query(array(
    'name' => $name,
    'register_no' => $register_no,
    'session' => $session,
    'programme' => $programme,
    'specialization' => $specialization,
    'date_of_birth' => $_POST['date_of_birth'],
    'semester' => $semester
));

header("Location: view_results.php?$query_params");
exit();

function calculateGrade($points) {
    if ($points == 10) {
        return 'O';
    } elseif ($points == 9) {
        return 'A+';
    } elseif ($points == 8) {
        return 'A';
    } elseif ($points == 7) {
        return 'B+';
    } elseif ($points == 6) {
        return 'B';
    } elseif ($points == 5) {
        return 'C';
    } else {
        return 'F';
    }
}
?>
