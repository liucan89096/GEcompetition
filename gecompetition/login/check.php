<?php
require_once(dirname(__FILE__) . '/../config/functions.php');

$name = $_POST['username'];
$password = $_POST['password'];

$conn = connectdb();
//正常显示
$result = mysqli_query($conn, "SELECT * FROM admin");

while ($result_arr = mysqli_fetch_assoc($result)) {

    if (($result_arr['username'] == $name) && ($result_arr['password'] == $password)) {

        //echo "验证成功！<br>";
        header("Location:/../gecompetition/eng/allengineers.php");

    } else

        //echo "密码错误<br>";
        echo "<script type='text/javascript'>alert('Wrong username or password!');location='/../gecompetition/index.html';</script>";

    //echo "<a href='login.php'>返回</a>";
}


?>  