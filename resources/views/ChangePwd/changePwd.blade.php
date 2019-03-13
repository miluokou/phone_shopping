<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>修改密码</title>
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
    <h3>修改密码</h3>
</header>

<div class="login">
    <form action="changeDo" method="get">

        <ul>
            <li>
                <img src="phone/images/login.png"/>
                <input type="text" name="pwd" placeholder="输入原密码"/>
            </li>
            <li>
                <img src="phone/images/password.png"/>
                <input type="password" name="pwd_new" placeholder="输入新密码"/>
            </li>
            <li>
                <img src="phone/images/password.png"/>
                <input type="password" name="psd" placeholder="输入确认密码"/>
            </li>
        </ul>
        <input type="submit" name="change" value="立即修改"/>
    </form>
</div>

</body>
</html>
<script type="text/javascript">
    var layer;
    layui.use(['layer'],function(){
        layer=layui.layer;
    });

    //修改密码
    $('[name=change]').click(function(){
        var pwd=$('[name=pwd]').val();
        if(pwd==''){
            layui.layer.alert('原密码不能为空');
            return false;
        }

        var password=/^\w{6,}$/
        if(!password.test(pwd)){
            layui.layer.alert('密码必须是不少于6位的数字，字母，下划线组成');
            return false;
        }

        var pwd_new=$('[name=pwd_new]').val();
        if(pwd_new==''){
            layui.layer.alert('新密码不能为空');
            return false;
        }

        var password_new=/^\w{6,}$/
        if(!password_new.test(pwd_new)){
            layui.layer.alert('密码必须是不少于6位的数字，字母，下划线组成');
            return false;
        }


        //确认密码验证
        var psd=$('[name=psd]').val();

        if(psd!=pwd_new){
            layui.layer.alert('确认密码和新密码不一致，请重新输入');
            return false;
        }

//        $.get('changeDo',{
//            pwd:pwd,
//            pwd_new:pwd_new,
//            psd:psd
//        },function(data){
//              if(data=='修改成功'){
//                  layui.layer.alert(data);
//              }else{
//                  layui.layer.alert('修改失败');
//              }
//            }
//        )

    });







</script>