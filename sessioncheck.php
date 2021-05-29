<?php
session_start();
// If a user tries to access a restricted page without logging in
// Redirect them to the login page
if (!isset($_SESSION['staff_id'])) {
    header("Location:login.php");
}
?>