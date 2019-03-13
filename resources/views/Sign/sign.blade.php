<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>注册</title>
    <link rel="stylesheet" type="text/css" href="phone/css/loaders.min.css"/>
    <link rel="stylesheet" type="text/css" href="phone/css/loading.css"/>
    <link rel="stylesheet" type="text/css" href="phone/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="phone/css/style.css"/>
    <script src="phone/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        $(window).load(function(){
            $(".loading").addClass("loader-chanage");
            $(".loading").fadeOut(300)
        });

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
    <a class="text texta" href="javascript:history.go(-1)">返回</a>
    <h3>注册</h3>
</header>

<div class="login">
    <form action="signDo" method="get">
        <ul>
            <li>
                <img src="phone/images/login.png"/>
                <input type="text" id="name" name="username" placeholder="账号"/>
            </li>
            <li>
                <img src="phone/images/sjsc-12-3.png" >
                <input type="text" id="phone" name="phone" placeholder="请输入手机号" />
                <a href="javascript:;" onclick="phone_code()">验证码</a>
            </li>
            <li>
                <img src="phone/images/sjsc-12-4.png">
                <input type="text" id="code" name="code" placeholder="请输入验证码" class="sczc-ipt1 f-l" />
            </li>


            <li>
                <img src="phone/images/password.png"/>
                <input type="password" id="pwd"  name="password"placeholder="密码"/>
            </li>
            <li>
                <img src="phone/images/password.png"/>
                <input type="password" id="psd" name="password" placeholder="确认密码"/>
            </li>
        </ul>
        <input type="submit"  name="signs" value="注册"/>
    </form>
</div>

</body>
</html>
<script>

    var layer;
    layui.use(['layer'],function(){
        layer=layui.layer;
    });

    /**
     * 注册验证
     */
    $('[name=signs]').click(function(){

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

        //手机号验证
        var phone=$('#phone').val();
        if(phone==''){
            layui.layer.alert('手机号不能为空');
            return false;
        }

        var tel=/^1[3,5,8,9,7]\d{9}$/
        if(!tel.test(phone)){
            layui.layer.alert('手机号必须是以13,15,17,18,19,11位纯数字组成');
            return false;
        }

        //验证码验证
        var code=$('#code').val();
        if(code==''){
            layui.layer.alert('验证码不能为空');
            return false;
        }

        //密码验证
        var pwd=$('#pwd').val();
        if(pwd==''){
            layui.layer.alert('密码不能为空');
            return false;
        }

        var password=/^\w{6,}$/
        if(!password.test(pwd)){
            layui.layer.alert('密码必须是不少于6位的数字，字母，下划线组成');
            return false;
        }


        //确认密码验证
        var psd=$('#psd').val();
        if(psd==''){
            layui.layer.alert('确认密码不能为空');
            return false;
        }

        if(psd!=pwd){
            layui.layer.alert('确认密码和密码不一致，请重新输入');
            return false;
        }

    })

    /**
     * 获取手机号传到
     */
    function phone_code(){
        var phone = $('#phone').val();
        $.get('code',{
            phone:phone
                 },function(data){
            layui.layer.alert('验证码短信已发送');
    });
}




</script>