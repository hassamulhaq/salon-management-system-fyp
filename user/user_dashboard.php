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
            margin: 10px;
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
    <div class="subdiv">
        <h1><a href="profile.php">Update Profile</a></h1>
    </div>
    <div class="subdiv">
        <h1><a href="profile.php">Update Profile</a></h1>
    </div>
    <div class="subdiv">
        <h1><a href="appointment_manage.php">Manage Appointment</a></h1>
    </div>
    <div class="subdiv">
        <h1><a href="appointment_create.php">Create Appointment</a></h1>
    </div>
</div>


<script src="../include_files/jquery-3.1.1/jquery.min.js"></script>
<script>
    $(document).on('click', '.delete', function () {
        var check_confirm = confirm('Delete this Record?');
        if (check_confirm === true) {
            return true;
        }
        else {
            return false;
        }
    });
</script>
</body>
</html>