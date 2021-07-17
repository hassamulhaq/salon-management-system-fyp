<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Salon</title>
    <link rel="stylesheet" type="text/css" href="../include_files/mystyle.css">
    <style type="text/css">
        body {
            background-color: palevioletred;
        }
        form {
            padding-top: 30px;
            padding-left: 100px;
            padding-right: 100px;
            background-color: #d3d3d340; /*light grey*/
            width: 70%;
            margin: 0 auto;
        }
        table {
            width: 100%;
        }
        .txt_input {
            padding: 7px;
            margin: 5px;
            width: 80%;
        }
        button {
            padding: 5px;
            margin: 5px;
            width: 70%;
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php include_once "../navigation.php"; ?>

<form action="appointment_create_step2.php" method="post" enctype="multipart/form-data">
    <h1>Make an Appointment</h1>
    <hr>
    <table border="0">
        <tr>
            <td><strong>Choose Salon</strong></td>
            <td>
                <select class="txt_input" name="salon_id" required="">
                    <option value="">Choose</option>
                    <?php
                    require_once '../database_connection.php';
                    $sql1 = "SELECT * FROM tbl_salon";
                    $stmt1 = $conn->prepare($sql1);
                    $stmt1->execute();
                    while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='".$row['salon_id']."'>".$row['name']."</option>";
                    }
                ?>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><button class="txt_input" type="submit" name="submit">Submit</button></td>
        </tr>
    </table>
</form>

<script src="../include_files/jquery-3.1.1/jquery.min.js"></script>

</body>
</html>
