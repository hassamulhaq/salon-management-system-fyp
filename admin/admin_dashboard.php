<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Salon</title>
    <link rel="stylesheet" href="../include_files/mystyle.css">
    <style type="text/css">
        .maindiv {
            background-color: #d3d3d340;
            text-align: center;
        }
        .subdiv {
            width: 40%;
            padding: 10px;
            text-align: center;
            display: inline-block;
            background-color: lightgrey;
        }
        a {
            color: black;
        }
        a:hover {
            color: dodgerblue;
        }
    </style>
</head>
<body>
    <?php include_once "../navigation.php"; ?>
    <div class="maindiv">
        <br>
        <div class="subdiv">
            <h1><a href="user_manage.php">Manage User</a></h1>
        </div>
        <div class="subdiv">
            <h1><a href="salon_manage.php">Manage Salon</a></h1>
        </div>
        <br>
        <br>
        <div class="subdiv">
            <h1><a href="appointment_manage.php">Manage Appointment</a></h1>
        </div>
    </div>
<script src="../include_files/jquery-3.1.1/jquery.min.js"></script>
</body>
</html>