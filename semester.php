<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semester Marks</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        .scrolling-subjects {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>
    <script>
        function addSubject(subjectId) {
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
            `;
            container.appendChild(subjectDiv);
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
    </script>
</head>
<body>
    <?php
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
                    <img src="pu_logo.png" alt="Pondicherry University Logo">
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

                        <h5>Semester: <?php echo $semester; ?></h5>
                        <h5>Name: <?php echo $name; ?></h5>
                        <h5>Register No: <?php echo $register_no; ?></h5>
                        <h5>Session: <?php echo $session; ?></h5>
                        <h5>Programme: <?php echo $programme; ?></h5>
                        <h5>Specialization: <?php echo $specialization; ?></h5>

                        <h3>Core Subjects:</h3>
                        <?php
                            foreach ($coreSubjects[$semester] as $subject) {
                                echo '
                                    <div class="form-group">
                                        <label>' . $subject . ':</label>
                                        <input type="number" class="form-control" name="points[]" min="0" max="10" step="0.01" placeholder="Enter Points" required>
                                        <input type="number" class="form-control mt-2" name="marks[]" min="0" max="100" step="1" placeholder="Enter Marks" required>
                                    </div>
                                ';
                            }
                        ?>

                        <div id="additionalSubjects"></div>
                        
                        <div class="form-group">
                            <label for="grade">Grade:</label>
                            <input type="text" class="form-control" id="grade" name="grade" readonly>
                        </div>

                        <div class="form-group">
                            <label for="result">Result:</label>
                            <input type="text" class="form-control" id="result" name="result" readonly>
                        </div>

                        <div class="form-group">
                            <label for="cgpa">CGPA:</label>
                            <input type="text" class="form-control" id="cgpa" name="cgpa" readonly>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            <div class="col-md-4">
                <div class="scrolling-subjects">
                    <h4>Available Subjects</h4>
                    <ul class="list-group">
                        <li class="list-group-item"><button type="button" class="btn btn-link" onclick="addSubject('supportiveCore1')">Supportive Core #1</button></li>
                        <li class="list-group-item"><button type="button" class="btn btn-link" onclick="addSubject('domainSpecificElective1')">Domain Specific Elective #1</button></li>
                        <li class="list-group-item"><button type="button" class="btn btn-link" onclick="addSubject('domainSpecificElective2')">Domain Specific Elective #2</button></li>
                        <li class="list-group-item"><button type="button" class="btn btn-link" onclick="addSubject('openElective1')">Open Elective #1</button></li>
                        <li class="list-group-item"><button type="button" class="btn btn-link" onclick="addSubject('supportiveCore2')">Supportive Core #2</button></li>
                        <li class="list-group-item"><button type="button" class="btn btn-link" onclick="addSubject('skillEnhancement1')">Skill Enhancement Programme #1</button></li>
                        <li class="list-group-item"><button type="button" class="btn btn-link" onclick="addSubject('skillEnhancement2')">Skill Enhancement Programme #2</button></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
