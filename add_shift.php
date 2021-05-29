<?php
    $day = $_POST['day'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $location = $_POST['location'];

    //connect to the db
    $db = mysqli_connect("localhost", "root", "", "work");

    //query
    $q = "INSERT INTO shifts values(null, '$day', '$start', '$end', '$location')";
    $result = mysqli_query($db, $q);

    //if there is an error with the query
    if ($result == false) {
        header("Location:shift.php?status=error");
    } else {
        header("Location:shift.php?status=success");
    }
?>