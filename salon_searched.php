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
            padding: 50px;
            text-align: center;
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
<!-- <img src="include_files/image/slides.png" height="500"> -->




<div class="homepage">
    <h1 style="text-align: center;">Virtual University Project</h1>
    <hr>
    <br>
    <br>
    <br>
    <form action="salon_searched.php" method="post">
        <div class="search_input">
            <strong>Search Salon</strong>
            <br>
            <input class="txt_input" type="text" name="salon_name" required="">
        </div>
        <div class="search_input">
            <input class="txt_input" name="submit" type="submit" value="Search">
        </div>
    </form>
</div>



<br>
<br>

<div class=""></div>

<br>
<br>
<br>
<br>
<br>


















<script src="include_files/jquery-3.1.1/jquery.min.js"></script>
</body>
</html>