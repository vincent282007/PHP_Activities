<?php
session_start();
    include "../../config/database.php";//dalawang beses lalabas ng folder, use ../../
    //validation - to make sure that the user is admin
    if(!isset ($_SESSION["role"]) || $_SESSION["role"] != "admin"){
        header("Location: ../../index.php");
        exit;
    }
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0; //intval to turn it into integer. Set variable for id.
    
    //delete SQL
    mysqli_query($conn, "DELETE FROM users WHERE id=$id and role='student'");

    header ('location: index.php'); //to go back on the record table
    exit;
?>