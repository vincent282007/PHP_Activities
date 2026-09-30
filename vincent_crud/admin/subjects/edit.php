<?php
    session_start();
    include "../../config/database.php";//dalawang beses lalabas ng folder, use ../../
    //validation - to make sure that the subjects is admin
    if(!isset ($_SESSION["role"]) || $_SESSION["role"] != "admin"){
        header("Location: ../../index.php");
        exit;
    }  

    $id = isset($_GET['id']) ? intval($_GET['id']) : 0; //intval to turn it into integer. Set variable for id.

    $result = mysqli_query($conn, "SELECT * FROM subjects WHERE id = $id");
    $subjects = mysqli_fetch_assoc($result); 

    if(!$subjects){
        die('Subject not found.'); //if subject not found
    }

    $message = "";
    if(isset($_POST['update'])){   //start of update
        $subject_code = $_POST['subject_code'];
        $subject_name = $_POST['subject_name'];
        $units = $_POST['units'];
        //update     
        $sql = "UPDATE subjects SET 
        subject_code = '$subject_code',
        subject_name = '$subject_name',
        units = '$units'
        WHERE id=$id";
        //connect the database
        if(mysqli_query($conn, $sql)){
            header("Location: index.php?message=Subject Updated Successfully!");
            exit;
        }
        else{
            $message = "Could not update.";
        }
    }

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Subject</title>
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5" style="max-width:700px">
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <h2>Edit Subject</h2>
                <?php if($message != ""){ ?>
                    <div class="alert alert-danger"> <?php echo $message; ?> </div>
                <?php } ?>
                        <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Subject Code</label>
                    <input type="text" name="subject_code" class="form-control" value="<?php echo htmlspecialchars($subjects['subject_code']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Subject Name</label>
                    <input type="text" name="subject_name" class="form-control" value="<?php echo htmlspecialchars($subjects['subject_name']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Units</label>
                    <input type="number" name="units" class="form-control" value="<?php echo htmlspecialchars($subjects['units']); ?>" required>
                </div>
                <button type="submit" name="update" class="btn btn-primary">Update Subject</button>
                <a href="index.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
