<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>登录</title>
    <link rel="stylesheet" type="text/css" href="phone/css/loaders.min.css"/>
    <link rel="stylesheet" type="text/css" href="phone/css/loading.css"/>
    <link rel="stylesheet" type="text/css" href="phone/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="phone/css/style.css"/>
    <script src="phone/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        $(window).load(function(){
            $(".loading").addClass("loader-chanage")
            $(".loading").fadeOut(300)
        })
    </script>

    <link href="phone/layui/css/layui.css" rel="stylesheet" type="text/css" />
    <script src="phone/layui/layui.all.js"></script>
</head>
<!--loading页开始-->
<div class="loading">
    <div class="loader">
        <div class="loader-inner pacman">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>
<!--loading页结束-->
<body>
<header class="top-header">
    <a class="text texta" href="index">取消</a>
    <h3>登录</h3>
    <a class="text" href="sign">注册</a>
</header>

<div class="login">
    <form action="loginDo" method="get">
        <ul>
            <li>
                <img src="phone/images/login.png"/>
                <label>账号</label>
                <input type="text" placeholder="请输入账号" id="name" name="username"/>
            </li>
            <li>
                <img src="phone/images/password.png"/>
                <label>密码</label>
                <input type="password" name="password" placeholder="请输入密码"/>
            </li>
        </ul>

        <?php

        //公众号的唯一标识
        $appID="wxf6431bfae01ce80b";
        //授权后重定向的回调链接地址
        $redirect_uri='http://phone.nanyang128.club/weixin';
        $url="https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appID}&redirect_uri={$redirect_uri}&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";

        ?>
        <input type="submit" name="add"  value="登录"/>
    </form>
    <a href="{{$url}}">微信登录</a>
</div>

</body>
</html>
<script type="text/javascript">
    var layer;
    layui.use(['layer'],function(){
        layer=layui.layer;
    });

    $('[name=add]').click(function(){

        //账号验证
        var username=$('#name').val();

        if(username==''){
            layui.layer.alert('请输入账号');
            return false;
        }

        var user=/^[\u4e00-\u9fa5]{2,4}|[a-z]{2,18}$/;
        if(!user.test(username)){
            layui.layer.alert('账号由2到4位汉字或者2到18位字母组成');
            return false;
        }

        //密码验证
        var pwd=$('[name=password]').val();
        if(pwd==''){
            layui.layer.alert('密码不能为空');
            return false;
        }

        var password=/^\w{6,}$/
        if(!password.test(pwd)){
            layui.layer.alert('密码必须是不少于6位的数字，字母，下划线组成');
            return false;
        }
    });
</script>