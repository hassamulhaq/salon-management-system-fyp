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
        select {
            padding: 10px;
            font-weight: bold;
        }
        .submit_button {
            font-weight: bold;
            padding: 5px;
            text-decoration: none;
        }
        .submit_button:hover {
            background-color: gold;
            color: black;
        }
    </style>
</head>
<body>
<?php include_once "../navigation.php"; ?>

<div class="stylist_service_div">
    <form action="stylist_service_hire_submit.php" method="post">
        <h2>Assign Stylist Services To Work At Salon</h2>
        <?php
        $stylist_id = $_GET['stylist_id'];
        require_once '../database_connection.php';
        ?>
        <div>
            <input type="hidden" name="stylist_id" value="<?php echo $_GET['stylist_id']; ?>">
        </div>
        <div>
            <strong>Select Salon</strong>
            <select name="salon_id" required="">
                <option value="">Choose</option>
                <?php
                    $sql0 = "SELECT salon_id, name FROM tbl_salon";
                    $stmt0 = $conn->prepare($sql0);
                    $stmt0->execute();
                    while ($result0 = $stmt0->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='".$result0['salon_id']."'>".$result0['name']."</option>";
                    }
                ?>
            </select>
        </div>
        <hr>
        <table border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td><strong>Service Id</strong></td>
                <td><strong>Stylist Name</strong></td>
                <td><strong>Service Name</strong></td>
                <td><strong>Hire Services</strong></td>
            </tr>

            <?php
            $stylist_id = $_GET['stylist_id'];
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
                        tbl_stylist.stylist_id = '$stylist_id'";
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
                            <input type='checkbox' name='service_id[]' value='".$row['service_id']."'>Add
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo '<tr>';
                echo '<td><h2>No Record Found.</h2></td>';
                echo '</tr>';
            }
            ?>
            <tr>
                <td><input class="submit_button" type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
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