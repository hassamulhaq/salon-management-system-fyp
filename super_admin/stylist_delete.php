<?php
$stylist_id = $_GET['id'];
require_once '../database_connection.php';

$sql = "DELETE FROM tbl_stylist WHERE stylist_id=$stylist_id";
$stmt = $conn->prepare($sql);
if($stmt->execute()){
    echo '<h1>Stylist Deleted Successfully. <a href="stylist_manage.php">Back</a></h1>';
}
else {
    echo '<h1>Stylist Not Deleted. <a href="stylist_manage.php">Back</a></h1>';
}


