<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Salon</title>
    <link rel="stylesheet" href="../include_files/mystyle.css">
    <style type="text/css">
        table {
            padding: 10px;
            background-color: #d3d3d340; /*light grey*/
            width: 90%; /*90% of screen*/
            margin: 0 auto; /*auto make form center*/
            line-height: 25px; /*add space upper line and below line*/
        }
        .edit {
            background-color: green;
            color: white;
            font-weight: bold;
            padding: 3px;
            text-decoration: none;
        }
        .edit:hover {
            background-color: gold;
            color: black;
        }
        .delete {
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
    </style>
</head>
<body>
    <?php include_once "../navigation.php"; ?>

        <table border="0">
            <tr>
                <td colspan="20"><h1>Manage User</h1><hr><br></td>
            </tr>
            <tr>
                <td><strong>Id</strong></td>
                <td><strong>First Name</strong></td>
                <td><strong>Last Name</strong></td>
                <td><strong>Phone</strong></td>
                <td><strong>Email</strong></td>
                <td><strong>Gender</strong></td>
                <td><strong>Password</strong></td>
                <td><strong>Join Date</strong></td>
                <td><strong>Action</strong></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>

            <?php

                require_once '../database_connection.php';
                $sql = "SELECT * FROM tbl_user WHERE role = 'user'";
                $result = $conn->query($sql);
                // rowCount() check how many rows are exits in database.
                if ($result->rowCount() > 0) {
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>".$row['user_id']."</td>";
                        echo "<td>".$row['first_name']."</td>";
                        echo "<td>".$row['last_name']."</td>";
                        echo "<td>".$row['phone']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>".$row['gender']."</td>";
                        echo "<td>".$row['password']."</td>";
                        echo "<td>".$row['join_date']."</td>";
                        echo "<td>
                                <a class='edit' href='user_edit.php?id=".$row['user_id']."'>Edit</a>
                                <a class='delete' href='user_delete.php?id=".$row['user_id']."'>Delete</a>
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