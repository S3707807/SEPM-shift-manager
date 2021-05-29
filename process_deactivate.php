<?php
$id = $_POST['staff_id'];

//connect to the db
$db = mysqli_connect("localhost", "root", "", "work");

//query
$q = "DELETE FROM staff WHERE staff_id = " . $_POST['staff_id'];
$result = mysqli_query($db, $q);

header("Location:register.php");
?>