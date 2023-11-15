<!--
 * @Author: Ki. || 3439780232
 * @Date: 2022-11-05 09:23:43
 * @LastEditTime: 2022-11-06 14:10:07
 * @Description: 随机抽取系统 永恒资源网 www.yonghengzy.cn
 * @Copyright: Copyright © 2022 Ki All Rights Reserved.
-->
<?php

include_once 'admin/connect.php';
$sql = "select * from info";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result)) {
    $config = mysqli_fetch_array($result);
} else {
    die("参数错误");
}
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@400&display=swap" rel="stylesheet">
    <link href="admin/css/mian.min.css" rel="stylesheet">
    <link href="/admin/css/loading.css" rel="stylesheet">
    <title><?php echo $config['webName'] ?></title>
</head>
<body>

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
    $(function(){
        $("#Loadanimation").fadeOut(1300);
    });
</script>
<div class="title">
    <h1 id="text"><?php echo $config['webTitle'] ?></h1><b id="showAlert">使用文档</b>
</div>
<div class="box">
    <div class="content" id="content"><?php echo $config['webTitle'] ?></div>
    <button onclick="gotoRand()" id="btn">开 始</button>

    <div class="control" style="<?php if ($config['chek']){ ?> display: block;  <?php } else{ ?> display: none; <?php } ?> ">
        <div class="conl" id="delconl">
            <span>是否显示打印内容</span>
            <button onclick="setConl()" class="btn-conl" id="conl">关闭</button>
            <img src="./close.png" id="delimg"
                 onclick="del()" alt="">
        </div>
        <div class="custom" id="custom">
        </div>
    </div>
</div>
<div class="footer">
    <p>Copyright © <?php echo date("Y") ?> <a target="_blank" href="http://www.yonghengzy.cn/">下载源码</a> All Rights Reserved.</p>
</div>
<style>
    /* 适配移动端 */
    @media screen and (max-width: 768px) {
        :root {
            font-size: 12px;
        }

        .title {
            margin-top: 5rem;
        }

        .box {
            width: 95%;
            box-sizing: border-box;
            padding: 5rem 2rem;
            margin: 6rem auto 5rem;
            border-radius: 1rem;
        }

        .conl{
            width: 100%;
            box-sizing: border-box;
        }

        .content {
            width: 80%;
            padding: 1.5rem;
            font-size: 2rem;
        }

        .alert-wrap {
            width: 90% !important;
            margin-left: 0 !important;
            transform: translate(-50%);
        }
    }
</style>

<script src="/admin/js/alert.min.js"></script>
<script>

    let getTimeState = () => {
        // 获取当前时间
        let timeNow = new Date();
        // 获取当前小时
        let hours = timeNow.getHours();
        // 设置默认文字
        let text = ``;
        // 判断当前时间段
        if (hours >= 0 && hours <= 10) {
            text = `早上`;
        } else if (hours > 10 && hours <= 14) {
            text = `中午`;
        } else if (hours > 14 && hours <= 18) {
            text = `下午`;
        } else if (hours > 18 && hours <= 24) {
            text = `晚上`;
        }
        return text;
    };



    const btns = `
        <button class="btn" id="CloseAlert">确定</button>
    `;
    const tzAlert = new TzAlert({
        center: true, // 内容居中
        isShow: false, // 实例化完成直接显示
        title: {
            html: '标题',
            color: '#ff80ab',
            fontSize: '18px'
        },
        maskClose: true,
        mask: {
            use: true,
            background: 'rgba(0,0,0,.6)'
        },
        tips: {
            html: '提示'
        },
        content: {
            html: '内容'
        },
        onEvents(e) {
            console.log('监听了内部的按钮事件')
            console.log(e)
        },
        onMounted: function () {
            console.log('1')
        }
    });
    // tzAlert.open(); // 初始化显示(方式2)

    // 事件调用显示
    document.getElementById('showAlert').onclick = function () {
        tzAlert.open({
            center: false,
            title: {
                html: '使用文档'
            },
            tips: {
                html: 'Copyright © 2023 Ki. All Rights Reserved.'
            },
            maskClose: false,
            mask: {
                use: true,
                background: 'rgba(0,0,0,.6)'
            },
            cancel: {
                use: false,
            },
            content: {
                html: `
                        <div class="cont-text" >
                            <h5>前言</h5>
                            <ul>
                            <li>本次重写页面结构</li>
                            <li>更新随机抽取逻辑</li>
                            <li>打印显示抽取到的内容信息</li>
                            <li>抽取不会出现重复 直到抽取完所有数据</li>
                            <li>注册键盘快捷键 可以通过键盘按键控制页面部分按钮</li>
                            </ul>
                            <h5>快捷键</h5>
                            <div class="kjj" >
                            <span>空格</span><b>控制 开始/停止 执行抽取</b>
                            </div>
                            <div class="kjj bu" >
                            <span>Ctrl+D</span><b>显示/隐藏打印名单模块</b>
                            </div>
                        </div>`,
            },
            onClose() {
                console.log('监听了关闭');
            },
            onMounted: function () {
                console.log('执行我了')
            }
        });
    }
</script>
<script>
    let arrlist = new String(
        "<?php  echo $config['randomData'] ?>"
    );
    let nameList = arrlist.split(',');

    //声明时间的变量
    var timer = null;

    //定义全局变量
    var index = null;

    function gotoRand() {
        //获取button 元素
        var button = document.getElementById('btn');
        var cont = document.getElementById('content');

        if (timer === null) {
            //开启定时
            timer = setInterval(getName, 10);
            button.innerHTML = "暂 停";
            button.style.background = "#6a6868";
            cont.style.filter = "blur(20px)";
            button.style.color = "#fff"
        } else {
            //清除定时
            clearInterval(timer);
            button.innerHTML = "开 始";
            button.style.background = "linear-gradient(145deg, #e6e6e6, #ffffff)";
            cont.style.filter = "blur(0px)";
            button.style.color = "#333";
            timer = null;
            if (nameList.length > 0) {
                //取出数据 放在constom里
                document.getElementById('custom').innerHTML += '<span>' + nameList[index] + '</span>';
                //把取过数据删掉 判断是否重复
                <?php if ($config['filter']){ ?> nameList.splice(index, 1);  <?php } else{ ?> <?php } ?>

            }

        }
    }

    function getName() {
        //判断
        if (nameList.length <= 0) {
            document.getElementById('content').innerHTML = "数据已取完，请刷新页面重新执行";
            document.getElementById('content').style.fontSize = "2rem"
            return;
        }

        index = Math.floor(Math.random() * 10000 % nameList.length);
        document.getElementById('content').innerHTML = nameList[index];

    }


    window.onload = function () {
        window.onkeydown = function () {
            event.preventDefault();
            // console.log(event.keyCode);
            if (event.keyCode === 32) {
                gotoRand();
            } else if (event.ctrlKey && event.keyCode === 68) {
                setConl();
            }
        }
        let text = document.getElementById("text");
        text.innerHTML = "今天"+getTimeState() +"吃什么";


    }


    function setConl() {
        let custom = document.getElementById('custom');
        let conl = document.getElementById("conl");
        if (custom.style.display === '') {
            custom.style.display = "none";
            conl.innerHTML = "显示";
            conl.style.background = "#5cd89f";
        } else if (custom.style.display === 'none') {
            custom.style.display = "block";
            conl.innerHTML = "关闭";
            conl.style.background = "pink";
        } else if (custom.style.display = "block") {
            custom.style.display = "none"
            conl.innerHTML = "显示";
            conl.style.background = "#5cd89f";
        }
    }

    function del() {
        let delconl = document.getElementById("delconl")
        delconl.style.display = "none"
    }
</script>

</body>
</html>
