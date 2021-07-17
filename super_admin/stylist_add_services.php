<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Salon</title>
    <link rel="stylesheet" type="text/css" href="../include_files/mystyle.css">
    <style type="text/css">
        form {
            padding: 10px;
            background-color: #d3d3d340; /*light grey*/
            width: 90%;
            margin: 0 auto;
        }
        table {
            width: 100%;
        }
        .txt_input {
            padding: 5px;
            margin: 5px;
            width: 80%;
        }

        .add_service_button {
            background-color: lightgrey;
            padding: 10px;
            font-size: 20px;
        }
        .add_service_button:hover {
            background-color: gold;
        }
        .submit_button {
            padding: 10px;
            margin: 3px;
            background-color: skyblue;
            color: white;
            font-size: 20px;
        }
        .remove_button {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
<?php include_once "../navigation.php"; ?>

<?php

$user_id = $_SESSION['stylist_session']['user_id'];

require_once '../database_connection.php';
$sql = "SELECT * FROM tbl_stylist WHERE stylist_id = '$user_id'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form action="stylist_add_services_submit.php" method="post" enctype="multipart/form-data">
    <div>
        <input type="hidden" name="user_id" value="<?php echo $row['stylist_id']; ?>">
        <h1>Username: <u><?php echo $row['username']; ?></u></h1>
    </div>
    <div>
        <h2>Add Service</h2>
        <input class="txt_input" type="text" name="services" required="">
    </div>
    <br>
    <div class="add_service_div"></div>
    <button class="submit_button" type="submit" name="submit">Add Services</button>
</form>
<script src="../include_files/jquery-3.1.1/jquery.min.js"></script>
</body>
</html>