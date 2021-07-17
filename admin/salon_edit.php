<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Salon</title>
    <link rel="stylesheet" type="text/css" href="../include_files/mystyle.css">
    <style type="text/css">
        form {
            padding: 10px;
            background-color: #d3d3d340; /*light grey*/
            width: 50%;
            margin: 0 auto;
        }
        table {
            width: 100%;
        }
        .txt_input {
            padding: 5px;
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

$salon_id = $_GET['id'];

require_once '../database_connection.php';
$sql = "SELECT * FROM tbl_salon WHERE salon_id = '$salon_id'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form action="salon_update.php" method="post" enctype="multipart/form-data">
    <div align="center">
        <h1>Update: <u><?php echo $row['name']?></u></h1>
        <img src="<?php echo $row['logo_image']; ?>" width="120">
    </div>
    <table border="0">
        <tr>
            <td><input type="hidden" name="salon_id" value="<?php echo $row['salon_id']; ?>"></td>
        </tr>
        <tr>
            <td><strong>Salon Name</strong></td>
            <td><input class="txt_input" type="text" name="salonName" required="" value="<?php echo $row['name']?>"></td>
        </tr>
        <tr>
            <td><strong>Contact Number</strong></td>
            <td><input class="txt_input" type="number" name="contactNo" required="" value="<?php echo $row['contact_no']?>"></td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td><input class="txt_input" type="text" name="email" required="" value="<?php echo $row['email']?>"></td>
        </tr>
        <tr>
            <td><strong>Salon Logo</strong></td>
            <td><input class="txt_input" type="file" name="profileImage" required=""></td>
        </tr>
        <tr>
            <td><strong>Country</strong></td>
            <td><input class="txt_input" type="text" name="country" required="" value="<?php echo $row['country']?>"></td>
        </tr>
        <tr>
            <td><strong>Province</strong></td>
            <td><input class="txt_input" type="text" name="province" required="" value="<?php echo $row['province']?>"></td>
        </tr>
        <tr>
            <td><strong>City</strong></td>
            <td><input class="txt_input" type="text" name="city" required="" value="<?php echo $row['city']?>"></td>
        </tr>
        <tr>
            <td><strong>Address</strong></td>
            <td>
                <textarea class="txt_input" name="address" required="" rows="5"><?php echo $row['address']?></textarea>
            </td>
        </tr>
        <tr>
            <td><strong>Zip Code</strong></td>
            <td><input class="txt_input" type="text" name="zipCode" required="" value="<?php echo $row['zip_code']?>"></td>
        </tr>
        <tr>
            <td><strong>Opening Time</strong></td>
            <td><input class="txt_input" type="time" name="openingTime" required="" value="<?php echo $row['opening_time']?>"></td>
        </tr>
        <tr>
            <td><strong>Closing Time</strong></td>
            <td><input class="txt_input" type="time" name="closingTime" required="" value="<?php echo $row['closing_time']?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><button class="txt_input" type="submit" name="submit">Submit</button></td>
        </tr>
    </table>
</form>

<script src="../include_files/jquery-3.1.1/jquery.min.js"></script>

</body>
</html>