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

    <!-- Form section -->
    <div class="container">
        <div class="form-container">
            <form action="semester.php" method="get">
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
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Pondicherry University. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
