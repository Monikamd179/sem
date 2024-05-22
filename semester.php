<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semester Marks</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .scrolling-subjects {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>
    <script>
        const subjectNames = {
            "supportiveCore1": "Supportive Core #1",
            "domainSpecificElective1": "Domain Specific Elective #1",
            "domainSpecificElective2": "Domain Specific Elective #2",
            "openElective1": "Open Elective #1",
            "supportiveCore2": "Supportive Core #2",
            "skillEnhancement1": "Skill Enhancement Programme #1",
            "skillEnhancement2": "Skill Enhancement Programme #2"
        };

        const subjectOptions = {
            "supportiveCore1": ["CSCA 431 - Mathematics for Computer Science (3 Credits)", "CSCA 432 - Management Concepts and Strategies (3 Credits)"],
            "domainSpecificElective1": [
                "CSEL 441 - Fundamentals of Cryptography (3 Credits)", "CSEL 551 - Data Mining Techniques (3 Credits)", 
                "CSEL 561 - Software Project Management (3 Credits)", "CSEL 571 - Introduction to Business Analytics (3 Credits)", 
                "CSEL 581 - Principles of Distributed Computing (3 Credits)", "CSEL 591 - Introduction to A.I. and Expert Systems (3 Credits)"
            ],
            "domainSpecificElective2": [
                "CSEL 442 - Database and Application Security (3 Credits)", "CSEL 552 - Big Data Analytics (3 Credits)", 
                "CSEL 562 - Software Quality Assurance (3 Credits)", "CSEL 572 - Marketing Analytics (3 Credits)", 
                "CSEL 582 - Introduction to Parallel Computing (3 Credits)", "CSEL 592 - Neural Networks (3 Credits)"
            ],
            "openElective1": [
                "CSEL 530 - Online / Certification Courses (3 Credits)", "CSEL 531 - Simulation and Modeling Tools (SCI Lab) (3 Credits)",
                "CSEL 532 - Mobile Application Development (3 Credits)", "CSEL 533 - Software Testing Tools (3 Credits)", 
                "CSEL 534 - Multimedia Tools (3 Credits)", "CSEL 535 - Python Programming (3 Credits)"
            ],
            "supportiveCore2": ["CSCA 431 - Mathematics for Computer Science (3 Credits)", "CSCA 432 - Management Concepts and Strategies (3 Credits)"],
            "skillEnhancement1": [
                "CSCA 531 - Soft Skills Training (3 Credits)", "CSCA 532 - Technical Writing (3 Credits)", 
                "CSCA 533 - Presentation Skills (3 Credits)"
            ],
            "skillEnhancement2": [
                "CSCA 531 - Soft Skills Training (3 Credits)", "CSCA 532 - Technical Writing (3 Credits)", 
                "CSCA 533 - Presentation Skills (3 Credits)"
            ]
        };

        function addSubject(subjectId) {
            if (!subjectId) return;

            const container = document.getElementById('additionalSubjects');
            const subjectDiv = document.createElement('div');
            subjectDiv.className = 'form-group';
            subjectDiv.id = subjectId + '-' + container.children.length;

            let optionsHTML = '';
            subjectOptions[subjectId].forEach(option => {
                optionsHTML += <option value="${option}">${option}</option>;
            });

            subjectDiv.innerHTML = `
                <div class="form-group">
                    <label for="${subjectId}">${subjectNames[subjectId]}:</label>
                    <select class="form-control" name="subjects[${subjectId}]">
                        ${optionsHTML}
                    </select>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control mt-2" name="points[${subjectId}]" min="0" max="10" step="0.01" placeholder="Enter Points" required>
                    <input type="number" class="form-control mt-2" name="marks[${subjectId}]" min="0" max="100" step="1" placeholder="Enter Marks" required>
                    <input type="text" class="form-control mt-2" name="grades[${subjectId}]" placeholder="Grade" readonly>
                </div>
                <button type="button" class="btn btn-danger mt-2" onclick="removeSubject('${subjectDiv.id}')">Delete</button>
            `;
            container.appendChild(subjectDiv);
        }

        function removeSubject(subjectDivId) {
            const subjectDiv = document.getElementById(subjectDivId);
            subjectDiv.parentNode.removeChild(subjectDiv);
        }

        function calculateGrade(points) {
            if (points >= 9.00) {
                return 'O';
            } else if (points >= 8.00) {
                return 'A+';
            } else if (points >= 7.00) {
                return 'A';
            } else if (points >= 6.00) {
                return 'B+';
            } else if (points >= 5.00) {
                return 'B';
            } else if (points >= 4.00) {
                return 'C';
            } else {
                return 'P';
            }
        }

        function calculateSGPA() {
            const points = document.querySelectorAll('[name^="points"]');
            const subjects = document.querySelectorAll('select[name^="subjects"]');
            let totalPoints = 0;
            let totalCredits = 0;

            points.forEach((point, index) => {
                const creditValue = parseInt(subjects[index].selectedOptions[0].text.match(/\((\d+) Credits\)/)[1]);
                totalPoints += point.value * creditValue;
                totalCredits += creditValue;
            });

            const sgpa = totalPoints / totalCredits;
            document.getElementById('cgpa').value = sgpa.toFixed(2);

            // Calculate grades for each subject and display in the form
            points.forEach((point, index) => {
                const grade = calculateGrade(point.value);
                const gradeInput = document.querySelectorAll('[name^="grades"]')[index];
                gradeInput.value = grade;
            });
        }
    </script>
</head>
<body>
    <?php

        include 'db_connection.php';
        $semester = $_GET['semester'];
        $name = $_GET['name'];
        $register_no = $_GET['register_no'];
        $session = $_GET['session'];
        $programme = $_GET['programme'];
        $specialization = $_GET['specialization'];

        $coreSubjects = [
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
                "CSCA 523 - Project Report and Viva-voce (4 Credits)"
            ]
        ];

        $query = "SELECT subject_code, subject_name FROM subjects WHERE hardcore_softcore = 'S'";
        $result = mysqli_query($connection, $query);
        
        $additionalSubjects = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $additionalSubjects[$row['subject_code']] = $row['subject_name'];}
    ?>

   <!-- Header section -->
<header class="text-center mt-3 mb-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-2">
                <img src="pu_logo.png" alt="Pondicherry University Logo" style="width: 100px; height: 100px;">
            </div>
            <div class="col-8">
                <h1 class="mb-0">PONDICHERRY UNIVERSITY <br> (A Central University)</h1>
            </div>
            <div class="col-2 text-right">
                <span>Folio no:</span>
            </div>
        </div>
        <h1 class="mt-4">STATEMENT OF GRADES</h1>
    </div>
</header>


    <!-- Form section -->
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Student Details</h2>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Name of the Student</th>
                            <td><?php echo $name; ?></td>
                        </tr>
                        <tr>
                            <th>Register Number</th>
                            <td><?php echo $register_no; ?></td>
                        </tr>
                        <tr>
                            <th>Session</th>
                            <td><?php echo $session; ?></td>
                        </tr>
                        <tr>
                            <th>Programme</th>
                            <td><?php echo $programme; ?></td>
                        </tr>
                        <tr>
                            <th>Specialization</th>
                            <td><?php echo $specialization; ?></td>
                        </tr>
                    </tbody>
                </table>

                <h2>Core Subjects</h2>
                <div class="scrolling-subjects">
                    <?php foreach ($coreSubjects[$semester] as $index => $subject): ?>
                        <div class="form-group">
                            <label for="coreSubject<?php echo $index; ?>"><?php echo $subject; ?></label>
                            <input type="hidden" name="subjects[core][<?php echo $index; ?>][name]" value="<?php echo $subject; ?>">
                            <input type="number" class="form-control mt-2" name="points[core][<?php echo $index; ?>]" min="0" max="10" step="0.01" placeholder="Enter Points" required>
                            <input type="number" class="form-control mt-2" name="marks[core][<?php echo $index; ?>]" min="0" max="100" step="1" placeholder="Enter Marks" required>
                            <input type="text" class="form-control mt-2" name="grades[core][<?php echo $index; ?>]" placeholder="Grade" readonly>
                        </div>
                    <?php endforeach; ?>
                </div>

               <!-- Additional Subjects section -->
<h2>Additional Subjects</h2>
<div id="additionalSubjects" class="scrolling-subjects">
    <!-- This is where the additional subjects will be listed -->
</div>
<div class="form-group">
    <label for="subjectDropdown">Add Subject:</label>
    <select class="form-control" id="subjectDropdown">
        <option value="" disabled selected>Select Subject</option>
        <?php
            // Populate dropdown with additional subjects
            foreach ($additionalSubjects as $id => $name) {
                echo "<option value=\"$id\">$name</option>";
            }
        ?>
    </select>
    <button type="button" class="btn btn-primary mt-2" onclick="addSubject(subjectDropdown.value)">Add</button>
</div>
                <div class="form-group">
                    <label for="cgpa">SGPA</label>
                    <input type="text" class="form-control" id="cgpa" readonly>
                </div>
                <button type="button" class="btn btn-success" onclick="calculateSGPA()">Calculate SGPA</button>
            </div>
        </div>
    </div>
</body>
</html>