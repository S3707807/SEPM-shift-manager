<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/css/bootstrap.min.css">
    <link rel="stylesheet" href="bitnami.css">
</head>

<body>
    <?php

    //connect to the db
    $db = mysqli_connect("localhost", "root", "", "work");

    //query
    $q = "SELECT * FROM staff WHERE staff_id = '$_GET[staff_id]'";
    $result = mysqli_query($db, $q);
    $row = mysqli_fetch_array($result, MYSQLI_BOTH);

    ?>
    <div class="container">
        <div class="main">
            <div class="topbar">
                <a href="">Logout</a>
                <a href="">Calendar</a>
                <a href="">Home</a>
            </div>
            <div class="row">
                <div class="col-md-4 mt-1">
                    <div class="card text-center sidebar">
                        <div class="card-body">
                            <img src="img/image.jpeg" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h1><?php echo ("$row[firstname]"); ?></h1>
                                <a href=""><u>
                                        <h4>Shift History</h4>
                                    </u></a>
                                <a href=""> <u>
                                        <h4>Shift Availabilites</h4>
                                    </u> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mt-1">
                    <div class="card mb-3 content">
                        <h1 class="m-3 pt-3">About</h1>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Full name</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <?php echo ("$row[firstname] $row[lastname]"); ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Preferred Name</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <?php echo ("$row[firstname]"); ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Email</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                <?php echo("$row[email]"); ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Phone</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                <?php echo("$row[phone]"); ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Address</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                <?php echo("$row[address]"); ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Working hours per week</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                <?php echo("$row[worklimit]"); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>