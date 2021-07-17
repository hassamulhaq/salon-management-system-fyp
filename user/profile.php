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

$user_id = $_SESSION['user_session']['user_id'];

require_once '../database_connection.php';
$sql = "SELECT * FROM tbl_user WHERE user_id = '$user_id'";
$result = $conn->query($sql);
$row = $result->fetch(PDO::FETCH_ASSOC);
?>


<form action="profile_update.php" method="post" enctype="multipart/form-data">
    <div align="center">
        <h1>Profile: <u><?php echo $row['first_name']?></u></h1>
        <img src="<?php echo $row['profile_image']; ?>" width="120">
    </div>
    <br>
    <table border="0">
        <tr>
            <td><input type="hidden" name="user_id" value="<?php echo $row['user_id']?>"></td>
        </tr>
        <tr>
            <td><strong>First Name</strong></td>
            <td><input class="txt_input" type="text" name="firstName" required value="<?php echo $row['first_name']; ?>"></td>
        </tr>
        <tr>
            <td><strong>Last Name</strong></td>
            <td><input class="txt_input" type="text" name="lastName" required="" value="<?php echo $row['last_name']; ?>"></td>
        </tr>
        <tr>
            <td><strong>Phone</strong></td>
            <td><input class="txt_input" type="number" name="phone" required="" value="<?php echo $row['phone']; ?>"></td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td><input class="txt_input" type="text" name="email" required="" value="<?php echo $row['email']; ?>"></td>
        </tr>

        <tr>
            <td><strong>Profile Image</strong></td>
            <td><input class="txt_input" type="file" name="profileImage" required=""></td>
        </tr>

        <tr>
            <td><strong>Gender</strong></td>
            <td>
                <input type="radio" name="gender" value="male" checked> Male
                <input type="radio" name="gender" value="female"> Female
            </td>
        </tr>
        <tr>
        </tr>
        <tr>
            <td><strong>Password</strong></td>
            <td><input class="txt_input" type="password" name="password" required="" value="<?php echo $row['password']; ?>"></td>
        </tr>
        <tr>
            <td><strong>Confirm Password</strong></td>
            <td><input class="txt_input" type="password" name="confirmPassword" required=""></td>
        </tr>
        <tr>
        </tr>
        <tr>

        </tr>
        <tr>
            <td>
                <button type="submit" name="submit">Update</button>
                <a href="../index.php">Back</a>
            </td>
        </tr>
    </table>
</form>

<script src="../include_files/jquery-3.1.1/jquery.min.js"></script>

</body>
</html>