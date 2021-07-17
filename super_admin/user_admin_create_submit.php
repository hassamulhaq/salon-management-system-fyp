<?php session_start();
if (isset($_POST['submit'])) {
    $target_dir = '../include_files/image/';
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
    $role = $_POST['role'];
    #join Date set by php function date()
    $join_date = date('Y-m-d');


    if ($password !== $confirmPassword) {
        exit('<h1>Password and Confirm Password Do not Matched</h1>');
    }


    if ($size > 999999) { //999999 = 1MB
        exit('<h1>Image file size is must be 1 MB</h1>');
    }

    if ($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'PNG' or $ext == 'JPG' or $ext == 'JPEG') {
        require_once '../database_connection.php';
        $uploaded = move_uploaded_file($tmp_dir, $target_dir);
        if ($uploaded) {
            $sql = "INSERT INTO tbl_user(first_name, last_name, phone, email, profile_image, gender, password, role, join_date) VALUES ('$firstName', '$lastName', '$phone', '$email', '$target_dir', '$gender', '$password', '$role', '$join_date')";
            $stmt = $conn->prepare($sql);
            if ($stmt->execute()) {
                exit('<h1>Create User-signup successful. <a href="super_admin_dashboard.php">Dashboard</a></h1>');
            }
            else {
                exit('<h1>System Error</h1>');
            }
        }
    }
    else {
        exit('<h1>Invalid File, Upload only image (Png, Jpeg)</h1>');
    }
}
else {
    echo "error";
}