<?php
require_once(dirname(__FILE__) . '/../config/functions.php');
$name = $_POST['usernamesignup'];
$code = $_POST['verifycodesignup'];
$password = $_POST['passwordsignup'];
$pwd_again = $_POST['passwordsignup_confirm'];

if ($code != "1") {
    echo "<script type='text/javascript'>alert('Wrong verify code!');location='/../gecompetition/index.html#toregister';</script>";

} else if ($password != $pwd_again) {
    echo "<script type='text/javascript'>alert('The passwords did not match!');location='/../gecompetition/index.html#toregister';</script>";
} else {
    $conn = connectdb();
//找出最大的cid
    $max = mysqli_query($conn,"SELECT MAX(cid) FROM admin");
    $max_arr = mysqli_fetch_assoc($max);
    $cid = $max_arr['MAX(cid)']+1;

    mysqli_query($conn,"INSERT INTO admin(cid, username, password) VALUES ($cid, '$name', '$password')");
    if (mysqli_errno($conn)){
        echo mysqli_err($conn);
    }else{
        echo "<script type='text/javascript'>alert('Sing up successfully!');location='/../gecompetition/index.html';</script>";
    }
}

?>  