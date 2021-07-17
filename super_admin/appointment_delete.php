<?php
session_start();
$appointment_id= $_GET['appointment_id'];

require_once '../database_connection.php';

$sql = "DELETE FROM tbl_appointment WHERE appointment_id='$appointment_id'";
$stmt = $conn->prepare($sql);
if($stmt->execute()){
    echo '<h1>Deleted Successfully. <a href="appointment_manage.php">Back</a></h1>';
}
else {
    echo '<h1>Not Deleted. <a href="appointment_manage.php">Back</a></h1>';
}