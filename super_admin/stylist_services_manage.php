<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Salon</title>
    <link rel="stylesheet" href="../include_files/mystyle.css">
    <style type="text/css">
        .stylist_service_div {
            margin: 10px auto;
            padding: 10px;
            width: 90%;
            background-color: #ededed;
        }
        .add_services {
            padding: 10px;
            background-color: deepskyblue;
            color: white;
            font-weight: bold;
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

<div class="stylist_service_div">
    <h2>My Services</h2>
    <?php
        $user_id = $_GET['id'];
    ?>
    <a href="stylist_add_services.php?id=<?php echo $user_id; ?>" class="add_services" type="button">Add</a>
    <hr>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td><strong>Service Id</strong></td>
            <td><strong>Stylist Name</strong></td>
            <td><strong>Service Name</strong></td>
            <td><strong>Action</strong></td>
        </tr>

        <?php
        $user_id = $_GET['id'];
        require_once '../database_connection.php';
        //$sql = "SELECT * FROM tbl_stylist_services WHERE stylist_id = '$user_id'";
        $sql = "SELECT
                    tbl_stylist_services.service_id,
                    tbl_stylist_services.service,
                    tbl_stylist.stylist_id,
                    tbl_stylist.username
                FROM
                    tbl_stylist_services
                INNER JOIN tbl_stylist ON tbl_stylist_services.stylist_id = tbl_stylist.stylist_id
                WHERE
                    tbl_stylist.stylist_id = '$user_id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        // rowCount() check how many rows are exits in database.
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>".$row['service_id']."</td>";
                echo "<td>".$row['username']."</td>";
                echo "<td>".$row['service']."</td>";
                echo "<td>
                        <a class='delete' href='stylist_services_remove.php?stylist_id=".$row['stylist_id']."&service_id=".$row['service_id']."'>Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo '<tr>';
            echo '<td><h2>No Record Found.</h2></td>';
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