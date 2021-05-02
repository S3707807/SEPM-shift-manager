<!DOCTYPE html>
<html>

<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $worklimit = $_POST['worklimit'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $role = $_POST['role'];

    //connect to the db
    $db = mysqli_connect("localhost", "root", "", "work");

    //query
    $q = "INSERT INTO staff values(null, '$email', '$password', '$firstname', '$lastname', $worklimit, '$phone', '$address', '$role')";
    mysqli_query($db, $q);

    header("Location:register.php");
    ?>

</body>

</html>