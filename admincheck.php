<?php
    // Restricts access to pages that require manager role
    // Include this at the top of restricted pages
    session_start();
    if($_SESSION['role'] !== 'manager') {
        header("Location:profile.php?staff_id={$_SESSION['staff_id']}");
    }
?>