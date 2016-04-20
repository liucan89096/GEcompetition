<?php
/**
 * Created by PhpStorm.
 * User: 70243
 * Date: 2016/3/31
 * Time: 20:10
 */

//引入config.php文件
require_once ('config.php');

function connectdb(){
    $conn = mysqli_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PW);
    if (!$conn){
        die("Can not connect to db!");
    }
    mysqli_select_db($conn,"gecompetition");
    return $conn;
}