<?php
// logout.php - Terminate user session
// Vulnerability 3: Simple GET request logout page without token/CSRF checks.
// Anyone can cause a logout by linking a logged-in user to this script (e.g. via an img src or link).

// Clear the loggedin cookie by setting its expiration time to the past
setcookie("loggedin", "", time() - 3600, "/");

// Redirect the user back to the index page
header("Location: index.php");
exit;
?>
