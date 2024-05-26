<?php
header('Content-Type: application/json');

// Database connection
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

// Get the parameters
$register_no = isset($_GET['register_no']) ? $_GET['register_no'] : '';
$semester = isset($_GET['semester']) ? $_GET['semester'] : '';

if (empty($register_no) || empty($semester)) {
    die("Register number or semester is missing.");
}

// Fetch the student information
$sql_student = "SELECT * FROM students WHERE register_no = ?";
$stmt_student = $conn->prepare($sql_student);
$stmt_student->bind_param("s", $register_no);
$stmt_student->execute();
$result_student = $stmt_student->get_result();

if ($result_student->num_rows > 0) {
    $student = $result_student->fetch_assoc();

    // Fetch the marks for the student for the given semester
    $sql_marks = "SELECT subjects.subject_code, subjects.subject_name, subjects.credit, student_marks.mark, student_marks.grade, student_marks.points
                  FROM student_marks
                  JOIN subjects ON student_marks.subject_id = subjects.id
                  WHERE student_marks.register_no = ? AND subjects.semester = ?";
    $stmt_marks = $conn->prepare($sql_marks);
    $stmt_marks->bind_param("si", $register_no, $semester);
    $stmt_marks->execute();
    $result_marks = $stmt_marks->get_result();

    if ($result_marks->num_rows > 0) {
        echo "<h2>Marksheet for " . $student['name'] . " - Semester " . $semester . "</h2>";
        echo "<table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Credit</th>
                        <th>Mark</th>
                        <th>Grade</th>
                        <th>Points</th>
                    </tr>
                </thead>
                <tbody>";

        while ($row = $result_marks->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['subject_code'] . "</td>
                    <td>" . $row['subject_name'] . "</td>
                    <td>" . $row['credit'] . "</td>
                    <td>" . $row['mark'] . "</td>
                    <td>" . $row['grade'] . "</td>
                    <td>" . $row['points'] . "</td>
                  </tr>";
        }

        echo "</tbody>
              </table>";
    } else {
        echo "No marks found for the specified semester.";
    }
} else {
    echo "No student found with the specified register number.";
}

$conn->close();
?>
