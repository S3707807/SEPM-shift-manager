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
    $result = mysqli_query($db, $q);

    //if there is an error with the query
    if ($result == false){
        header("Location:register.php?status=error");
    } else {
        header("Location:register.php?status=success");
    }
    ?>

</body>

</html>