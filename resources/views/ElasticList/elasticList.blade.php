<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>商品列表</title>
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
    <h3></h3>

    <a class="iconb" href="shopcar.html">
        <img src="phone/images/shopbar.png"/>
    </a>
</header>

<div class="contaniner fixed-conta">
    <section class="list">
        <figure><img src="phone/images/list-ban01.png"/></figure>
        <div class="search">
            <input type="search" placeholder="韩版卫衣" />
            <label><img src="phone/images/list-search.png"/></label>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="list">
                        <span>全部</span>
                    </a>
                </li>
                <li class="list-active">
                    <a href="#">
                        <span>销量</span>
                        <img src="phone/images/up-red.png"/>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>价格</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>评价</span>
                    </a>
                </li>
            </ul>
        </nav>

        <ul class="wall">
            @foreach($params as $v)
            <li class="pic">
                <a href="detail?id={{$v['_id']}}">
                    <img src="{{$v['_source']['goods_image']}}"/>
                    <p>{{$v['_source']['good_name']}}</p>
                    <b>￥{{$v['_source']['goods_price']}}</b><del>￥{{$v['_source']['mark_price']}}</del>
                </a>
            </li>
            @endforeach
        </ul>
    </section>
</div>




<script src="phone/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="phone/js/jaliswall.js"></script>
<script type="text/javascript">
    $(window).load(function(){
        $('.wall').jaliswall({ item: '.pic' });
    });
</script>
</body>
</html>