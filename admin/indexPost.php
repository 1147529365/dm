<?php
session_start();

if (isset($_SESSION['loginUser']) && $_SESSION['loginUser'] <> '') {
    @$webName = trim($_POST['webName']);
    @$webTitle = trim($_POST['webTitle']);
    @$randomData = trim($_POST['randomData']);
    @$user = trim($_POST['user']);
    @$pw = trim($_POST['pwd']);
    @$chek = trim($_POST['chek']);
    @$filter = trim($_POST['filter']);

    if (!$chek && !$filter) {
        $chek = 0;
        $filter = 0;
    } else if (($chek == 1) && ($filter == 0)) {
        $chek = 1;
        $filter = 0;
    } else if (($chek == 0) && ($filter == 1)) {
        $chek = 0;
        $filter = 1;
    }

    if ($pw) {
        $sql = "update info set webName = '$webName',  webTitle = '$webTitle', randomData = '$randomData', user = '$user', pwd ='" . md5($pw) . "' , chek = '$chek', filter = '$filter' where user = '$user' ";
        session_destroy();
    }else{
        $sql = "update info set webName = '$webName',  webTitle = '$webTitle', randomData = '$randomData', user = '$user', chek = '$chek', filter = '$filter' where user = '$user' ";
    }


    include_once 'connect.php';

    $result = mysqli_query($connect, $sql);
    if ($result) {
        echo "<script>alert('修改成功');location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('修改失败');history.back();</script>";
    }
} else {
    echo "<script>alert('未登陆 请先登陆');location.href = 'index.php';</script>";
}