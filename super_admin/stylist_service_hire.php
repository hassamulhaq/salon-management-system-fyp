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
        .services {
            background-color: deepskyblue;
            padding: 5px;
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
<?php include_once "../navigation.php"; ?>

<table border="0">
    <tr>
        <td colspan="20"><h1>Hire Stylist</h1><hr><br></td>
    </tr>
    <tr>
        <td><strong>Id</strong></td>
        <td><strong>Username</strong></td>
        <td><strong>Email</strong></td>
        <td><strong>Phone</strong></td>
        <td><strong>Address</strong></td>
        <td><strong>Gender</strong></td>
        <td><strong>Hire</strong></td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>

    <?php

    require_once '../database_connection.php';
    $sql = "SELECT * FROM tbl_stylist";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['stylist_id']."</td>";
            echo "<td>".$row['username']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['phone']."</td>";
            echo "<td>".$row['address']."</td>";
            echo "<td>".$row['gender']."</td>";
            echo "<td><a class='services' href='stylist_work_assign.php?stylist_id=".$row['stylist_id']."'>Hire</a></td>";
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