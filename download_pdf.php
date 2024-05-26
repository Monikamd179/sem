<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;

// Include the database connection script
include 'db_connection.php';

// Fetch student details and other necessary data from the database
$register_no = $_POST['register_no'] ?? '';

if (!$register_no) {
    die("Register number is required");
}

// Fetch student details
$studentQuery = "SELECT * FROM students WHERE register_no = ?";
$stmt = $connection->prepare($studentQuery);
$stmt->bind_param('s', $register_no);
$stmt->execute();
$studentResult = $stmt->get_result();
$student = $studentResult->fetch_assoc();

if (!$student) {
    die("No records found");
}

// Fetch core subjects
$coreSubjectsQuery = "SELECT * FROM core_subjects WHERE register_no = ?";
$stmt = $connection->prepare($coreSubjectsQuery);
$stmt->bind_param('s', $register_no);
$stmt->execute();
$coreSubjectsResult = $stmt->get_result();

// Fetch additional subjects
$additionalSubjectsQuery = "SELECT * FROM additional_subjects WHERE register_no = ?";
$stmt = $connection->prepare($additionalSubjectsQuery);
$stmt->bind_param('s', $register_no);
$stmt->execute();
$additionalSubjectsResult = $stmt->get_result();

$stmt->close();
$connection->close();

// Construct HTML content
$html = '
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
    </style>
</head>
<body>
    <h1>Statement of Grades</h1>
    <h2>Student Details:</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Register No</th>
            <th>Session</th>
            <th>Programme & Specialization</th>
        </tr>
        <tr>
            <td>' . htmlspecialchars($student['name']) . '</td>
            <td>' . htmlspecialchars($student['register_no']) . '</td>
            <td>' . htmlspecialchars($student['session']) . '</td>
            <td>' . htmlspecialchars($student['programme']) . ' - ' . htmlspecialchars($student['specialization']) . '</td>
        </tr>
    </table>
    <h2>Core Subjects:</h2>
    <table>
        <tr>
            <th>Semester</th>
            <th>Subject</th>
            <th>Type of Subject</th>
            <th>Subject Code</th>
            <th>Credit</th>
            <th>Marks</th>
            <th>Grade</th>
            <th>Point</th>
        </tr>';

while ($row = $coreSubjectsResult->fetch_assoc()) {
    $html .= '
    <tr>
        <td>' . htmlspecialchars($row['semester']) . '</td>
        <td>' . htmlspecialchars($row['subject']) . '</td>
        <td>' . htmlspecialchars($row['type_of_subject']) . '</td>
        <td>' . htmlspecialchars($row['subject_code']) . '</td>
        <td>' . htmlspecialchars($row['credit']) . '</td>
        <td>' . htmlspecialchars($row['marks']) . '</td>
        <td>' . htmlspecialchars($row['grade']) . '</td>
        <td>' . htmlspecialchars($row['point']) . '</td>
    </tr>';
}

$html .= '</table>
    <h2>Additional Subjects:</h2>
    <table>
        <tr>
            <th>Semester</th>
            <th>Subject</th>
            <th>Type of Subject</th>
            <th>Subject Code</th>
            <th>Credit</th>
            <th>Marks</th>
            <th>Grade</th>
            <th>Point</th>
        </tr>';

while ($row = $additionalSubjectsResult->fetch_assoc()) {
    $html .= '
    <tr>
        <td>' . htmlspecialchars($row['semester']) . '</td>
        <td>' . htmlspecialchars($row['subject']) . '</td>
        <td>' . htmlspecialchars($row['type_of_subject']) . '</td>
        <td>' . htmlspecialchars($row['subject_code']) . '</td>
        <td>' . htmlspecialchars($row['credit']) . '</td>
        <td>' . htmlspecialchars($row['marks']) . '</td>
        <td>' . htmlspecialchars($row['grade']) . '</td>
        <td>' . htmlspecialchars($row['point']) . '</td>
    </tr>';
}

$html .= '</table>
</body>
</html>';

// Instantiate Dompdf
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);

$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Output the generated PDF
$dompdf->stream("Statement_of_Grades_$register_no.pdf");
?>
