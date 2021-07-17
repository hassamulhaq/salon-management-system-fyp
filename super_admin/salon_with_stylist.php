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
        <td colspan="20"><h1>Select Salon To Check Which Stylist is Working There.</h1><hr><br></td>
    </tr>
    <tr>
        <td><strong>Id</strong></td>
        <td><strong>Logo</strong></td>
        <td><strong>Name</strong></td>
        <td><strong>email</strong></td>
        <td><strong>Check</strong></td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>

    <?php

    require_once '../database_connection.php';
    $sql = "SELECT * FROM tbl_salon";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    // rowCount() check how many rows are exits in database.
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['salon_id']."</td>";
            echo "<td><img src='".$row['logo_image']."' height='50'></td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td><a class='services' href='salon_with_stylist_services.php?salon_id=".$row['salon_id']."'>Check Services</a></td>";
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