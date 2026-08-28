<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="text-center mt-5">
    <?php
    if(isset($_GET["info"])){
        echo $_GET["info"];
    }
    ?>
</div>

    <div class="container mt-5">

        <div class="card shadow">

            <div class="card-body">

                <form method="POST" action="process_register.php">
                    <div class="card-header bg-primary text-white text-center">
                        <h3 class="mb-0">Student Registration Form</h3>
                    </div>

                    <div class="mb-3">
                        <label for="student_number" class="form-label">
                            Student Number
                        </label>
                        <input type="text" class="form-control" id="student_number" name="student_no" placeholder="Enter student number" required>
                    </div>

                    <div class="mb-3">
                        <label for="first_name" class="form-label">
                            Full Name
                        </label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter full name" required>
                    </div>

                    <div class="mb-3">
                        <label for="course" class="form-label">
                            Course
                        </label>
                        <select class="form_select" id="course" name="course">
                            <option value="">Select Course</option>
                            <option value="ACT">Associate in Computer Technology</option>
                            <option value="CT">Computer Technology</option>
                        </select>
                    </div>

                    <div class="d-grid">

                        <button type="submit" class="btn btn-primary" name="register">
                            Register Student
                        </button>

                    </div>
                </form>   

            </div>

        </div>

    </div>
</body>
</html>