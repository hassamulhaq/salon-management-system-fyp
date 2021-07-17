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
            width: 90%;
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
        .txt_service_input {
            padding: 5px;
            margin: 5px;
            width: 40%;
        }
        .add_service_button {
            background-color: skyblue;
        }
        .submit_button {
            padding: 5px;
            margin: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php include_once "../navigation.php"; ?>

<?php

$user_id = $_GET['id'];

require_once '../database_connection.php';
$sql = "SELECT * FROM tbl_stylist WHERE stylist_id = '$user_id'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form action="stylist_edit_submit.php" method="post" enctype="multipart/form-data">
    <div align="center">
        <h1>Stylist <u><?php echo $row['username']; ?></u></h1>
        <img src="<?php echo $row['profile_image']; ?>" width="120">
    </div>
    <br>
    <table border="0">
        <input type="hidden" name="user_id" value="<?php echo $row['stylist_id']; ?>">
        <tr>
            <td><strong>Username</strong></td>
            <td><input class="txt_input" type="text" name="username" required value="<?php echo $row['username'] ?>"></td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td><input class="txt_input" type="text" name="email" required value="<?php echo $row['email'] ?>"></td>
        </tr>
        <tr>
            <td><strong>Phone Number</strong></td>
            <td><input class="txt_input" type="number" name="phone" required value="<?php echo $row['phone'] ?>"></td>
        </tr>
        <tr>
            <td><strong>Address</strong></td>
            <td>
                <textarea class="txt_input" name="address" required=""><?php echo $row['address'] ?></textarea>
            </td>
        </tr>
        <tr>
            <td><strong>Gender</strong></td>
            <td>
                <input type="radio" name="gender" value="Male" checked> Male
                <input type="radio" name="gender" value="Female"> Female
            </td>
        </tr>
        <tr>
            <td><strong>Profile Image</strong></td>
            <td><input class="txt_input" type="file" name="profileImage" required></td>
        </tr>
        <tr>
            <td><strong>Password</strong></td>
            <td><input class="txt_input" type="password" name="password" required value="<?php echo $row['password'] ?>"></td>
        </tr>
        <tr>
            <td><strong>Confirm Password</strong></td>
            <td><input class="txt_input" type="password" name="confirmPassword" required></td>
        </tr>
        <tr>
            <td><a href="super_admin_dashboard.php">Back</a></td>
            <td><button class="submit_button" type="submit" name="submit">Save</button></td>
        </tr>
    </table>
</form>

<script src="../include_files/jquery-3.1.1/jquery.min.js"></script>
</body>
</html>