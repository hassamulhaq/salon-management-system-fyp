<?php
$salon_id = $_GET['id'];
require_once '../database_connection.php';

$sql = "DELETE FROM tbl_salon WHERE salon_id='$salon_id'";
$stmt = $conn->prepare($sql);
if($stmt->execute()){
    echo '<h1>Salon Deleted Successfully. <a href="salon_manage.php">Back</a></h1>';
}
else {
    echo '<h1>Salon Not Deleted. <a href="salon_manage.php">Back</a></h1>';
}