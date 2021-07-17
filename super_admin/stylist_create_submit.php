<?php

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    #join Date set by php function date()
    $join_date = date('Y-m-d');

    if ($password !== $confirmPassword) {
        exit('<h1>Both passwords are incorrect.</h1>');
    }

    require_once '../database_connection.php';

    $sql = "INSERT INTO tbl_stylist(username, email, password, join_date) VALUES ('$username','$email','$password', '$join_date')";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute()) {
        exit('<h1>Stylist Created Successfully. <a href="super_admin_dashboard.php">Back Dashboard</a> </h1>');
    }
    else {
        exit('System Error');
    }


}