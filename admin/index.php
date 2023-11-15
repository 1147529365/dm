<?php
session_start();
include_once 'connect.php';
$sql = "select * from info  where user = '" . $_SESSION['loginUser'] . " ' ";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result)) {
    $config = mysqli_fetch_array($result);
} else {
    header("Location:login.php");
    die("参数错误");
}
?>

<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>配置信息</title>
    <link rel="icon" href="favicon.ico" type="image/ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/materialdesignicons.min.css" rel="stylesheet">
    <link href="css/style.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@400&display=swap" rel="stylesheet">
    <link href="/admin/css/loading.css" rel="stylesheet">
</head>

<div id="Loadanimation" style="z-index:999999;">
    <div id="Loadanimation-center">
        <div id="Loadanimation-center-absolute">
            <div class="xccx_object" id="xccx_four"></div>
            <div class="xccx_object" id="xccx_three"></div>
            <div class="xccx_object" id="xccx_two"></div>
            <div class="xccx_object" id="xccx_one"></div>
        </div>
    </div>
</div>
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.1.min.js"></script>
<script>
    $(function () {
        $("#Loadanimation").fadeOut(1500);
    });
</script>

<style>
    body,
    code {
        font-family: 'Noto Serif SC', serif;
        font-weight: 700;
    }

    input,
    textarea {
        font-family: 'Noto Serif SC', serif;
        font-weight: 400;
    }

    .lyear-layout-content {
        padding-left: 30px !important;
        padding: 68px 30px 30px;
        box-sizing: border-box;
    }

    .card {
        box-shadow: 0 8px 12px #ebedf0;
        border-radius: 20px;
        padding: 10px;
    }

    .form-control {
        border-radius: 6px;
        padding: 5px 15px;
    }

    .lyear-layout-header {
        padding: 0 40px;
    }

    .container-fluid {
        width: 70%;
    }

    .form-control {
        color: #a2a2a2;
    }

    .form-control:focus {
        color: #333;
    }

    @media screen and (max-width: 768px) {
        .lyear-layout-content {
            padding: 0 !important;
            padding-top: 70px !important;
        }

        .card {
            padding: 0;
        }

        .lyear-layout-header {
            padding: 0 1rem;
        }

        .container-fluid {
            width: 100%;
        }
    }
</style>

<body>
    <div class="lyear-layout-web">
        <div class="lyear-layout-container">


            <!--头部信息-->
            <header class="lyear-layout-header">

                <nav class="navbar navbar-default">
                    <div class="topbar">

                        <div class="topbar-left">
                            <div class="lyear-aside-toggler">
                                <span class="lyear-toggler-bar"></span>
                                <span class="lyear-toggler-bar"></span>
                                <span class="lyear-toggler-bar"></span>
                            </div>
                            <span class="navbar-page-title">
                                <?php echo $config['webName'] ?> - 网站配置
                            </span>
                        </div>
                        <div class="topbar-right">
                            <span
                                style="padding: 0.6rem 1.5rem;background: #f2f2f2;border-radius: 0.6rem;box-shadow: 0 0px 3px #b7babd52;"><a
                                    href="Out.php">退出</a></span>
                        </div>


                    </div>
                </nav>

            </header>
            <!--End 头部信息-->

            <!--页面主要内容-->
            <main class="lyear-layout-content">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <ul class="nav nav-tabs page-tabs">
                                    <li class="active"><a href="#!">信息配置</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active">

                                        <form action="indexPost.php" method="post" name="edit-form" class="edit-form">
                                            <div class="form-group">
                                                <label for="web_site_title">网站标题</label>
                                                <input class="form-control" type="text" id="web_site_title"
                                                    name="webName" value="<?php echo $config['webName'] ?>"
                                                    placeholder="请输入站点标题">
                                            </div>

                                            <div class="form-group">
                                                <label for="web_site_title">首页标题</label>
                                                <input class="form-control" type="text" id="web_site_title"
                                                    name="webTitle" value="<?php echo $config['webTitle'] ?>"
                                                    placeholder="请输入站点首页标题">
                                            </div>


                                            <div class="form-group">
                                                <label for="web_site_description">随机数据</label>
                                                <textarea style="resize: vertical;" class="form-control"
                                                    id="web_site_description" rows="5" name="randomData"
                                                    placeholder="请输入数据内容"><?php echo $config['randomData'] ?></textarea>
                                                <small
                                                    class="help-block">填写格式：请用半角逗号<code>（英文键盘下的逗号）</code>隔开<code>,</code>开头和结尾无需添加</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="web_site_copyright">登录账号</label>
                                                <input class="form-control" type="text" id="web_site_copyright"
                                                    name="user" value="<?php echo $config['user'] ?>"
                                                    placeholder="请输入需要修改的账号">
                                            </div>
                                            <div class="form-group">
                                                <label for="web_site_icp">登录密码</label>
                                                <input class="form-control" type="text" id="web_site_icp" name="pwd"
                                                    value="" placeholder="不修改请留空">
                                            </div>
                                            <script>

                                                function myOnClickHandler(obj) {
                                                    var input = document.getElementById("chhe");
                                                    console.log(input);
                                                    if (obj.checked) {
                                                        console.log("打开");
                                                        input.setAttribute("value", "1");
                                                    } else {
                                                        console.log("关闭");
                                                        input.setAttribute("value", "0");
                                                    }
                                                }
                                            </script>

                                            <div class="form-group">
                                                <label class="btn-block" for="web_site_status">显示打印模块</label>
                                                <label class="lyear-switch switch-light switch-pink">
                                                    <input id="chhe" type="checkbox" name="chek" value="" <?php if ($config['chek']) { ?> checked <?php } else { ?> <?php } ?>
                                                        onclick="myOnClickHandler(this)">
                                                    <span></span>
                                                </label>
                                                <small class="help-block">开启则显示首页打印模块信息，关闭后则不显示</small>
                                            </div>

                                            <script>
                                                function onClickHander(obj) {
                                                    var input = document.getElementById("filter");
                                                    console.log(input);
                                                    if (obj.checked) {
                                                        console.log("开启过滤");
                                                        input.setAttribute("value", "1");
                                                    } else {
                                                        console.log("关闭过滤");
                                                        input.setAttribute("value", "0");
                                                    }
                                                }
                                            </script>

                                            <div class="form-group">
                                                <label class="btn-block" for="web_site_status">过滤数据</label>
                                                <label class="lyear-switch switch-light switch-pink">
                                                    <input id="filter" type="checkbox" name="filter" value="" <?php if ($config['filter']) { ?> checked <?php } else { ?> <?php } ?>
                                                        onclick="onClickHander(this)">
                                                    <span></span>
                                                </label>
                                                <small class="help-block">开启则过滤单次执行重复数据，关闭后不过滤</small>
                                            </div>
                                            <div class="form-group" style="   text-align: right;">
                                                <button type="submit"
                                                    class="btn btn-w-md btn-round btn-primary">确认修改</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </main>
            <!--End 页面主要内容-->
        </div>
    </div>

    <script>
        window.onload = function () {
            var chhe = document.getElementById("chhe");
            var filter = document.getElementById("filter");
            chhe.setAttribute("value", "<?php echo $config['chek'] ?>");
            filter.setAttribute("value", "<?php echo $config['filter'] ?>");
        }
    </script>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>