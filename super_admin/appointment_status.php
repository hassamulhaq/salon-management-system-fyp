<?php



    if (isset($_GET['appointment_id'])) {
        $appointment_id = $_GET['appointment_id'];
        require_once '../database_connection.php';

        $sql1 = "SELECT appointment_id,status FROM tbl_appointment WHERE appointment_id = '$appointment_id'";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->execute();
        $result = $stmt1->fetch(PDO::FETCH_ASSOC);
        $status = $result['status'];

        print_r($status);

        if ($status == 1) {
            echo 'complete';
            $sql2 = "UPDATE tbl_appointment SET status=0 WHERE appointment_id='$appointment_id'";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->execute();
            if ($stmt2){
                header('location:appointment_manage.php?status=0');
            }
        }
        else {
            $sql3 = "UPDATE tbl_appointment SET status=1 WHERE appointment_id='$appointment_id'";
            $stmt3 = $conn->prepare($sql3);
            $stmt3->execute();
            if ($stmt3){
                header('location:appointment_manage.php?status=1');
            }
        }
    }