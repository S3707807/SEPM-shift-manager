<?php
include 'sessioncheck.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/css/bootstrap.min.css">
    <link rel="stylesheet" href="bitnami.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <title>My Profile</title>
</head>

<body>
    <?php
    include 'nav.php';
    ?>
    <?php

    //connect to the db
    $db = mysqli_connect("localhost", "root", "", "work");

    //query
    //if a user id is specified, go to that profile page
    if (isset($_GET['staff_id'])) {
        // make sure the current user is permitted to view that profile
        if ($_SESSION['role'] == 'manager') {
            $q = "SELECT * FROM staff WHERE staff_id = '$_GET[staff_id]'";
        } else {
            // otherwise go to my profile page
            $q = "SELECT * FROM staff WHERE staff_id = '$_SESSION[staff_id]'";
        }
    } else {
        // otherwise go to my profile page
        $q = "SELECT * FROM staff WHERE staff_id = '$_SESSION[staff_id]'";
    }
    $result = mysqli_query($db, $q);
    $row = mysqli_fetch_array($result, MYSQLI_BOTH);
    ?>
    <div class="container">
        <div class="main">
            <div class="row">
                <div class="col-md-4 mt-1">
                    <div class="card text-center sidebar">
                        <div class="card-body">
                            <img src="img/image.jpeg" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h1><?php echo ("$row[firstname]"); ?></h1>
                                <a href="allocation_history.php?staff_id=<?php echo ("$_GET[staff_id]"); ?>"><u>
                                        <h4>Shift History</h4>
                                    </u></a>
                                <?php
                                // Only show the deactivate button if
                                // - This current user is a manager
                                // - It is not your own profile page (You can't deactivate yourself!)
                                if ($_SESSION['role'] == 'manager' && $_SESSION['staff_id'] !== $_GET['staff_id']) { ?>
                                    <form method="post" action="process_deactivate.php">
                                        <input type="hidden" name="staff_id" value="<?php echo ("$_GET[staff_id]"); ?>">
                                        <input type="submit" value="Deactivate">
                                    </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mt-1">
                    <div class="card mb-3 content">
                        <div class="row">
                            <div class="col-md-3">
                                <h1 class="m-3 pt-3">About</h1>
                            </div>
                            <div class="col-md-5">
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#shiftModal" style="margin: 30px">
                                    Assign new shift
                                </button>
                            </div>
                        </div>
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
                                    <?php echo ("$row[email]"); ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Phone</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <?php echo ("$row[phone]"); ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Address</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <?php echo ("$row[address]"); ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Working hours per week</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <?php echo ("$row[worklimit]"); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="shiftModal" role="dialog" style="margin-top: 128px">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Assign shift</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php
                        //connect to the db
                        $db = mysqli_connect("localhost", "root", "", "work");

                        //query
                        $q = "SELECT * FROM shifts";
                        $result = mysqli_query($db, $q);

                        // If there is at least 1 shift available, display the form
                        if (mysqli_num_rows($result) > 0) {
                        ?>
                            <form method="post" action="assign_shift.php" id="shiftform">
                                <select name="shift" form="shiftform">
                                    <?php
                                        while($row = mysqli_fetch_assoc($result)) {
                                            $day = ucfirst($row['day']);
                                            // remove seconds from time format
                                            $start = substr($row['start'], 0, -3);
                                            $end = substr($row['end'], 0, -3);
                                            $location = ucfirst($row['location']);
                                            echo("<option value=\"$row[shift_id]\">$day $start - $end ($location)</option>'");
                                        }
                                    ?>
                                </select>
                            <input type="hidden" name="staff_id" value="<?php echo ("$_GET[staff_id]"); ?>">
                            </form>
                        <?php
                        } else {
                        ?>
                            <p>There are no shifts to display. <a href="shift.php">Create a new shift</a></p>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" form="shiftform">Assign</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>