<?php session_start(); ?>


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
    </style>
</head>
<body>
<?php include_once "navigation.php"; ?>

<?php
    if (isset($_POST['signup_button'])) {
        $target_dir = 'include_files/image/';
        $myprofile = $_FILES['profileImage']['name'];
        $target_dir .= $myprofile;
        $tmp_dir = $_FILES['profileImage']['tmp_name'];
        $size = $_FILES['profileImage']['size'];
        $type = $_FILES['profileImage']['type'];
        $ext = pathinfo($myprofile, PATHINFO_EXTENSION);


        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $gender = $_POST['gender'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        #join Date set by php function date()
        $join_date = date('Y-m-d');


        if ($password !== $confirmPassword) {
            exit('Password and Confirm Password Do not Matched');
        }


        if ($size > 999999) { //999999 = 1MB
            exit('Image file size is must be 1 MB');
        }

        if ($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'PNG' or $ext == 'JPG' or $ext == 'JPEG') {
            require_once 'database_connection.php';
            $uploaded = move_uploaded_file($tmp_dir, $target_dir);
            if ($uploaded) {
                $sql = "INSERT INTO tbl_user(first_name, last_name, phone, email, profile_image, gender, password, join_date) VALUES ('$firstName', '$lastName', '$phone', '$email', '../$target_dir', '$gender', '$password', '$join_date')";
                $stmt = $conn->prepare($sql);
                if ($stmt->execute()) {
                    exit('<h1>signup successful</h1>');
                }
                else {
                    exit('System Error');
                }
            }
        }
        else {
            exit('Invalid File, Upload only image (Png, Jpeg)');
        }
    }
    else {
        echo "error";
    }