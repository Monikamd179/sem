<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT subject_id, name, credits FROM subjects";
$result = $conn->query($query);

$subjects = array();

while ($row = $result->fetch_assoc()) {
    $subjects[$row['subject_id']] = array(
        'name' => $row['name'],
        'credits' => $row['credits']
    );
}

echo json_encode($subjects);

$conn->close();
?>