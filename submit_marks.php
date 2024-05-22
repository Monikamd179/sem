<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $register_no = $_POST['register_no'];
    $session = $_POST['session'];
    $programme = $_POST['programme'];
    $specialization = $_POST['specialization'];
    $semester = $_POST['semester'];
    $marks = $_POST['marks'];

    // Save the data to the database or process it as needed

    echo "<h1>Marks Submitted Successfully!</h1>";
    echo "<p>Name: $name</p>";
    echo "<p>Register No: $register_no</p>";
    echo "<p>Session: $session</p>";
    echo "<p>Programme: $programme</p>";
    echo "<p>Specialization: $specialization</p>";
    echo "<p>Semester: $semester</p>";
    echo "<h2>Marks</h2>";
    echo "<ul>";
    foreach ($marks as $subject => $mark) {
        echo "<li>$subject: $mark</li>";
    }
    echo "</ul>";
}
?>
