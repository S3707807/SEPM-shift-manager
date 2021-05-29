<?php
include 'sessioncheck.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Create Shift</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" herf="bitnami.css">
    <link rel="stylesheet" href="shift.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    include 'nav.php';
    ?>
    <div class="container">
        <div class="title">Shift Creation Page</div>
        <form action="add_shift.php" id="shiftform" method="post">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Start Time</span>
                    <input type="time" name="start" required>
                </div>
                <div class="input-box">
                    <span class="details">End Time</span>
                    <input type="time" name="end" required>
                </div>
                <div class="input-box">
                    <span class="details">Location</span>
                    <input type="text" placeholder="Enter Shift Location" name="location" required>
                </div>
                <div class="input-box">
                    <span class="details">Day</span>
                    <select name="day" form="shiftform">
                        <option value="mon">Mon</option>
                        <option value="tue">Tue</option>
                        <option value="wed">Wed</option>
                        <option value="thur">Thur</option>
                        <option value="fri">Fri</option>
                        <option value="sat">Sat</option>
                        <option value="sun">Sun</option>
                    </select>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Create">
            </div>
        </form>
        <?php
        if (isset($_GET['status'])) {
            if ($_GET['status'] == 'success') {
                echo ("<p>Shift has been created</p>");
            } else {
                echo ("<p>The query returned an error.</p>");
            }
        }
        ?>
    </div>
</body>

</html>