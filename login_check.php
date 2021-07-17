<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Salon</title>
    <link rel="stylesheet" type="text/css" href="include_files/mystyle.css">
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
    <?php include_once "navigation.php"; ?>
<?php

if (isset($_POST['login_button'])) {

    require_once 'database_connection.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // if stylist
    if ($role == 'stylist') {
        $sql = "SELECT stylist_id, username, email, password, services FROM tbl_stylist WHERE email='$email'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($password === $result['password']) {
                $_SESSION['stylist_session'] = [
                    'user_id' => $result['stylist_id'],
                    'username' => $result['username'],
                    'email' => $result['email'],
                    'services' => $result['services']
                ];
                header('location:stylist/stylist_dashboard.php');
            }
        else {
                exit('<h1>Invalid Email or Password</h1>');
            }
        }
        else {
            exit('<h1>No User Found.</h1>');
        }
    }



    //if role is selected user
    if ($role == 'user') {
        $sql = "SELECT user_id, first_name, last_name, email, password, role FROM tbl_user WHERE email='$email' AND role='$role'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($password === $result['password']) {
                $_SESSION['user_session'] = [
                    'user_id' => $result['user_id'],
                    'first_name' => $result['first_name'],
                    'last_name' => $result['last_name'],
                    'email' => $result['email'],
                    'role' => $result['role']
                ];
                //exit ('Login Successful');
                header('location:user/profile.php');
            }
            else {
                exit('<h1>Invalid Email or Password</h1>');
            }
        }
        else {
            exit('<h1>No User Found.</h1>');
        }
    }

    //if role is selected admin
    if ($role == 'admin') {
        $sql = "SELECT user_id, first_name, last_name, email, password, role FROM tbl_user WHERE email='$email' AND role='$role'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($password === $result['password']) {
                $_SESSION['admin_session'] = [
                    'user_id' => $result['user_id'],
                    'first_name' => $result['first_name'],
                    'last_name' => $result['last_name'],
                    'email' => $result['email'],
                    'role' => $result['role']
                ];
                //exit ('Login Successful');
                header('location:admin/admin_dashboard.php');
            }
            else {
                exit('<h1>Invalid Email or Password</h1>');
            }
        }
        else {
            exit('<h1>No User Found.</h1>');
        }
    }

    //if role is selected super-admin
    if ($role == 'super-admin') {
        $sql = "SELECT user_id, first_name, last_name, email, password, role FROM tbl_user WHERE email='$email' AND role='$role'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($password === $result['password']) {
                $_SESSION['super_admin_session'] = [
                    'user_id' => $result['user_id'],
                    'first_name' => $result['first_name'],
                    'last_name' => $result['last_name'],
                    'email' => $result['email'],
                    'role' => $result['role']
                ];
                //exit ('Login Successful');
                header('location:super_admin/super_admin_dashboard.php');
            }
            else {
                exit('<h1>Invalid Email or Password</h1>');
            }
        }
        else {
            exit('<h1>No User Found.</h1>');
        }
    }
}
else {
    exit ('error');
}