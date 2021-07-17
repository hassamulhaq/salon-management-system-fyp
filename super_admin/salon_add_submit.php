<?php session_start();
if (isset($_POST['submit'])) {
    $target_dir = '../include_files/image/';
    $myprofile = $_FILES['profileImage']['name'];
    $target_dir .= $myprofile;
    $tmp_dir = $_FILES['profileImage']['tmp_name'];
    $size = $_FILES['profileImage']['size'];
    $type = $_FILES['profileImage']['type'];
    $ext = pathinfo($myprofile, PATHINFO_EXTENSION);


    $salonName = $_POST['salonName'];
    $contactNo = $_POST['contactNo'];
    $email = $_POST['email'];

    $country = $_POST['country'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $zipCode = $_POST['zipCode'];
    $openingTime = $_POST['openingTime'];
    $closingTime = $_POST['closingTime'];
    #join Date set by php function date()
    $createDate = date('Y-m-d');

    if ($size > 999999) { //999999 = 1MB
        exit('<h1>Image file size is must be 1 MB</h1>');
    }

    if ($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'PNG' or $ext == 'JPG' or $ext == 'JPEG') {
        require_once '../database_connection.php';
        $uploaded = move_uploaded_file($tmp_dir, $target_dir);
        if ($uploaded) {
            $sql = "INSERT INTO tbl_salon(name,contact_no,email,logo_image,country,province,city,address,zip_code,opening_time,closing_time,create_date)VALUES('$salonName','$contactNo','$email','$target_dir','$country','$province','$city','$address','$zipCode','$openingTime','$closingTime','$createDate');";
            $stmt = $conn->prepare($sql);
            if ($stmt->execute()) {
                exit('<h1>Salon Created successful. <a href="salon_manage.php">BACK Salon Manage</a></h1>');
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