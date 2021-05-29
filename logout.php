<?php
    session_start();
    // End the session for this user
    session_destroy();
    // Send the user back to the login page
    header("Location:login.php");
?>