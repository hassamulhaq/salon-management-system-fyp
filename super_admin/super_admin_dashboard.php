<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Salon</title>
    <link rel="stylesheet" href="../include_files/mystyle.css">
    <style type="text/css">
        body {
            background-color: palevioletred;
        }
        .maindiv {
            background-color: #d3d3d340;
            text-align: center;
        }
        .subdiv {
            width: 40%;
            padding: 10px;
            margin: 5px;
            text-align: center;
            display: inline-block;
            background-color: lightgrey;
        }
        .subdiv:hover {
            background-color: palevioletred;
        }
        .subdiv-full {
            width: 80%;
            padding: 10px;
            margin: 5px;
            text-align: center;
            display: inline-block;
            background-color: lightgrey;
        }
        .subdiv-full:hover {
            background-color: palevioletred;
        }
        a {
            color: black;
            text-decoration: none;
        }
        a:hover {
            color: white;
        }
    </style>
</head>
<body>
<?php include_once "../navigation.php"; ?>
<div class="maindiv">
    <div class="subdiv">
        <h1><a href="user_manage.php">Manage User</a></h1>
    </div>
    <div class="subdiv">
        <h1><a href="admin_manage.php">Manage Admin</a></h1>
    </div>
    <div class="subdiv">
        <h1><a href="salon_manage.php">Manage Saloon</a></h1>
    </div>
    <div class="subdiv">
        <h1><a href="salon_add.php">Create New Salon</a></h1>
    </div>
    <div class="subdiv">
        <h1><a href="stylist_manage.php">Manage Stylist</a></h1>
    </div>
    <div class="subdiv">
        <h1><a href="stylist_create.php">Create New Stylist</a></h1>
    </div>
    <div class="subdiv">
        <h1><a href="stylist_service_hire.php">Hire Stylist Services</a></h1>
    </div>
    <div class="subdiv">
        <h1><a href="salon_with_stylist.php">Check Salon with Stylist Service</a></h1>
    </div>




    <div class="subdiv">
        <h1><a href="appointment_manage.php">Manage Appointment</a></h1>
    </div>
    <div class="subdiv">
        <h1><a href="appointment_create.php">Add Appointment</a></h1>
    </div>

    <div class="subdiv-full">
        <h1><a href="user_admin_create.php">Create New User OR Admin</a></h1>
    </div>
</div>


<script src="../include_files/jquery-3.1.1/jquery.min.js"></script>
</body>
</html>