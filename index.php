<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Salon</title>
    <link rel="stylesheet" type="text/css" href="include_files/mystyle.css">
    <style>
        body {
            background-color: palevioletred;
        }
        .homepage {
            background-color: #d3d3d340;
            text-align: center;
            padding: 10px;
        }
        .search_input {
            display: inline-block;
        }
        .txt_input {
            padding: 5px;
            font-size: 18px;
        }
        .result {
            padding: 5px;
            border: 2px solid grey;
            margin: 5px;
        }
        * {
            box-sizing: border-box;
        }
        .main_div {
            padding: 5px;
            text-align: center;
        }
        .sub_div{
            width: 30%;
            display: inline-block;
            margin: 5px;
        }
    </style>
</head>
<body>
	<?php include_once "navigation.php"; ?>
     <img src="include_files/image/slider-1.jpg" style="width: 100%">
    <div class="homepage">
        <h2>Search Salon By</h2>
        <form action="user/search_by_name_area_city.php" method="get">
            <div class="search_input">
                <input class="txt_input" type="text" name="salon_name" placeholder="Name">
                <input class="txt_input" type="text" name="salon_area_location" placeholder="Area Location">
                <input class="txt_input" type="text" name="salon_city" placeholder="City">
                <input class="txt_input" type="submit" value="Search">
            </div>
        </form>
    </div>



    <br>




    <div class="main_div">
        <h1><u>Our Work</u></h1>
        <div class="sub_div">
            <img src="include_files/image/icon/1.png">
            <h3>Best Salon</h3>
            <p>
                Salon project several day on consuming on this project.
                Salon project several day on consuming on this project.
                Salon project several day on consuming on this project.
            </p>
        </div>

        <div class="sub_div">
            <img src="include_files/image/icon/2.png">
            <h3>Best Salon</h3>
            <p>
                Salon project several day on consuming on this project.
                Salon project several day on consuming on this project.
                Salon project several day on consuming on this project.
            </p>
        </div>

        <div class="sub_div">
            <img src="include_files/image/icon/3.png">
            <h3>Best Salon</h3>
            <p>
                Salon project several day on consuming on this project.
                Salon project several day on consuming on this project.
                Salon project several day on consuming on this project.
            </p>
        </div>

        <div class="sub_div">
            <img src="include_files/image/icon/4.png">
            <h3>Best Salon</h3>
            <p>
                Salon project several day on consuming on this project.
                Salon project several day on consuming on this project.
                Salon project several day on consuming on this project.
            </p>
        </div>

        <div class="sub_div">
            <img src="include_files/image/icon/5.png">
            <h3>Best Salon</h3>
            <p>
                Salon project several day on consuming on this project.
                Salon project several day on consuming on this project.
                Salon project several day on consuming on this project.
            </p>
        </div>

        <div class="sub_div">
            <img src="include_files/image/icon/6.png">
            <h3>Best Salon</h3>
            <p>
                Salon project several day on consuming on this project.
                Salon project several day on consuming on this project.
                Salon project several day on consuming on this project.
            </p>
        </div>
    </div>



    <br>
    <br>



    <div class="" style="background-color: #d3d3d340; padding: 10px">
        <h2>Completed Appointments</h2>
        <?php
        require_once "database_connection.php";
        $sql = "SELECT * FROM tbl_appointment WHERE status = 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount()) {
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='result'>";
                echo "<strong>Completed On: </strong>";
                echo $result['created_date'];
                echo "<br>";
                echo $result['note'];
                echo "</div>";
            }
        }
        ?>
    </div>


    <br>
    <br>



    <div class="" style="background-color: #d3d3d340; padding: 10px">
        <h2>Best Stylist</h2>
        <?php
        require_once "database_connection.php";
        $sql = "SELECT
                    *
                FROM
                    tbl_stylist_rate
                INNER JOIN tbl_stylist WHERE tbl_stylist_rate.stylist_id = tbl_stylist.stylist_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount()) {
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='result'>";
                echo "<img height='12' src='include_files/".$result['profile_image']."'>";
                echo " ";
                echo $result['username'];
                echo "</div>";
            }
        }
        ?>
    </div>


    <br>
    <br>
    <br>
    <br>
    <br>
    <br>













	



	
    <script src="include_files/jquery-3.1.1/jquery.min.js"></script>
</body>
</html>