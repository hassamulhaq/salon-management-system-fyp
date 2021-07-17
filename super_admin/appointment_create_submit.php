<?php

if (isset($_POST['submit'])) {
    require_once '../database_connection.php';

    $salon_id = $_POST['salon_id'];
    $stylist_id = $_POST['stylist_id'];
    $user_id = $_POST['user_id'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $note = $_POST['note'];

    #join Date set by php function date()
    $created_date = date('Y-m-d');


    $sql = "INSERT INTO tbl_appointment(salon_id, stylist_id, user_id, appointment_date, appointment_time, note, created_date) VALUES ('$salon_id','$stylist_id','$user_id','$appointment_date','$appointment_time','$note','$created_date')";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        exit('<h1>Appointment Submitted Successfully.<a href="appointment_create.php">Back</a> </h1>');
    }
    else {
        exit('System Error');
    }


}