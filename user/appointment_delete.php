<?php
session_start();
$appointment_id= $_GET['appointment_id'];

require_once '../database_connection.php';

$sql = "DELETE FROM tbl_appointment WHERE appointment_id='$appointment_id'";
$result = $conn->exec($sql);
if($result){
    echo '<h1>Deleted Successfully. <a href="appointment_manage.php">Back</a></h1>';
}
else {
    echo '<h1>Not Deleted. <a href="appointment_manage.php">Back</a></h1>';
}