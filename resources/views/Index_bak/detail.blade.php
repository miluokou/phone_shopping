<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>{{$title}}</title>
    <link rel="stylesheet" type="text/css" href="phone/css/loaders.min.css"/>
    <link rel="stylesheet" type="text/css" href="phone/css/loading.css"/>
    <link rel="stylesheet" type="text/css" href="phone/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="phone/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="phone/css/swiper.min.css"/>
    <script src="phone/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        $(window).load(function () {
            $(".loading").addClass("loader-chanage")
            $(".loading").fadeOut(300)
        })
    </script>


    <link href="phone/layui/css/layui.css" rel="stylesheet" type="text/css"/>
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
<header class="detail-header fixed-header">
    <a href="javascript:history.go(-1)"><img src="phone/images/detail-left.png"/></a>

    <a href="shopcar.html" class="right"><img src="phone/images/shopbar.png"/></a>
</header>


<div class="contaniner fixed-contb">
    <section class="detail">
        <figure class="swiper-container">
            <ul class="swiper-wrapper">
                <li class="swiper-slide">
                    <a href="#">
                        <img src="{{$dtl['slider_img']}}"/>
                    </a>
                </li>
            </ul>
            <div class="swiper-pagination">
            </div>
        </figure>
        <dl class="jiage">
            <dt>
            <h3>{{$dtl['good_name']}}</h3>

            <div class="collect">
                <img src="phone/images/detail-heart-hei.png"/>

                <p>收藏</p>
            </div>
            </dt>
            <dd>
                <b>￥{{$dtl['goods_price']}}</b>
                <del>￥{{$dtl['mark_price']}}</del>
                <input type="button" value="￥10.00" readonly/>
                <small>+{{$dtl['goods_score']}}积分</small>
            </dd>
        </dl>

        <div class="chose">
            <ul>
                <h3>颜色</h3>
                <li>
                    黑色
                </li>
                <li>
                    粉色
                </li>
                <li>
                    灰色
                </li>
                <li>
                    红色
                </li>
            </ul>
            <ul>
                <h3>尺寸</h3>
                <li>
                    L
                </li>
                <li>
                    XL
                </li>
                <li>
                    XXL
                </li>
            </ul>
        </div>

        <a href="#" class="seven">
            <b>7</b>天无理由退换货
            <span id="sss"></span>
        </a>

        <ul class="same">
            <a href="#">
                            <span>
                                同类推荐
                            </span>
                <li class="one">
                    <img src="phone/images/detail-pp01.png"/>

                    <p>￥188.00</p>
                </li>
                <li>
                    <img src="phone/images/detail-pp02.png"/>

                    <p>￥188.00</p>
                </li>
                <li>
                    <img src="phone/images/detail-pp03.png"/>

                    <p>￥188.00</p>
                </li>
                <li>
                    <img src="phone/images/detail-pp04.png"/>

                    <p>￥188.00</p>
                </li>
            </a>
        </ul>

        <article class="detail-article">
            <nav>
                <ul class="article">
                    <li id="talkbox1" class="article-active">商品详情</li>
                    <li id="talkbox2">评价</li>
                </ul>
            </nav>

            <section class="talkbox1">
                会尽快啦辅导费发挥大路口
            </section>

            <section class="talkbox2" style="display: none;">
                <ul class="talk">
                    <li>
                        <figure><img src="phone/images/detail-tou.png"/></figure>
                        <dl>
                            <dt>
                            <p>瑾晨</p>
                            <time>2015.11.17</time>
                            <div class="star">
                                <span><img src="phone/images/detail-iocn01.png"/></span>
                                <span><img src="phone/images/detail-iocn01.png"/></span>
                                <span><img src="phone/images/detail-iocn01.png"/></span>
                                <span><img src="phone/images/detail-iocn001.png"/></span>
                                <span><img src="phone/images/detail-iocn001.png"/></span>
                            </div>
                            </dt>
                            <dd>哎哟不错哦，很性感哦！</dd>
                            <small>颜色：豹纹凯特</small>
                        </dl>
                    </li>
                    <li>
                        <figure><img src="phone/images/detail-tou.png"/></figure>
                        <dl>
                            <dt>
                            <p>瑾晨</p>
                            <time>2015.11.17</time>
                            <div class="star">
                                <span><img src="phone/images/detail-iocn01.png"/></span>
                                <span><img src="phone/images/detail-iocn01.png"/></span>
                                <span><img src="phone/images/detail-iocn01.png"/></span>
                                <span><img src="phone/images/detail-iocn001.png"/></span>
                                <span><img src="phone/images/detail-iocn001.png"/></span>
                            </div>
                            </dt>
                            <dd>哎哟不错哦，很性感哦！</dd>
                            <small>颜色：豹纹凯特</small>
                            <div class="picbox">
                                <img src="phone/images/detail-pp01.png"/>
                                <img src="phone/images/detail-pp02.png"/>
                                <img src="phone/images/detail-pp03.png"/>
                                <img src="phone/images/detail-pp04.png"/>
                            </div>
                        </dl>
                    </li>
                    <li>
                        <figure><img src="phone/images/detail-tou.png"/></figure>
                        <dl>
                            <dt>
                            <p>瑾晨</p>
                            <time>2015.11.17</time>
                            <div class="star">
                                <span><img src="phone/images/detail-iocn01.png"/></span>
                                <span><img src="phone/images/detail-iocn01.png"/></span>
                                <span><img src="phone/images/detail-iocn01.png"/></span>
                                <span><img src="phone/images/detail-iocn001.png"/></span>
                                <span><img src="phone/images/detail-iocn001.png"/></span>
                            </div>
                            </dt>
                            <dd>哎哟不错哦，很性感哦！</dd>
                            <small>颜色：豹纹凯特</small>
                        </dl>
                    </li>
                    <li>
                        <figure><img src="phone/images/detail-tou.png"/></figure>
                        <dl>
                            <dt>
                            <p>瑾晨</p>
                            <time>2015.11.17</time>
                            <div class="star">
                                <span><img src="phone/images/detail-iocn01.png"/></span>
                                <span><img src="phone/images/detail-iocn01.png"/></span>
                                <span><img src="phone/images/detail-iocn01.png"/></span>
                                <span><img src="phone/images/detail-iocn001.png"/></span>
                                <span><img src="phone/images/detail-iocn001.png"/></span>
                            </div>
                            </dt>
                            <dd>哎哟不错哦，很性感哦！</dd>
                            <small>颜色：豹纹凯特</small>
                            <div class="picbox">
                                <img src="phone/images/detail-pp01.png"/>
                                <img src="phone/images/detail-pp02.png"/>
                                <img src="phone/images/detail-pp03.png"/>
                                <img src="phone/images/detail-pp04.png"/>
                            </div>
                        </dl>
                    </li>
                </ul>
            </section>
        </article>
    </section>
</div>


<footer class="detail-footer fixed-footer">
    <a href="javascript:;" class="go-car">
        <input type="button" dtl_id="{{$dtl['id']}}" value="加入购物车"/>
    </a>
    <a href="buy?id={{$dtl['id']}}" class="buy">
        立即购买
    </a>
</footer>

<script src="phone/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $(window).scroll(function () {
        if ($(".detail-header").offset().top > 50) {
            $(".detail-header").addClass("change");
        } else {
            $(".detail-header").removeClass("change");
        }
    });
</script>
<script src="phone/js/swiper.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var mySwiper = new Swiper('.swiper-container', {
            loop: true,
            speed: 1000,
            autoplay: 2000,
            pagination: '.swiper-pagination',
        });
    })
</script>
<script type="text/javascript">
    $(function () {
        $('.chose li').click(function () {

            $(this).addClass('chose-active').siblings().removeClass('chose-active');

            var tags = document.getElementsByClassName('chose-active');//获取标签

            var tagArr = "";
            for (var i = 0; i < tags.length; i++) {
                tagArr += tags[i].innerHTML;//保存满足条件的元素

            }

            $('#sss').html(tagArr);

        });

        $('.article li').click(function () {

            $(this).addClass('article-active').siblings().removeClass('article-active');
            if ($(this).attr("id") == "talkbox1") {
                $('.talkbox1').show();
                $('.talkbox2').hide();
            } else {
                $('.talkbox2').show();
                $('.talkbox1').hide();
            }

        });
    });
</script>
</body>
</html>
<script>

    var layer;
    layui.use(['layer'], function () {
        layer = layui.layer;
    });

    $('[type=button]').click(function () {

        var ele=$(this);
        //获取商品id
        var dtl_id=$(this).attr('dtl_id');
        //判断是否登录
        $.get('/checkUserLoginTwo',
            {

            },function (data) {
            if(data == "ok"){
                $.get('cartAdd',{
                    dtl_id:dtl_id
                },function(data){
                    if(data == '添加购物车成功'){
                        layui.layer.alert(data);
                        location.href='http://www.phone.com/redisShopCart';
                    }else{
                        layui.layer.alert('服务器出故障，请稍后再试');
                    }
                });
            }else{
                layui.layer.alert(data);
                location.href='http://www.phone.com/login';
            }
        });
    })


</script>