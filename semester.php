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
            const container = document.getElementById('additionalSubjects');
            const subjectDiv = document.createElement('div');
            subjectDiv.className = 'form-group';

            let optionsHTML = '';
            subjectOptions[subjectId].forEach(option => {
                optionsHTML += `<option value="${option}">${option}</option>`;
            });

            subjectDiv.innerHTML = `
                <label for="${subjectId}">${subjectNames[subjectId]}:</label>
                <select class="form-control" id="${subjectId}" name="subjects[${subjectId}]">
                    ${optionsHTML}
                </select>
                <input type="number" class="form-control mt-2" name="points[${subjectId}]" min="0" max="10" step="0.01" placeholder="Enter Points" required>
                <input type="number" class="form-control mt-2" name="marks[${subjectId}]" min="0" max="100" step="1" placeholder="Enter Marks" required>
                <select class="form-control mt-2" name="grades[${subjectId}]" required>
                    <option value="">Select Grade</option>
                    <option value="O">O</option>
                    <option value="A+">A+</option>
                    <option value="A">A</option>
                    <option value="B+">B+</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="P">P</option>
                    <option value="F">F</option>
                </select>
                <button type="button" class="btn btn-danger mt-2" onclick="removeSubject(this.parentElement)">Delete</button>
            `;
            container.appendChild(subjectDiv);
        }

        function removeSubject(subjectDiv) {
            subjectDiv.parentNode.removeChild(subjectDiv);
        }

        function calculateSGPA() {
            const points = document.querySelectorAll('[name^="points"]');
            const credits = document.querySelectorAll('select[name^="subjects"]');
            let totalPoints = 0;
            let totalCredits = 0;

            points.forEach((point, index) => {
                const creditValue = parseInt(credits[index].selectedOptions[0].text.match(/\((\d+) Credits\)/)[1]);
                totalPoints += point.value * creditValue;
                totalCredits += creditValue;
            });

            const sgpa = totalPoints / totalCredits;
            document.getElementById('cgpa').value = sgpa.toFixed(2);
            document.getElementById('grade').value = calculateGrade(sgpa);
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
    </script>
</head>
<body>
     <?php
        $semester = isset($_GET['semester']) ? $_GET['semester'] : '';
        $name = isset($_GET['name']) ? $_GET['name'] : '';
        $register_no = isset($_GET['register_no']) ? $_GET['register_no'] : '';
        $session = isset($_GET['session']) ? $_GET['session'] : '';
        $programme = isset($_GET['programme']) ? $_GET['programme'] : '';
        $specialization = isset($_GET['specialization']) ? $_GET['specialization'] : '';
        $date_of_birth = isset($_GET['date_of_birth']) ? $_GET['date_of_birth'] : '';


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
                "CSCA 523 - Project Report and Viva-voce (4 Credits)",
                "CSCA 524 - Compulsory Subject Name (3 Credits)" 
            ]
        ];

        function calculateGrade($points) {
            if ($points >= 9.00) {
                return 'O';
            } elseif ($points >= 8.00) {
                return 'A+';
            } elseif ($points >= 7.00) {
                return 'A';
            } elseif ($points >= 6.00) {
                return 'B+';
            } elseif ($points >= 5.00) {
                return 'B';
            } elseif ($points >= 4.00) {
                return 'C';
            } else {
                return 'P';
            }
        }
    ?>

    <!-- Header section -->
    <header class="text-center mt-3 mb-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-2">
                    <img src="image.png" alt="Pondicherry University Logo">
                </div>
                <div class="col-8">
                    <h1 class="mb-0">PONDICHERRY UNIVERSITY <br> (A Central University)</h1>
                </div>
                <div class="col-2 text-right">
                    <span>Folio no:</span>
                </div>
            </div>
            <h1 class="mt-4">SEMESTER MARKS</h1>
        </div>
    </header>

    <!-- Form section -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card p-3 mb-3">
                     <form id="marksForm" action="submit_marks.php" method="post" onsubmit="calculateSGPA(); return false;">
                        <input type="hidden" name="semester" value="<?php echo $semester; ?>">
                        <input type="hidden" name="name" value="<?php echo $name; ?>">
                        <input type="hidden" name="register_no" value="<?php echo $register_no; ?>">
                        <input type="hidden" name="session" value="<?php echo $session; ?>">
                        <input type="hidden" name="programme" value="<?php echo $programme; ?>">
                        <input type="hidden" name="specialization" value="<?php echo $specialization; ?>">
                        <input type="hidden" name="date_of_birth" value="<?php echo $date_of_birth; ?>">

                        <!-- Core Subjects Section -->
                        <div class="form-group">
                            <label>Core Subjects:</label>
                            <div class="scrolling-subjects">
                                <?php
                                // Check if the key exists in the $coreSubjects array
                                if (isset($coreSubjects[$semester])) {
                                    foreach ($coreSubjects[$semester] as $subject) {
                                        echo '<div class="form-group">';
                                        echo '<label>' . $subject . ':</label>';
                                        echo '<input type="number" class="form-control mt-2" name="core_points[]" min="0" max="10" step="0.01" placeholder="Enter Points" required>';
                                        echo '<input type="number" class="form-control mt-2" name="core_marks[]" min="0" max="100" step="1" placeholder="Enter Marks" required>';
                                        echo '<select class="form-control mt-2" name="core_grades[]">';
                                        echo '<option value="">Select Grade</option>';
                                        echo '<option value="O">O</option>';
                                        echo '<option value="A+">A+</option>';
                                        echo '<option value="A">A</option>';
                                        echo '<option value="B+">B+</option>';
                                        echo '<option value="B">B</option>';
                                        echo '<option value="C">C</option>';
                                        echo '<option value="P">P</option>';
                                        echo '<option value="F">F</option>';
                                        echo '</select>';
                                        echo '</div>';
                                    }
                                } else {
                                    echo '<p>No core subjects found for this semester.</p>';
                                }
                                ?>
                            </div>
                        </div>

                        <!-- Additional Subjects Section -->
                        <div id="additionalSubjects"></div>

                        <!-- Buttons to add more subjects -->
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" onclick="addSubject('supportiveCore1')">Add Supportive Core</button>
                            <button type="button" class="btn btn-primary" onclick="addSubject('domainSpecificElective1')">Add Domain Specific Elective</button>
                            <button type="button" class="btn btn-primary" onclick="addSubject('domainSpecificElective2')">Add Domain Specific Elective</button>
                            <button type="button" class="btn btn-primary" onclick="addSubject('openElective1')">Add Open Elective</button>
                            <button type="button" class="btn btn-primary" onclick="addSubject('supportiveCore2')">Add Supportive Core</button>
                            <button type="button" class="btn btn-primary" onclick="addSubject('skillEnhancement1')">Add Skill Enhancement</button>
                            <button type="button" class="btn btn-primary" onclick="addSubject('skillEnhancement2')">Add Skill Enhancement</button>
                        </div>

                        <!-- Submit and result display section -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Calculate SGPA</button>
                        </div>
                        <div class="form-group">
                            <label for="cgpa">SGPA:</label>
                            <input type="text" id="cgpa" class="form-control" readonly>
                        </div>
                        
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Display Student Information -->
                 <div class="card p-3 mb-3">
                    <h5>Student Information</h5>
                    <p><strong>Name:</strong> <?php echo $name; ?></p>
                    <p><strong>Register No:</strong> <?php echo $register_no; ?></p>
                    <p><strong>Session:</strong> <?php echo $session; ?></p>
                    <p><strong>Programme:</strong> <?php echo $programme; ?></p>
                    <p><strong>Specialization:</strong> <?php echo $specialization; ?></p>
                    <p><strong>Date of Birth:</strong> <?php echo $date_of_birth; ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer section -->
    <footer class="text-center mt-3">
        <p>© Pondicherry University 2024</p>
    </footer>

</body>
</html>
