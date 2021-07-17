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
        .stylist_service_div {
            margin: 10px auto;
            padding: 10px;
            width: 90%;
            background-color: #ededed;
        }
        a {
            color: black;
        }
        a:hover {
            color: dodgerblue;
        }
        .delete {
            background-color: red;
            color: white;
            font-weight: bold;
            padding: 5px;
            text-decoration: none;
        }
        .delete:hover {
            background-color: gold;
            color: black;
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
            <h1><a href="add_services.php">Add Services</a></h1>
        </div>
    </div>


    <div class="stylist_service_div">
        <h2>My Services</h2>
        <table border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td><strong>Id</strong></td>
                <td><strong>Stylist Name</strong></td>
                <td><strong>Service Name</strong></td>
                <td><strong>Action</strong></td>
            </tr>

            <?php

            require_once '../database_connection.php';
            $user_id = $_SESSION['stylist_session']['user_id'];
            $sql = "SELECT * FROM tbl_stylist_services WHERE stylist_id = '$user_id'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>".$row['service_id']."</td>";
                    //echo "<td>".$row['stylist_id']."</td>";
                    echo "<td>".$_SESSION['stylist_session']['username']."</td>";
                    echo "<td>".$row['service']."</td>";
                    echo "<td>
                                <a class='delete' href='remove_service.php?id=".$row['service_id']."'>Delete</a>
                            </td>";
                    echo "</tr>";
                }
            } else {
                echo '<tr>';
                echo '<td><h2>No User Found</h2></td>';
                echo '</tr>';
            }

            ?>
        </table>
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