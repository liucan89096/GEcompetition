<?php
/**
 * Created by PhpStorm.
 * User: 70243
 * Date: 2016/4/2
 * Time: 12:31
 */

require_once (dirname(__FILE__) . '/../config/functions.php');

if (empty($_GET['id'])){
    die("id is empty");
}
if (empty($_GET['name'])){
    die("Name is empty");
}

$id = $_GET["id"];
$name = $_GET["name"];
$cid = $_GET["cid"];

$conn = connectdb();

$result = mysqli_query($conn,"UPDATE engineers SET E_ID= '$id',E_Name='$name' WHERE cid='$cid'");

if (mysqli_errno($conn)){
    echo mysqli_error($conn);
}else{
    header("Location:alltools.php");
}