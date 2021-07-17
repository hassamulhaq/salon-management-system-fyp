<?php

if (isset($_GET['stylist_id'])) {

    require_once "../database_connection.php";

    $stylist_id = $_GET['stylist_id'];
    $user_id = $_GET['user_id'];
    $rating = 1;


    $sql = "SELECT * FROM tbl_stylist_rate WHERE user_id='$user_id' AND stylist_id='$stylist_id'";
    $fire = $conn->query($sql);
    $result = $fire->fetch(PDO::FETCH_ASSOC);
    if ($fire->rowCount() > 0) {
        if ($result['rating'] == 1) {
            $sql2 = "UPDATE tbl_stylist_rate SET rating = 0 WHERE user_id='$user_id' AND stylist_id='$stylist_id'";
            $fire2 = $conn->exec($sql2);
            header('location:appointment_manage.php?updated');
        } else {
            $sql2 = "UPDATE tbl_stylist_rate SET rating = 1 WHERE user_id='$user_id' AND stylist_id='$stylist_id'";
            $fire2 = $conn->exec($sql2);
            header('location:appointment_manage.php?updated');
        }
    } else {
        $sql1 ="INSERT INTO tbl_stylist_rate(user_id,stylist_id,rating) VALUES ('$user_id','$stylist_id', '$rating')";
        $fire1 = $conn->exec($sql1);
        header('location:appointment_manage.php?rated');
    }
}