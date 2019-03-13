<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>商城</title>
    <link rel="stylesheet" type="text/css" href="phone/css/loaders.min.css"/>
    <link rel="stylesheet" type="text/css" href="phone/css/loading.css"/>
    <link rel="stylesheet" type="text/css" href="phone/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="phone/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="phone/css/swiper.min.css"/>
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


<header class="page-header">
    <h3>商城</h3>
</header>

<div class="contaniner fixed-contb">
    <figure class="ban swiper-container">
        <ul class="swiper-wrapper">
            <li class="swiper-slide">
                <a href="#">
                    <img src="phone/images/index-ban01.png"/>
                </a>
            </li>
            <li class="swiper-slide">
                <a href="#">
                    <img src="phone/images/index-ban02.png"/>
                </a>
            </li>
            <li class="swiper-slide">
                <a href="#">
                    <img src="phone/images/index-ban03.png"/>
                </a>
            </li>
        </ul>
    </figure>

    <section class="shop">
        <h3>
            <a href="list">
                服装
                <span><img src="phone/images/right.png"/></span>
            </a>
        </h3>
        <dl>
            <dd>
                <a href="list">
                    <img src="phone/images/index-ph01.png"/>
                    <b>男装</b>
                </a>
            </dd>
            <dd>
                <a href="list">
                    <img src="phone/images/index-ph02.png"/>
                    <b>女装</b>
                </a>
            </dd>
        </dl>
    </section>

    <section class="shop">
        <h3>
            <a href="list">
                食品
                <span><img src="phone/images/right.png"/></span>
            </a>
        </h3>
        <dl>
            <dd>
                <a href="list.html">
                    <img src="phone/images/index-03.png"/>
                    <b>切糕</b>
                </a>
            </dd>
            <dd>
                <a href="list.html">
                    <img src="phone/images/index-ph04.png"/>
                    <b>酥饼</b>
                </a>
            </dd>
        </dl>
    </section>
</div>

<!--底部-->
@include('public.footer')




<script src="phone/js/swiper.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var mySwiper = new Swiper('.swiper-container',{
            loop: true,
            speed:1000,
            autoplay: 2000
        });
    })
</script>
</body>
</html>