<?php
    session_start();

    if (isset($_SESSION['user_session']) || isset($_SESSION['admin_session'])) {
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Salon</title>
    <link rel="stylesheet" href="include_files/mystyle.css">
    <style type="text/css">
        body {
            background-color: palevioletred;
        }
        form {
            padding: 10px;
            background-color: #d3d3d340; /*light grey*/
            width: 50%; /*50% of screen*/
            margin: 0 auto; /*auto make form center*/
        }
        table {
            width: 100%;
        }
        .txt_input {
            padding: 5px;
            margin: 5px;
            width: 70%;
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
    <?php include_once "navigation.php"; ?>

    <form action="login_check.php" method="post">
        <h1>Login Form</h1>
        <hr>
        <table border="0">
            <tr>
                <td><strong>Email</strong></td>
                <td><input class="txt_input" type="text" name="email" required=""></td>
            </tr>
            <tr>
                <td><strong>Password</strong></td>
                <td><input class="txt_input" type="password" name="password" required=""></td>
            </tr>
            <tr>
                <td><strong>Role</strong></td>
                <td>
                    <label><input type="radio" name="role" value="user" checked> User</label>
                    <label><input type="radio" name="role" value="stylist"> Stylist</label>
                    <label><input type="radio" name="role" value="admin"> Admin</label>
                    <label><input type="radio" name="role" value="super-admin"> Super-Admin</label>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="login_button">Log In</button></td>
            </tr>
        </table>
    </form>
    
    <script src="include_files/jquery-3.1.1/jquery.min.js"></script>

</body>
</html>