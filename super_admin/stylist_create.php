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
        .add_service_button {
            background-color: skyblue;
        }
        .submit_button {
            padding: 5px;
            margin: 5px;
            width: 70%;
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php include_once "../navigation.php"; ?>

<form action="stylist_create_submit.php" method="post" enctype="multipart/form-data">
    <h1>Create New Stylist</h1>
    <hr>
    <table border="0">
        <tr>
            <td><strong>Username</strong></td>
            <td><input class="txt_input" type="text" name="username" required></td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td><input class="txt_input" type="text" name="email" required></td>
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
            <td></td>
            <td><button class="submit_button" type="submit" name="submit">Submit</button></td>
        </tr>
    </table>
</form>

<script src="../include_files/jquery-3.1.1/jquery.min.js"></script>

</body>
</html>