<?php

if (isset($_POST['submit'])) {
    $salon_id = $_POST['salon_id'];
    $stylist_id = $_POST['stylist_id'];
    $service_id = $_POST['service_id'];
    //Service date set by php function date()
    $assign_date = date('Y-m-d');

    require_once '../database_connection.php';

    $services_count = count($service_id);



    for ($i = 0; $i < $services_count; $i++) {
        $sql2 = "INSERT INTO tbl_hire_stylist_service(salon_id,stylist_id,service_id, assign_date) VALUES ('$salon_id','$stylist_id','$service_id[$i]', '$assign_date')";
        $stmt = $conn->prepare($sql2);
        $stmt->execute();
    }
    if ($stmt) {
        exit('<h1>Stylist Services Added successful. <a href="stylist_service_hire.php">Back Dashboard</a></h1>');    }
    else {
        exit('error');
    }
}