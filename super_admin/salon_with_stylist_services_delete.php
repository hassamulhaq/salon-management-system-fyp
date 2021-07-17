<?php
session_start();
$hire_service_id = $_GET['hire_service_id'];

require_once '../database_connection.php';

$sql = "DELETE FROM tbl_hire_stylist_service WHERE hire_service_id=$hire_service_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
if($stmt){
    echo '<h1>Deleted Successfully. <a href="salon_with_stylist.php">Back</a></h1>';
}
else {
    echo '<h1>Not Deleted. <a href="salon_with_stylist.php">Back</a></h1>';
}