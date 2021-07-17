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
            line-height: 30px;
        }
        td {
            border: 2px solid white;
        }
        .delete {
            background-color: red;
            padding: 5px;
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
<?php include_once "../navigation.php"; ?>

<table border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td colspan="20"><h1>Select Salon To Check Which Stylist is Working There.</h1><hr><br></td>
    </tr>
    <tr>
        <td><strong>Id</strong></td>
        <td><strong>Salon Name</strong></td>
        <td><strong>Stylist Name</strong></td>
        <td><strong>Got Services</strong></td>
        <td><strong>Delete</strong></td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>

    <?php
    $salon_id = $_GET['salon_id'];
    require_once '../database_connection.php';
    $sql = "SELECT
                tbl_hire_stylist_service.hire_service_id,
                tbl_salon.name,
                tbl_stylist.username,
                tbl_stylist_services.service
            FROM
                tbl_hire_stylist_service
            INNER JOIN tbl_salon ON tbl_hire_stylist_service.salon_id = tbl_salon.salon_id
            INNER JOIN tbl_stylist ON tbl_hire_stylist_service.stylist_id = tbl_stylist.stylist_id
            INNER JOIN tbl_stylist_services ON tbl_stylist_services.service_id = tbl_hire_stylist_service.service_id
            WHERE
                tbl_hire_stylist_service.salon_id = '$salon_id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    // rowCount() check how many rows are exits in database.
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['hire_service_id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['username']."</td>";
            echo "<td>".$row['service']."</td>";
            echo "<td><a class='delete' href='salon_with_stylist_services_delete.php?hire_service_id=".$row['hire_service_id']."'>Delete</a></td>";
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
</body>
</html>