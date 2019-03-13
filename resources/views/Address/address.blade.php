<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>地址管理</title>
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
<header class="top-header fixed-header">
    <a class="icona" href="javascript:history.go(-1)">
        <img src="phone/images/left.png"/>
    </a>
    <h3>地址列表</h3>

    <a class="text-top" href="addressList">
        添加
    </a>
</header>

<div class="contaniner fixed-conta">
    <dl class="address">
        <a href="addressList">
            <dt>
            <p>{{$add['consignee']}}</p>
            <span>{{$add['phone']}}</span>
            <small>默认</small>
            </dt>
            <dd>{{$add['province']}}{{$add['city']}}{{$add['area']}}{{$add['address_desc']}}</dd>
        </a>
    </dl>
</div>
</body>
</html>