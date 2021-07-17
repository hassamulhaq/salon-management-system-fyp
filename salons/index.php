
<?php session_start(); ?>
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
            padding: 30px;
            background-color: #d3d3d340; /*light grey*/
            width: 400px;
            margin: 0 auto;
            border: 2px solid palevioletred;
        }
        form:hover {
            border: 1px solid lightgrey;
        }
        table {
            width: 100%;
        }
        button {
            padding: 5px;
            margin: 5px;
            width: 100%;
            font-weight: bold;
        }
        button:hover {

        }
        .img {
            width: 100%;
        }
    </style>
</head>
<body>
<?php include_once "../navigation.php"; ?>


<?php
require_once '../database_connection.php';
$sql = "SELECT * FROM tbl_salon ORDER BY salon_id DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <form action="../user/appointment_create_step2.php" method="post">
            <input type="hidden" name="salon_id" value="<?php echo $row['salon_id'] ?>">
            <table border="1" cellspacing="0">
                <tr>
                    <td colspan="2"><img class="img" src="<?php echo $row['logo_image']; ?>"></td>
                </tr>
                <tr>
                    <td>Salon</td>
                    <td><?php echo $row['name']; ?></td>
                </tr>
                <tr>
                    <td>Contact Number</td>
                    <td><?php echo $row['contact_no']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $row['email']; ?></td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td><?php echo $row['country']; ?></td>
                </tr>
                <tr>
                    <td>Province</td>
                    <td><?php echo $row['province']; ?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><?php echo $row['city']; ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><?php echo $row['address']; ?></td>
                </tr>
                <tr>
                    <td>Xip Code</td>
                    <td><?php echo $row['zip_code']; ?></td>
                </tr>
                <tr>
                    <td>Opening Time</td>
                    <td><?php echo $row['opening_time']; ?></td>
                </tr>
                <tr>
                    <td>Closing Time</td>
                    <td><?php echo $row['closing_time']; ?></td>
                </tr>
                <tr>
                    <td colspan="2"><button class="" type="submit" name="submit">Make Appointment</button></td>
                </tr>
            </table>
        </form>

    <?php } ?>
<?php } else { ?>
    <h1>No Dta Found</h1>
<?php } ?>



<script src="../include_files/jquery-3.1.1/jquery.min.js"></script>

</body>
</html>
