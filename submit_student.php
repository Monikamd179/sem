<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$register_no = $_POST['register_no'];
$date_of_birth = $_POST['date_of_birth'] ?? '';
$session = $_POST['session'];
$programme = $_POST['programme'];
$specialization = $_POST['specialization'];
$semester = $_POST['semester'];

$sql = "INSERT INTO students (name, register_no, date_of_birth, session, programme, specialization)
        VALUES ('$name', '$register_no', '$date_of_birth', '$session', '$programme', '$specialization')";

if ($conn->query($sql) === TRUE) {
    echo "Student record created successfully<br>";

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

            $sql = "INSERT INTO core_subjects (register_no, subject, points, marks, grade, semester)
                    VALUES ('$register_no', '$subject', '$points', '$marks', '$grade', '$semester')";

            if ($conn->query($sql) === TRUE) {
                echo "Core subject record for $subject created successfully<br>";
            } else {
                echo "Error inserting core subject record: " . $conn->error . "<br>";
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

            $sql = "INSERT INTO additional_subjects (register_no, subject, points, marks, grade, semester)
                    VALUES ('$register_no', '$subject', '$pointsValue', '$marksValue', '$gradeValue', '$semester')";

            if ($conn->query($sql) === TRUE) {
                echo "Additional subject record for $subject created successfully<br>";
            } else {
                echo "Error inserting additional subject record: " . $conn->error . "<br>";
            }
        }
    }

    // Construct the redirect URL with query parameters
    $query_params = http_build_query(array(
        'name' => $name,
        'register_no' => $register_no,
        'session' => $session,
        'programme' => $programme,
        'specialization' => $specialization,
        'date_of_birth' => $date_of_birth,
        'semester' => $semester
    ));

    // Close database connection
    $conn->close();

    // Redirect to semester.php
    header("Location: semester.php?$query_params");
    exit();
} else {
    echo "Error inserting student record: " . $conn->error . "<br>";
}

// Close database connection if not already closed
if ($conn->ping()) {
    $conn->close();
}
?>
