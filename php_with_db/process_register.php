<?php
include "database/connection.php";

if (isset($_POST["register"])) {
    $student_no = $_POST["student_no"];
    $student_name = $_POST["first_name"];
    $course = $_POST["course"];

    $sql = "INSERT INTO students ( 
        student_no, 
        student_name, 
        course) 
    VALUES (
        '$student_no',
        '$student_name',
        '$course')";

    if (mysqli_query($conn, $sql)) {
        header("Location: register.php?info=Student registered successfully!");
        exit();
    }
    else {
        header("Location: register.php?info=" . urlencode(mysqli_error($conn)));
        exit();
    }
}
?>