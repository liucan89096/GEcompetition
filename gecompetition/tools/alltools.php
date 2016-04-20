<?php
//引入funciton.php这个文件
require_once(dirname(__FILE__) . '/../config/functions.php');
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <!--    外观的文件-->
    <link rel="stylesheet" type="text/css" href="css/style3.css"/>
    <script src="js/modernizr.custom.js"></script>

    <!--    table的文件-->
    <title>All Engineers</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="wrapper">
    <h1>All Engineers</h1>

    <table id="keywords" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th><span>E_ID</span></th>
            <th><span>E_Name</span></th>
            <th><span>Tool_ID</span></th>
            <th><span>Tool_Type</span></th>
            <th><span>Borrow_Time</span></th>
            <th><span>Return_Time</span></th>
            <th><span>Broken_Time</span></th>
            <th><span> </span></th>
        </tr>
        </thead>
        <tbody>
        <?php

        $conn = connectdb();
        //正常显示
        $result = mysqli_query($conn, "SELECT * FROM tools");
        //E_Name升序排列
        //$result = mysqli_query($conn,"SELECT * FROM engineers ORDER BY E_Name");
        //E_Name降序排列
        //$result = mysqli_query($conn,"SELECT * FROM engineers ORDER BY E_Name DESC");
        $dataCount = mysqli_num_rows($result);

        for ($i = 0; $i < $dataCount; $i++) {
            $result_arr = mysqli_fetch_assoc($result);

            $E_ID = $result_arr["E_ID"];
            $E_Name = $result_arr["E_Name"];
            $Tool_ID = $result_arr["Tool_ID"];
            $Tool_Type = $result_arr["Tools_Type"];
            $Borrow_Time = $result_arr["Borrow_Time"];
            $Return_Time = $result_arr["Return_Time"];
            $Broken_Time = $result_arr["Broken_Time"];

            echo "<tr style='text-align: center'><td>$E_ID</td><td><a href='editeng.php?name=$E_Name'>$E_Name</a></td><td>$Tool_ID</td><td>$Tool_Type</td><td>$Borrow_Time</td><td>$Return_Time</td><td>$Broken_Time</td><td><a href='deleteng.php?name=$E_Name'>Delete</a></td></tr>";
        }

        ?>

        </tbody>
    </table>

</div>

<div class="container">
    <nav id="bt-menu" class="bt-menu">
        <a href="#" class="bt-menu-trigger"><span>Menu</span></a>
        <ul>
            <li><a href="/../gecompetition/eng/allengineers.php" class="bt-icon icon-user-outline">All Engineers</a></li>
            <li><a href="#" class="bt-icon icon-sun">Search Engineers</a></li>
            <li><a href="/../gecompetition/eng/addeng.html" class="bt-icon icon-windows">Add Engineers</a></li>
            <li><a href="/../gecompetition/tools/alltools.php" class="bt-icon icon-speaker">All Tools</a></li>
            <li><a href="#" class="bt-icon icon-star">Search Tools</a></li>
            <li><a href="#" class="bt-icon icon-bubble">Add Tools</a></li>
        </ul>
    </nav>
</div><!-- /container -->
</body>
<script src="js/classie.js"></script>
<script src="js/borderMenu.js"></script>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://tablesorter.com/__jquery.tablesorter.min.js'></script>
<script src="js/index.js"></script>
</html>
