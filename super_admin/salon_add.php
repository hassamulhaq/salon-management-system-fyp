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
            padding: 10px;
            background-color: #d3d3d340; /*light grey*/
            width: 70%;
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

<form action="salon_add_submit.php" method="post" enctype="multipart/form-data">
    <h1>Add New Salon</h1>
    <hr>
    <table border="0">
        <tr>
            <td><strong>Salon Name</strong></td>
            <td><input class="txt_input" type="text" name="salonName" required></td>
        </tr>
        <tr>
            <td><strong>Contact Number</strong></td>
            <td><input class="txt_input" type="number" name="contactNo" required></td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td><input class="txt_input" type="text" name="email" required></td>
        </tr>
        <tr>
            <td>Salon Logo</td>
            <td><input class="txt_input" type="file" name="profileImage" required=""></td>
        </tr>
        <tr>
            <td><strong>Country</strong></td>
            <td><input class="txt_input" type="text" name="country" required></td>
        </tr>
        <tr>
            <td><strong>Province</strong></td>
            <td><input class="txt_input" type="text" name="province" required></td>
        </tr>
        <tr>
            <td><strong>City</strong></td>
            <td><input class="txt_input" type="text" name="city" required></td>
        </tr>
        <tr>
            <td><strong>Address</strong></td>
            <td>
                <textarea class="txt_input" name="address" required="" rows="5"></textarea>
            </td>
        </tr>
        <tr>
            <td><strong>Zip Code</strong></td>
            <td><input class="txt_input" type="text" name="zipCode" required></td>
        </tr>
        <tr>
            <td><strong>Opening Time</strong></td>
            <td><input class="txt_input" type="time" name="openingTime" required></td>
        </tr>
        <tr>
            <td><strong>Closing Time</strong></td>
            <td><input class="txt_input" type="time" name="closingTime" required></td>
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