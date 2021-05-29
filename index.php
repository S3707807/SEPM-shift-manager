<?php
    session_start();
    if (isset($_SESSION['staff_id'])) {
        header("Location:profile.php");
    } else {
        header("Location:login.php");
    }
?>