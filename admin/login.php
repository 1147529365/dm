<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>登录后台</title>
    <link rel="icon" href="favicon.ico" type="image/ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/materialdesignicons.min.css" rel="stylesheet">
    <link href="css/style.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fff;
        }
        .lyear-login-box {
            position: relative;
            overflow-x: hidden;
            width: 100%;
            height: 100%;
            -webkit-transition: 0.5s;
            -o-transition: 0.5s;
            transition: 0.5s;
        }
        .lyear-login-left {
            width: 50%;
            top: 0;
            left: 0;
            bottom: 0;
            position: fixed;
            height: 100%;
            z-index: 555;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }
        .lyear-overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 10;
            background: rgba(0, 0, 0, 0.5);
        }
        .lyear-logo {
            margin-bottom: 50px;
        }
        .lyear-featured {
            z-index: 12;
            position: absolute;
            bottom: 0;
            padding: 30px;
            width: 100%;
        }
        .lyear-featured h4 {
            color: #fff;
            line-height: 32px;
        }
        .lyear-featured h4 small {
            color: #fff;
            display: block;
            text-align: right;
            margin-top: 15px;
        }
        .lyear-login-right {
            margin-left: 50%;
            position: relative;
            z-index: 999;
            padding: 100px;
            background-color: #fff;
        }
        @media screen and (max-width: 1024px) {
            .lyear-login-right {
                padding: 50px;
            }
        }
        @media screen and (max-width: 820px) {
            .lyear-login-left {
                width: 100%;
                position: relative;
                z-index: 999;
                height: 300px;
            }
            .lyear-login-right {
                margin-left: 0;
            }
        }
        @media screen and (max-width: 480px) {
            .lyear-login-right {
                padding: 50px;
            }
        }
        @media screen and (max-width: 320px) {
            .lyear-login-right {
                padding: 30px;
            }
        }
    </style>
</head>

<body>
<div class="lyear-login-box">
    <div class="lyear-login-left" style="background-image: url(https://img.gejiba.com/images/d20bddcd512182ca40c5b0d38a417eb6.jpg)">
        <div class="lyear-overlay"></div>
        <div class="lyear-featured">
            <h4>愿你有好运气，如果没有，愿你在不幸中学会慈悲；愿你被很多人爱，如果没有，愿你在寂寞中学会宽容。<small> - 刘瑜《愿你慢慢长大》</small></h4>
        </div>
    </div>
    <div class="lyear-login-right">

        <div class="lyear-logo text-center">
<!--            <a href="#!"><img src="images/logo-sidebar.png" alt="logo" /></a>-->
        </div>
        <form action="loginPost.php" method="post">
            <div class="form-group">
                <label for="username">用户名</label>
                <input type="text" name="user" class="form-control" id="username" placeholder="请输入您的用户名">
            </div>

            <div class="form-group">
                <label for="password">密码</label>
                <input type="password" name="pw" class="form-control" id="password" placeholder="请输入您的密码">
            </div>


            <div class="form-group">
                <button class="btn btn-block btn-primary" type="submit">立即登录</button>
            </div>
            <footer class="text-center">
                <p class="m-b-0">Copyright © <?php echo date("Y") ?> <a href="/">Ki</a>. All right reserved</p>
            </footer>
        </form>

    </div>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript">;</script>
</body>
</html>