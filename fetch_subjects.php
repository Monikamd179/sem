<?php
header('Content-Type: application/json');

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['error' => 'Database connection failed: ' . $conn->connect_error]));
}

$register_no = $_GET['register_no'] ?? '';

if (!$register_no) {
    echo json_encode(['error' => 'Register number is required']);
    exit;
}

$sql = "SELECT * FROM university WHERE register_no = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $register_no);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    echo json_encode($data);
} else {
    echo json_encode(['error' => 'No records found']);
}

$stmt->close();
$conn->close();
?>
