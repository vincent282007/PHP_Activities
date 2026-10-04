
<?php

// Starts/resumes the current session.
// Needed before working with session data.
session_start();

// Destroys the current session and removes the stored session data.
// This effectively logs the user out.
session_destroy();

// Redirects the user back to the login page (index.php).
header("Location: index.php");

// Stops the PHP script after redirecting.
exit;

?>
