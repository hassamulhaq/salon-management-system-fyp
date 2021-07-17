<?php
/**
 * Created by PhpStorm.
 * User: devHassam
 * Date: 12/25/2019
 * Time: 10:21 AM
 */

if (isset($_POST['submit'])) {
    require_once '../database_connection.php';
    $user_id = $_POST['user_id'];
    $services = $_POST['services'];
    $service_date = date('Y-m-d');
    $sql2 = "INSERT INTO tbl_stylist_services(stylist_id, service, service_date) VALUES ('$user_id', '$services', '$service_date')";
    $stmt = $conn->prepare($sql2);
    if ($stmt->execute()) {
        exit('<h1>Added successful. <a href="stylist_add_services.php">Back Dashboard</a></h1>');
    } else {
        exit('error');
    }
}
