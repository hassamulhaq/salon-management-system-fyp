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

<form action="user_admin_create_submit.php" method="post" enctype="multipart/form-data">
    <h1>Create New Form</h1>
    <hr>
    <table border="0">
        <tr>
            <td><strong>First Name</strong></td>
            <td><input class="txt_input" type="text" name="firstName" required></td>
        </tr>
        <tr>
            <td><strong>Last Name</strong></td>
            <td><input class="txt_input" type="text" name="lastName" required></td>
        </tr>
        <tr>
            <td><strong>Phone Number</strong></td>
            <td><input class="txt_input" type="number" name="phone" required></td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td><input class="txt_input" type="text" name="email" required></td>
        </tr>
        <tr>
            <td><strong>Profile Image</strong></td>
            <td><input class="txt_input" type="file" name="profileImage" required></td>
        </tr>
        <tr>
            <td><strong>Gender</strong></td>
            <td>
                <input type="radio" name="gender" value="Male" checked> Male
                <input type="radio" name="gender" value="Female"> Female
            </td>
        </tr>
        <tr>
            <td><strong>Password</strong></td>
            <td><input class="txt_input" type="password" name="password" required></td>
        </tr>
        <tr>
            <td><strong>Confirm Password</strong></td>
            <td><input class="txt_input" type="password" name="confirmPassword" required></td>
        </tr>
        <tr>
            <td><strong style="color: red;">Role</strong></td>
            <td>
                <input type="radio" name="role" value="user" checked> user
                <input type="radio" name="role" value="admin"> admin
            </td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" name="submit">Submit</button></td>
        </tr>
    </table>
</form>

<script src="../include_files/jquery-3.1.1/jquery.min.js"></script>

</body>
</html>