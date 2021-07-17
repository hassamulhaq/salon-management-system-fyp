<?php



    if (isset($_GET['appointment_id'])) {
        $appointment_id = $_GET['appointment_id'];
        require_once '../database_connection.php';

        $sql = "SELECT appointment_id,status FROM tbl_appointment WHERE appointment_id = '$appointment_id'";
        $fire = $conn->query($sql);
        $result = $fire->fetch(PDO::FETCH_ASSOC);
        $status = $result['status'];

        print_r($status);

        if ($status == 1) {
            echo 'complete';
            $sql1 = "UPDATE tbl_appointment SET status=0 WHERE appointment_id='$appointment_id'";
            $fire1 = $conn->exec($sql1);
            if ($fire1){
                header('location:appointment_manage.php?status=0');
            }
        }
        else {
            $sql2 = "UPDATE tbl_appointment SET status=1 WHERE appointment_id='$appointment_id'";
            $fire2 = $conn->exec($sql2);
            if ($fire2){
                header('location:appointment_manage.php?status=1');
            }
        }
    }