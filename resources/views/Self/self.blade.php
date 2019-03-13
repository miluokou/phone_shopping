<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>个人中心</title>
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
<!--<header class="self-header">
    <figure><img src="phone/images/self-tou.png"/></figure>
    <dl>
        <dt>瑾晨</dt>
        <dd>
            <img src="phone/images/self-header.png"/>
            <span>5684</span>
            <span>炒饭大湿</span>
        </dd>
    </dl>
    <button>签到</button>
</header>-->

<div class="p-top  clearfloat">
    <a href="personal">
        <div class="tu">
            <img src="phone/images/nanyang.jpg"/>
        </div>
        <p class="name">小阳子先生</p>
    </a>
    <div class="p-bottom p-bottom1 clearfloat">
        <ul class="clearfloat">
            <a href="fx-center1.html">
                <li class="box-s">
                    <span class="opa6"></span>
                    <p class="bt">我的佣金</p>
                    <p class="price">0.00</p>
                </li>
            </a>
            <a href="#">
                <li class="box-s">
                    <span class="opa6"></span>
                    <p class="bt">我的积分</p>
                    <p class="price">0</p>
                </li>
            </a>
            <a href="#">
                <li class="box-s">
                    <span class="opa6"></span>
                    <p class="bt">我的足迹</p>
                    <p class="price">0</p>
                </li>
            </a>
        </ul>
    </div>
</div>

<div class="contaniner fixed-contb">
    <section class="self">
        <dl>
            <dt>
                <a href="orderList">
                    <img src="phone/images/self-icon.png"/>
                    <b>全部订单</b>
                    <span><img src="phone/images/right.png"/></span>
                </a>
            </dt>
            <dd>
                <ul>
                    <li>
                        <a href="orderSend">
                            <img src="phone/images/order-icon01.png"/>
                            <p>待发货</p>
                        </a>
                    </li>
                    <li>
                        <a href="obligation">
                            <img src="phone/images/order-icon03.png"/>
                            <p>待付款</p>
                        </a>
                    </li>
                    <li>
                        <a href="waitGoods">
                            <img src="phone/images/order-icon02.png"/>
                            <p>待收货</p>
                        </a>
                    </li>
                    <li>
                        <a href="evaluate">
                            <img src="phone/images/order-icon04.png"/>
                            <p>待评价</p>
                        </a>
                    </li>
                </ul>
            </dd>
        </dl>

        <ul class="self-icon">
            <li>
                <a href="datum.html">
                    <img src="phone/images/self-icon01.png"/>
                    <p>个人信息</p>
                    <span><img src="phone/images/right.png"/></span>
                </a>
            </li>
            <li>
                <a href="mycollect.html">
                    <img src="phone/images/self-icon02.png"/>
                    <p>我的收藏</p>
                    <span><img src="phone/images/right.png"/></span>
                </a>
            </li>
            <li>
                <a href="balance.html">
                    <img src="phone/images/self-icon012.png"/>
                    <p>消费记录</p>
                    <span><img src="phone/images/right.png"/></span>
                </a>
            </li>
            <li>
                <a href="address">
                    <img src="phone/images/self-icon04.png"/>
                    <p>地址管理</p>
                    <span><img src="phone/images/right.png"/></span>
                </a>
            </li>
        </ul>
        <ul class="self-icon">
            <li>
                <a href="gobuy.html">
                    <img src="phone/images/self-icon05.png"/>
                    <p>我的分销</p>
                    <span><img src="phone/images/right.png"/></span>
                </a>
            </li>
            <li>
                <a href="changePwd">
                    <img src="phone/images/self-icon011.png"/>
                    <p>修改密码</p>
                    <span><img src="phone/images/right.png"/></span>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="phone/images/self-icon013.png"/>
                    <p>账号绑定</p>
                    <span><img src="phone/images/right.png"/></span>
                </a>
            </li>
        </ul>
        <a href="secede"><input type="button"   value="退出" /></a>

    </section>

</div>

<!--底部-->
@include('public.footer')


</body>
</html>