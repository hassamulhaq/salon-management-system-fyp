<?php
    $user_id = $_GET['id'];
    require_once '../database_connection.php';

    $sql = "DELETE FROM tbl_user WHERE user_id=$user_id";
    $stmt = $conn->prepare($sql);
    if($stmt->execute()){
        echo '<h1>User Deleted Successfully. <a href="user_manage.php">Back</a></h1>';
    }
    else {
        echo '<h1>User Not Deleted. <a href="user_manage.php">Back</a></h1>';
    }


