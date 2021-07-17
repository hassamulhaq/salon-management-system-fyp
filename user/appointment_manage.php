<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Salon</title>
    <link rel="stylesheet" href="../include_files/mystyle.css">
    <link rel="stylesheet" href="../include_files/font-awesome/css/font-awesome.min.css">
    <style type="text/css">
        body {
            background-color: palevioletred;
        }
        table {
            padding: 10px;
            background-color: #d3d3d340; /*light grey*/
            width: 100%;
            margin: 0 auto; /*auto make form center*/
            line-height: 25px; /*add space upper line and below line*/
        }
        td{
            border: 2px solid #d3d3d340;
        }
        .delete {
            background-color: red;
            color: white;
            font-weight: bold;
            padding: 3px;
            text-decoration: none;
        }
        .not_allowed {
            background-color: red;
            color: white;
            font-weight: bold;
            padding: 3px;
            text-decoration: none;
        }
        .delete:hover {
            background-color: gold;
            color: black;
        }
        .complete {
            background-color: green;
            color: white;
            padding: 5px;
        }
        .pending {
            background-color: orange;
            color: white;
            padding: 5px;
        }
        .like {
            color: red;
        }
    </style>
</head>
<body>
<?php include_once "../navigation.php"; ?>

<table border="0" cellpadding="5" cellspacing="0">
    <tr>
        <td colspan="20"><h1>Manage Appointments</h1><hr><br></td>
    </tr>
    <tr>
        <td><strong>Id</strong></td>
        <td><strong>Salon</strong></td>
        <td><strong>Stylist</strong></td>
        <td><strong>User</strong></td>
        <td><strong>Appointment Date</strong></td>
        <td><strong>Appointment Time</strong></td>
        <td><strong>Note</strong></td>
        <td><strong>Status</strong></td>
        <td><strong>Rate</strong></td>
        <td><strong>Created On</strong></td>
        <td><strong>Action</strong></td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>

    <?php

    require_once '../database_connection.php';
    $user_id = $_SESSION['user_session']['user_id'];
    $sql = "SELECT
                tbl_appointment.appointment_id,
                tbl_appointment.appointment_date,
                tbl_appointment.appointment_time,
                tbl_appointment.note,
                tbl_appointment.status,
                tbl_appointment.created_date,
                tbl_salon.name,
                tbl_user.first_name,
                tbl_user.user_id,
                tbl_stylist.username,
                tbl_stylist.stylist_id
            FROM
                tbl_appointment
            INNER JOIN tbl_salon ON tbl_appointment.salon_id = tbl_salon.salon_id
            INNER JOIN tbl_stylist ON tbl_appointment.stylist_id = tbl_stylist.stylist_id
            INNER JOIN tbl_user ON tbl_user.user_id = tbl_appointment.user_id
            WHERE tbl_appointment.user_id = '$user_id'";
    $result = $conn->query($sql);
    // rowCount() check how many rows are exits in database.
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['appointment_id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['username']."</td>";
            echo "<td>".$row['first_name']."</td>";
            echo "<td>".$row['appointment_date']."</td>";
            echo "<td>".$row['appointment_time']."</td>";
            echo "<td>".$row['note']."</td>";

            //echo "<td>".$row['status']."</td>";
            if ($row['status'] == 1) {
                echo "<td class='complete'>Completed</td>";
            } else {
                echo "<td class='pending'>Pending</td>";
            }

            //echo "<td>".$row['status']."</td>";
            if ($row['status'] == 1) {
                $user_id = $row['user_id'];
                $stylist_id = $row['stylist_id'];
                $sql2 = "SELECT * FROM tbl_stylist_rate WHERE user_id='$user_id' AND stylist_id='$stylist_id'";
                $fire2 = $conn->query($sql2);
                $result2 = $fire2->fetch(PDO::FETCH_ASSOC);
                if ($result2['rating'] == 1) {
                    echo "<td><a class='like' href='stylist_rate_submit.php?stylist_id=".$row['stylist_id']."&user_id=".$row['user_id']."'><i class='fa fa-heart fa-2x'></i></a></td>";
                } else
                echo "<td><a class='dis-like' href='stylist_rate_submit.php?stylist_id=".$row['stylist_id']."&user_id=".$row['user_id']."'><i class='fa fa-heart-o fa-2x'></i></a></td>";
            } else {
                echo "<td>.......</td>";
            }




            echo "<td>".$row['created_date']."</td>";

            if ($row['status'] == 1) {
                echo "<td><a class='not_allowed' href='#'>Cancel</a></td>";
            }
            else {
                echo "<td><a class='delete' href='appointment_delete.php?appointment_id=".$row['appointment_id']."'>Cancel</a></td>";
            }
            echo "</tr>";






        }
    } else {
        echo '<tr>';
        echo '<td><h2>No Data Found</h2></td>';
        echo '</tr>';
    }

    ?>
</table>

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
    $(document).on('click', '.not_allowed', function () {
        alert('Not Allowed To Cancel Because Appointment is Done.');
    });
</script>
</body>
</html>