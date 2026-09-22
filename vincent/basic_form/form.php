<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
</head>
<body>

    <h1>Student Registration Form</h1>

    <form action = "process.php" method = "post">

        <label for="fullname"><strong>Full Name:</strong></label><br>
        <input type="text" id="fullname" name="fullname" style="width:400px;"><br><br>

        <label for="age"><strong>Age:</strong></label><br>
        <input type="number" id="age" name="age" style="width:400px;"><br><br>

        <strong>Gender:</strong><br>
        <input type="radio" id="male" name="gender" value="Male" checked>
        <label for="male">Male</label>

        <input type="radio" id="female" name="gender" value="Female" style="40px;">
        <label for="female">Female</label>

        <br><br>

        <label for="course"><strong>Course:</strong></label><br>
        <select id="course" name="course" style="width:400px;">
            <option>ACT</option>
            <option>BSIT</option>
            <option>BSCS</option>
            <option>BSEd</option>
            <option>BSBA</option>
        </select>

        <br><br>

        <strong>Hobbies:</strong><br>

        <input type="checkbox" id="reading" name="hobbies[]" value="Reading">
        <label for="reading">Reading</label><br>

        <input type="checkbox" id="gaming" name="hobbies[]" value="Gaming">
        <label for="gaming">Gaming</label><br>

        <input type="checkbox" id="sports" name="hobbies[]" value="Sports">
        <label for="sports">Sports</label><br>

        <input type="checkbox" id="music" name="hobbies[]" value="Music">
        <label for="music">Music</label>

        <br><br>

        <label for="message"><strong>Message:</strong></label><br>
        <textarea id="message" name="message" rows="6" cols="60"></textarea>

        <br><br>

        <input type="submit" value="Submit">
        <input type="reset" value="Clear">

    </form>

</body>
</html>