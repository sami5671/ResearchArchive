<?php
session_start();

// Destroy the session
session_unset();
session_destroy();

// Redirect the user to the login page with a success message
header("Location: ../pages/login.php?message=Logged out successfully.");
exit();
?>
