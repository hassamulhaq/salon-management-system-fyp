<?php
    session_start();
    $service_id = $_GET['id'];
    $stylist_id = $_SESSION['stylist_session']['user_id'];
    require_once '../database_connection.php';

    $sql = "DELETE FROM tbl_stylist_services WHERE service_id=$service_id AND stylist_id='$stylist_id'";
    $stmt = $conn->prepare($sql);
    if($stmt->execute()){
        echo '<h1>Service Deleted Successfully. <a href="stylist_dashboard.php">Back</a></h1>';
    }
    else {
        echo '<h1>Service Not Deleted. <a href="stylist_dashboard.php">Back</a></h1>';
    }