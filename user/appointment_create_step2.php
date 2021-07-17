<?php
    session_start();
    $salon_id = $_POST['salon_id'];
    require_once '../database_connection.php';
    $sql1 = "SELECT * FROM tbl_salon WHERE salon_id='$salon_id'";
    $fire1 = $conn->query($sql1);
    $row = $fire1->fetch(PDO::FETCH_ASSOC);
    $salon_name = $row['name'];
    echo '<pre>';
    //print_r($_SESSION);
    echo '</pre>';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Salon</title>
    <link rel="stylesheet" type="text/css" href="../include_files/mystyle.css">
    <style type="text/css">
        body {
            background-color: palevioletred;
        }
        form {
            padding-top: 30px;
            padding-left: 100px;
            padding-right: 100px;
            background-color: #d3d3d340; /*light grey*/
            width: 70%;
            margin: 0 auto;
        }
        table {
            width: 100%;
        }
        .txt_input {
            padding: 7px;
            margin: 5px;
            width: 80%;
        }
        button {
            padding: 5px;
            margin: 5px;
            width: 70%;
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php include_once "../navigation.php"; ?>
<?php
if (!isset($_SESSION['user_session']) and !isset($_SESSION['admin_session']) and !isset($_SESSION['super_admin_session']) and !isset($_SESSION['stylist_session'])) {
    exit('<h1 align="center">Login Required For Appointment</h1>');
}
?>

<form action="appointment_create_submit.php" method="post" enctype="multipart/form-data">
    <h1>Make an Appointment</h1>
    <hr>
    <input type="hidden" name="salon_id" value="<?php echo $salon_id; ?>">
    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_session']['user_id']; ?>">
    <table border="0">
        <tr>
            <td><strong>Selected Salon</strong></td>
            <!-- <td><input class="txt_input" type="text" name="salon_name" readonly="" value="--><?php //echo $salon_name;?><!--"></td>-->
            <td><p class="txt_input" style="color: white;"><?php echo $salon_name?></p></td>
        </tr>
        <tr>
            <td><strong>Choose Stylist</strong></td>
            <td>
                <select class="txt_input" name="stylist_id" required="">
                    <option value="">Choose Stylist Working At <?php echo $salon_name ?> </option>
                    <?php
                    $sql1 = "SELECT
                                tbl_hire_stylist_service.hire_service_id,
                                tbl_stylist.stylist_id,
                                tbl_stylist.username
                            FROM
                                tbl_hire_stylist_service
                            INNER JOIN tbl_stylist ON tbl_hire_stylist_service.stylist_id = tbl_stylist.stylist_id
                            WHERE
                                tbl_hire_stylist_service.salon_id = '$salon_id'
                            ";
                    $fire1 = $conn->query($sql1);
                    if ($fire1->rowCount() > 0) {
                        while ($row = $fire1->fetch(PDO::FETCH_ASSOC)){
                            echo "<option value='".$row['stylist_id']."'>".$row['username']."</option>";
                        }
                    }
                    else {
                        echo "<option disabled>No Stylist Working At This Salon (Choose Other Salon)</option>";
                        exit();
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><strong>Your Name</strong></td>
            <td><input class="txt_input" type="text" name="username" required="" value="<?php echo $_SESSION['user_session']['first_name'].' '.$_SESSION['user_session']['last_name']?>" readonly=""></td>
        </tr>
        <tr>
            <td><strong>Choose Date</strong></td>
            <td><input class="txt_input" type="date" name="appointment_date" required></td>
        </tr>
        <tr>
            <td><strong>Choose Time</strong></td>
            <td><input class="txt_input" type="time" name="appointment_time" required></td>
        </tr>
        <tr>
            <td>Note</td>
            <td>
                <textarea class="txt_input" name="note"></textarea>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><button class="txt_input" type="submit" name="submit">Add Appointment</button></td>
        </tr>
    </table>
</form>

<script src="../include_files/jquery-3.1.1/jquery.min.js"></script>

</body>
</html>
