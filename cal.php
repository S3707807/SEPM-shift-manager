<?php
include 'sessioncheck.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Shift Times</title>
    <script src="cal.js" async=""></script>
    <style>
        nav {
            position: absolute;
            top: 10px;
            right: 100px;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
            padding-left: 16px;
        }

        nav ul li a {
            font-family: Arial, Helvetica, sans-serif;
        }

        #calendar {
            width: 80%;
            margin-left: 10%;
            margin-top: 60px;
        }

        .calendarTable {
            width: 100%;
            border: 1px solid #000;
        }

        .calendarTable thead tr th {
            background: teal;
            border-bottom: 1px solid #000;
            padding: 20px 0px;
            color: #fff;
        }

        .calendarTable tr td {
            text-align: center;
            padding: 20px;
            border: 1px solid #ccc;
            cursor: pointer;
            background: #dadada;
        }

        .calendarBtns {
            padding: 10px 0;
            width: 100%;
        }

        .calendarBtns button {
            padding: 6px 12px;
            font-size: 18px;
            border-radius: 6px;
            cursor: pointer;
        }

        .calendarDiv {
            display: none;
        }

        #calendarTable_1 {
            display: block;
        }
    </style>
</head>

<body>
    <?php
    include 'nav.php';
    ?>
    <div id="calendar"></div>

</body>

</html>