<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body >
<?php
/**
 * Created by PhpStorm.
 * User: 70243
 * Date: 2016/3/31
 * Time: 21:17
 */

if (!isset($_POST["ID"])){
    die("Please enter the ID!");
}

if (!isset($_POST["Name"])){
    die("Please enter the name");
}

$ID = $_POST["ID"];
if(empty($ID)){
    die("ID is empty");
}
$name = $_POST["Name"];
if (empty($name)){
    die("Name is empty");
}

//引入funciton.php文件
require_once (dirname(__FILE__) . '/../config/functions.php');

$conn = connectdb();

//插入之前一定要转成指定的类型，可以防止SQL注入攻击
$age = intval($age);

//找出最大的cid
$max = mysqli_query($conn,"SELECT MAX(cid) FROM engineers");
$max_arr = mysqli_fetch_assoc($max);
$cid = $max_arr['MAX(cid)']+1;

//插入的如果是字符串，一定要''起来，如果是int，一定先转换下，防止SQL攻击
mysqli_query($conn,"INSERT INTO engineers(cid, E_ID, E_Name) VALUES ($cid, '$ID', '$name')");
if (mysqli_errno($conn)){
    echo mysqli_err($conn);
}else{
    header("Location:allengineers.php");
}
?>
</body>
</html>