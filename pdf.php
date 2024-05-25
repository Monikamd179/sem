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
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Student Grades</h1>
    <form method="GET" action="">
        <label for="register_no">Enter Register No:</label>
        <input type="text" id="register_no" name="register_no">
        <button type="submit">Submit</button>
    </form>
<?php
require_once('tcpdf/tcpdf.php'); // Include the TCPDF library

include 'db_connection.php'; // Include the database connection script

if(isset($_GET['register_no'])) {
    $register_no = $_GET['register_no'];

    // Fetch student details
    $student_query = $connection->prepare("SELECT * FROM students WHERE register_no = ?");
    $student_query->bind_param("s", $register_no);
    $student_query->execute();
    $student_result = $student_query->get_result();
    $student = $student_result->fetch_assoc();

    // Fetch core subjects details
    $core_query = $connection->prepare("SELECT * FROM core_subjects WHERE register_no = ?");
    $core_query->bind_param("s", $register_no);
    $core_query->execute();
    $core_result = $core_query->get_result();

    // Fetch additional subjects details
    $additional_query = $connection->prepare("SELECT * FROM additional_subjects WHERE register_no = ?");
    $additional_query->bind_param("s", $register_no);
    $additional_query->execute();
    $additional_result = $additional_query->get_result();
} else {
    echo "No register number provided.";
    exit;
}

// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Student Grades');
$pdf->SetSubject('Student Grades');
$pdf->SetKeywords('TCPDF, PDF, student, grades');

// Remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->SetMargins(10, 10, 10, true);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 10);

// Add a page
$pdf->AddPage();

// HTML content
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
            <th>Date of Birth</th>
            <th>Session</th>
            <th>Programme</th>
            <th>Specialization</th>
        </tr>
        <tr>
            <td>'.$student['name'].'</td>
            <td>'.$student['register_no'].'</td>
            <td>'.$student['date_of_birth'].'</td>
            <td>'.$student['session'].'</td>
            <td>'.$student['programme'].'</td>
            <td>'.$student['specialization'].'</td>
        </tr>
    </table>
    <h2>Core Subjects:</h2>
    <table>
        <tr>
            <th>Subject</th>
            <th>Points</th>
            <th>Marks</th>
            <th>Grade</th>
        </tr>';
        
if ($core_result->num_rows > 0) {
    while($core_subject = $core_result->fetch_assoc()) {
        $html .= '<tr>
                    <td>'.$core_subject['subject'].'</td>
                    <td>'.$core_subject['points'].'</td>
                    <td>'.$core_subject['marks'].'</td>
                    <td>'.$core_subject['grade'].'</td>
                </tr>';
    }
} else {
    $html .= '<tr><td colspan="4">No core subjects found</td></tr>';
}

$html .= '</table>
    <h2>Additional Subjects:</h2>
    <table>
        <tr>
            <th>Subject</th>
            <th>Points</th>
            <th>Marks</th>
            <th>Grade</th>
        </tr>';
        
if ($additional_result->num_rows > 0) {
    while($additional_subject = $additional_result->fetch_assoc()) {
        $html .= '<tr>
                    <td>'.$additional_subject['subject'].'</td>
                    <td>'.$additional_subject['points'].'</td>
                    <td>'.$additional_subject['marks'].'</td>
                    <td>'.$additional_subject['grade'].'</td>
                </tr>';
    }
} else {
    $html .= '<tr><td colspan="4">No additional subjects found</td></tr>';
}

$html .= '</table>
</body>
</html>';

// Output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('student_grades.pdf', 'D');
