<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Marklist</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
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
            <h1 class="mt-4">STATEMENT OF GRADES</h1>
        </div>
    </header>

    <!-- Option section -->
    <div class="container">
        <div class="form-container">
            <div class="text-center mb-4">
                <button class="btn btn-primary mr-2" id="new-student-btn">Register New Student</button>
                <button class="btn btn-primary" id="fetch-marksheet-btn">Fetch Marksheet</button>
            </div>

            <!-- New Student Form -->
            <form action="semester.php" method="get" id="new-student-form" style="display:none;">
                <div class="form-group">
                    <label for="name">Name of the Candidate:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="register_no">Register No:</label>
                    <input type="text" class="form-control" id="register_no" name="register_no" required>
                </div>
                <div class="form-group">
                    <label for="session">Session:</label>
                    <input type="text" class="form-control" id="session" name="session" required>
                </div>
                <div class="form-group">
                    <label for="programme">Programme:</label>
                    <input type="text" class="form-control" id="programme" name="programme" required>
                </div>
                <div class="form-group">
                    <label for="specialization">Specialization:</label>
                    <input type="text" class="form-control" id="specialization" name="specialization" required>
                </div>
                <div class="form-group">
                    <label for="date_of_birth">Date of Birth:</label>
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                </div>
                <div class="form-group">
                    <label for="semester">Semester:</label>
                    <select class="form-control" id="semester" name="semester" required>
                        <option value="1">1st Semester</option>
                        <option value="2">2nd Semester</option>
                        <option value="3">3rd Semester</option>
                        <option value="4">4th Semester</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <!-- Fetch Marksheet Form -->
            <form action="fetch_marksheet.php" method="get" id="fetch-marksheet-form" style="display:none;">
                <div class="form-group">
                    <label for="register_no_fetch">Register No:</label>
                    <input type="text" class="form-control" id="register_no_fetch" name="register_no" required>
                </div>
                <div class="form-group">
                    <label for="semester_fetch">Semester:</label>
                    <select class="form-control" id="semester_fetch" name="semester" required>
                        <option value="1">1st Semester</option>
                        <option value="2">2nd Semester</option>
                        <option value="3">3rd Semester</option>
                        <option value="4">4th Semester</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Fetch Marksheet</button>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Pondicherry University. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('new-student-btn').addEventListener('click', function() {
            document.getElementById('new-student-form').style.display = 'block';
            document.getElementById('fetch-marksheet-form').style.display = 'none';
        });

        document.getElementById('fetch-marksheet-btn').addEventListener('click', function() {
            document.getElementById('new-student-form').style.display = 'none';
            document.getElementById('fetch-marksheet-form').style.display = 'block';
        });
    </script>
</body>
</html>
