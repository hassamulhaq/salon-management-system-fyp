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
            width: 100%; /*100% of screen*/
            margin: 0 auto; /*auto make form center*/
            line-height: 25px; /*add space upper line and below line*/
        }
        tr {
            border: 2px solid #d3d3d340;
        }
        .edit {
            background-color: green;
            color: white;
            font-weight: bold;
            padding: 3px;
            text-decoration: none;
        }
        .delete {
            background-color: red;
            color: white;
            font-weight: bold;
            padding: 3px;
            text-decoration: none;
        }
    </style>
</head>
<body>
<?php include_once "../navigation.php"; ?>

<table border="1">
    <tr>
        <td colspan="20"><h1>Manage Salon</h1><hr><br></td>
    </tr>
    <tr>
        <td><strong>ID</strong></td>
        <td><strong>Name</strong></td>
        <td><strong>Contact</strong></td>
        <td><strong>Email</strong></td>
        <td><strong>Country</strong></td>
        <td><strong>Province</strong></td>
        <td><strong>City</strong></td>
        <td><strong>Address</strong></td>
        <td><strong>Zip code</strong></td>
        <td><strong>Opening Time</strong></td>
        <td><strong>Closing Time</strong></td>
        <td><strong>Created Date</strong></td>
        <td><strong>Action</strong></td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <?php

    require_once '../database_connection.php';
    $sql = "SELECT * FROM tbl_salon";
    $result = $conn->query($sql);
    // rowCount() check how many rows are exits in database.
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['salon_id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['contact_no']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['country']."</td>";
            echo "<td>".$row['province']."</td>";
            echo "<td>".$row['city']."</td>";
            echo "<td>".$row['address']."</td>";
            echo "<td>".$row['zip_code']."</td>";
            echo "<td>".$row['opening_time']."</td>";
            echo "<td>".$row['closing_time']."</td>";
            echo "<td>".$row['create_date']."</td>";
            echo "<td>
                                <a class='edit' href='salon_edit.php?id=".$row['salon_id']."'>Edit</a>
                                <a class='delete' href='salon_delete.php?id=".$row['salon_id']."'>Delete</a>
                            </td>";
            echo "</tr>";
        }
    } else {
        echo '<tr>';
        echo '<td><h2>No Salon Found</h2></td>';
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