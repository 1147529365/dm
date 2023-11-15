<?php
session_start();
$user = trim($_POST['user']);
$pw = trim($_POST['pw']);
include_once "connect.php";


$sql = "select * from info where user = '$user'";
$result = mysqli_query($connect, $sql);
$num = mysqli_num_rows($result);
if ($num) {
    $login_info = mysqli_fetch_array($result);
} else {
    die("<script>alert('你输入的信息有误 已停止程序执行');history.back();</script>");
}

if (($login_info['user'] == $user ) && (md5($pw) == $login_info['pwd'])) {
    $_SESSION['loginUser'] = $user;
    echo "<script>alert('登录成功');location.href = 'index.php';</script>";
} else {
    unset($_SESSION['loginUser']);
    echo "<script>alert('登录失败，用户名或密码错误');history.back();</script>";
}

?>