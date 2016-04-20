<?php
/**
 * Created by PhpStorm.
 * User: 70243
 * Date: 2016/4/2
 * Time: 16:48
 */

require_once (dirname(__FILE__) . '/../config/functions.php');

if (!empty($_GET['name'])){
    $name = $_GET['name'];

    $conn = connectdb();
    $result = mysqli_query($conn,"DELETE FROM tools WHERE E_Name = '$name'");

    if (mysqli_errno($conn)){
        die("Fail to delete $name");
    }else{
        header('Location:alltools.php');
    }
}else{
    die('Name is empty');
}