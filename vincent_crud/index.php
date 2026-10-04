```php
<?php
// Starts/resumes the session so user data can be stored.
session_start(); //global variable - used to store data from databse

// Includes the database connection file.
include "config/database.php";

// Checks if a role is already stored in the session.
if(isset($_SESSION["role"])){

    // Checks the user's role and redirects to the proper dashboard.
    if(isset($_SESSION["role"]) == "admin"){

        // Redirects the user to the admin dashboard.
        header("Location: admin/dashboard.php");
    }
    else{

        // Redirects the user to the student dashboard.
        header("Location: student/dashboard.php");
    }

    // Stops the script after redirecting.
    exit;
}

// Stores error messages.
$error = "";


// Checks if the login form was submitted.
if(isset($_POST["login"])){ //get username and pass input

    // Gets the username entered by the user.
    // mysqli_real_escape_string helps protect the SQL query.
    $username = mysqli_real_escape_string($conn,$_POST["username"]);

    // Gets the password entered by the user.
    $password = $_POST["password"];

    // SQL query to find the user's username in the database.
    $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1"; //verify if usernmae exists

    // Executes the SQL query.
    $result = mysqli_query($conn, $sql);

    // Checks if exactly one matching user was found.
    if(mysqli_num_rows($result) == 1){

        // Gets the user's information from the database.
        $user = mysqli_fetch_assoc($result); //get specific data

        // Checks if the entered password matches the stored password.
        if(password_verify($password, $user["password"])){

            // Stores the user's ID in the session.
            $_SESSION["user_id"] = $user["id"];

            // Stores the user's full name in the session.
            $_SESSION["full_name"] = $user["full_name"];

            // Stores the user's role in the session.
            $_SESSION["role"] = $user["role"];

            // Checks which dashboard should appear based on the role.
            if($user["role"] == "admin"){

                // Redirects admin to the admin dashboard.
                header("Location: admin/dashboard.php");
            }
            else{

                // Redirects student to the student dashboard.
                header("Location: student/dashboard.php");
            }
        }
    }

    // Error shown when username or password is incorrect.
    $error = "Invalid username or password";
}
?>

<!doctype html>
<html lang="en">
<head>

    <!-- Sets the character encoding. -->
    <meta charset="utf-8">

    <!-- Makes the page responsive on different screen sizes. -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Text shown on the browser tab. -->
    <title>Login - Student Portal</title>

    <!-- Loads Bootstrap CSS for styling. -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Loads the website's custom CSS. -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

<!-- Main Bootstrap container. -->
<div class="container">

    <!-- Login box/container. -->
    <div class="login-box">

        <!-- Bootstrap card used to contain the login form. -->
        <div class="card"><div class="card-body p-4">

            <!-- Main page heading. -->
            <h2 class="text-center">Student Portal</h2>

            <!-- Description below the heading. -->
            <p class="text-center text-muted">Admin and Student Login</p>

            <!-- Displays the error message if $error is not empty. -->
            <?php if($error != ""){?>

                <!-- Bootstrap red error/alert box. -->
                <div class="alert alert-danger">

                    <!-- Displays the value stored in $error. -->
                    <?php echo $error ?>

                </div>
            <?php } ?>

            <!-- Login form using the POST method. -->
            <form method = "POST">

                <!-- Username input section. -->
                <div class="mb-3">

                    <!-- Label for the username field. -->
                    <label class="form-label">Username</label>

                    <!-- Input where the user enters their username.
                         required means it cannot be left empty. -->
                    <input type="text" name="username" class="form-control" required>

                </div>

                <!-- Password input section. -->
                <div class="mb-3">

                    <!-- Label for the password field. -->
                    <label class="form-label">Password</label>

                    <!-- Password input hides the characters entered. -->
                    <input type="password" name ="password" class="form-control" required>

                </div>

                <!-- Login button.
                     type="submit" submits the form.
                     name="login" allows PHP to detect the submission. -->
                <button class="btn btn-primary w-100" type="submit" name="login">Login</button>

            </form>
        </div></div>
    </div>
</div>
</body>
</html>
```
