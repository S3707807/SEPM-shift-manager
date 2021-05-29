<?php
    $shift_id = $_POST['shift'];
    $staff_id = $_POST['staff_id'];

    //connect to the db
    $db = mysqli_connect("localhost", "root", "", "work");

    //query
    $q = "INSERT INTO staff_shifts values('$staff_id', '$shift_id', 'active')";
    $result = mysqli_query($db, $q);

    header("Location:profile.php?staff_id={$_POST['staff_id']}");
?>