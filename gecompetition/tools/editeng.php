<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>editeng</title>
</head>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: 70243
 * Date: 2016/4/2
 * Time: 12:04
 */

//区分错误的情况，isset确保了id是设置了的，empty确保id里面有值
//if (isset($GET['name'])&&!empty($GET['name'])){
//
//}

//引入funciton.php文件
require_once (dirname(__FILE__) . '/../config/functions.php');

if (!empty($_GET['name'])){

    $name = $_GET['name'];

    $conn = connectdb();
    $result = mysqli_query($conn,"SELECT * FROM engineers WHERE E_Name = '$name'");

    if (mysqli_errno($conn)){
        die('Can not connect to db');
    }

    $arr = mysqli_fetch_assoc($result);
    print_r($arr);

}else{
    die('name is not define');
}
?>

<!--将表单呈现出来-->
<form action="editeng_server.php" method="get">
    <div>ID:
        <input type="text" name="id" value="<?php echo $arr['E_ID'];?>">
    </div>
    <div>Name:
        <input type="text" name="name" value="<?php echo $arr['E_Name'];?>">
    </div>
<!--传递一个不会改变的值-->
    <div>
        <input type="hidden" name="cid" value="<?php echo $arr['cid'];?>">
    </div>
    <input type="submit" value="Submit">
</form>

</body>
</html>
    
