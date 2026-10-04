```php
<?php

    // Starts/resumes the session.
    session_start();

    // Includes the database connection file.
    // ../../ means go up two folders.
    include "../../config/database.php";//dalawang beses lalabas ng folder, use ../../

    // Validation - makes sure that the logged-in user is an admin.
    if(!isset ($_SESSION["role"]) || $_SESSION["role"] != "admin"){

        // If the user is not an admin, redirect to the login page.
        header("Location: ../../index.php");

        // Stops the script after redirecting.
        exit;
    }

    // SQL query to get all subjects.
    // ORDER BY id DESC means newest records appear first.
    $sql = "SELECT * FROM subjects ORDER BY id DESC"; //to get the list of subjects

    // Executes the SQL query.
    $result = mysqli_query($conn, $sql); //to make the sql command work

?> 

<!doctype html>
<html lang="en">

<head>

    <!-- Sets the character encoding. -->
    <meta charset="utf-8">

    <!-- Makes the webpage responsive on different devices. -->
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <!-- Title shown on the browser tab. -->
    <title>Subjects</title>

    <!-- Bootstrap CSS for page styling. -->
    <link
        href="../../assets/vendor/bootstrap/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Custom CSS for the website. -->
    <link
        href="../../assets/css/style.css"
        rel="stylesheet"
    >
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">

            <!-- Website/admin page name. -->
            <a
                class="navbar-brand"
                href="dashboard.html"
            >
                Student Portal Admin
            </a>

        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-4">

        <!-- Check if a message was passed through the URL. -->
        <?php if(isset($_GET["message"])){?>

            <!-- Display the message in a green Bootstrap alert. -->
            <div class="alert alert-success"><?php echo $_GET["message"];?></div>

        <?php } ?>

        <!-- Header Section -->
        <div class="d-flex justify-content-between mb-3">

            <div>

                <!-- Page heading. -->
                <h2>Subjects</h2>

                <!-- Link back to the dashboard. -->
                <a href="../dashboard.php">
                    ← Dashboard
                </a>

            </div>

            <!-- Link to the page for adding a new subject. -->
            <a
                href="create.php"
                class="btn btn-primary"
            >
                + Add Subject
            </a>

        </div>

        <!-- Subjects List Card -->
        <div class="card">

            <div class="card-body">

                <!-- Table used to display subject records. -->
                <table class="table">

                    <thead>
                        <tr>

                            <!-- Table column headings. -->
                            <th>Code</th>
                            <th>Subject Name</th>
                            <th>Units</th>
                            <th>Actions</th>

                        </tr>
                    </thead>

                    <tbody>

                        <!--
                        Loops through each subject record.
                        mysqli_fetch_assoc() gets one database row
                        as an associative array.
                        -->
                        <?php while($row = mysqli_fetch_assoc($result)){ ?>

                        <tr>

                            <!-- Display subject code. -->
                            <td>
                                <?php echo htmlspecialchars($row["subject_code"]); ?>
                            </td>

                            <!-- Display subject name. -->
                            <td>
                                <?php echo htmlspecialchars($row["subject_name"]); ?>
                            </td>

                            <!-- Display subject units. -->
                            <td>
                                <?php echo htmlspecialchars($row["units"]); ?>
                            </td>

                            <!-- Edit and Delete buttons. -->
                            <td>

                                <!--
                                Edit button.
                                The subject ID is passed through the URL.
                                Example: edit.php?id=5
                                -->
                                <a
                                    href="edit.php?id=<?php echo $row['id']; ?>"
                                    class="btn btn-warning btn-sm"
                                >
                                    Edit
                                </a>

                                <!--
                                Delete button.
                                The subject ID is passed to delete.php.
                                -->
                                <a
                                    class="btn btn-danger btn-sm"
                                    href="delete.php?id=<?php echo $row['id']?>"
                                    onclick = "return confirm('Are your sure you want to delete this record?')"
                                >
                                    Delete
                                </a>

                            </td>

                        </tr>

                        <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</body>

</html>
```
