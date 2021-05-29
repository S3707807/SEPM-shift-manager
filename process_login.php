<?php
$email = $_POST['email'];
$password = $_POST['password'];

//connect to the db
$db = mysqli_connect("localhost", "root", "", "work");

//query
$q = "SELECT * FROM staff WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($db, $q);

// If a row is returned, that email+password match exists
// The account is valid
if (mysqli_num_rows($result) > 0) {
    session_start();
    $row = mysqli_fetch_assoc($result);
    $_SESSION['staff_id'] = $row['staff_id'];
    $_SESSION['role'] = $row['role'];

    // send the user to their calendar (profile is placeholder landing page for now)
    header("Location:profile.php?staff_id={$_SESSION['staff_id']}");
} else {
    // Otherwise, display an error on the login page
    header("Location:login.php?status=error");
}
?>