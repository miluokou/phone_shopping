    <!--头部-->
    @include('public.header')

    <div class="mui-content">
        <div class="banner swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><a href="javascript:void(0)"><img class="swiper-lazy" data-src=" phone/uploads/banner1.jpg" alt=""></a></div>
                <div class="swiper-slide"><a href="javascript:void(0)"><img class="swiper-lazy" data-src=" phone/uploads/banner1.jpg" alt=""></a></div>
                <div class="swiper-slide"><a href="javascript:void(0)"><img class="swiper-lazy" data-src=" phone/uploads/banner1.jpg" alt=""></a></div>
                <div class="swiper-slide"><a href="javascript:void(0)"><img class="swiper-lazy" data-src=" phone/uploads/banner1.jpg" alt=""></a></div>
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="home-nav ui-box">
            <div class="ui-flex flex-justify-sb">
                <div><a href="list"><img src=" phone/img/homenav1.png" alt="" /></a></div>
                <div><a href="list"><img src=" phone/img/homenav2.png" alt="" /></a></div>
                <div><a href="list"><img src=" phone/img/homenav3.png" alt="" /></a></div>
                <div><a href="list"><img src=" phone/img/homenav4.png" alt="" /></a></div>
            </div>
        </div>

        <div class="home-qnav ui-box">
            <div class="ui-flex flex-justify-sb">
                <div><a href="index_bak"><img src=" phone/img/qnav1.png" class="ico" /><span class="name">我的店铺</span></a></div>
                <div><a href="http://www.591zq.com"><img src=" phone/img/qnav2.png" class="ico" /><span class="name">招商加盟</span></a></div>
                <div><a href="http://www.591zq.com"><img src=" phone/img/qnav3.png" class="ico" /><span class="name">我的喜欢</span></a></div>
                <div><a href="http://www.591zq.com"><img src=" phone/img/qnav4.png" class="ico" /><span class="name">猜你喜欢</span></a></div>
            </div>
        </div>

        <div class="home-newgoods ui-box">
            <img class="home-imgtit" src=" phone/img/hometit1.jpg" alt="" />
            <div class="list-type1 plist-puzzle">
                <a class="b" href="detail"><img src=" phone/uploads/t1.jpg" alt="" /></a>
                <div class="s ui-flex-vt flex-justify-sb">
                    <a class="box" href="#"><img src=" phone/uploads/t2.jpg" alt="" /></a>
                    <a class="box" href="#"><img src=" phone/uploads/t2.jpg" alt="" /></a>
                    <a class="box" href="#"><img src=" phone/uploads/t2.jpg" alt="" /></a>
                </div>
            </div>
            <img class="home-imgtit" src=" phone/img/hometit2.jpg" alt="" />
            <div class="list-type2 ui-flex flex-justify-sb">
                <a class="box" href="#"><img class="figure" src=" phone/uploads/t3.jpg" alt="" /><span class="tit">情侣穿搭</span></a>
                <a class="box" href="#"><img class="figure" src=" phone/uploads/t3.jpg" alt="" /><span class="tit">约会美搭</span></a>
                <a class="box" href="#"><img class="figure" src=" phone/uploads/t3.jpg" alt="" /><span class="tit">全部新款</span></a>
            </div>
        </div>

        <div class="home-fashion ui-box ui-border-t">
            <img class="home-imgtit" src=" phone/img/hometit3.jpg" alt="" />
            <a href="list"><img class="db margin-b-s" src=" phone/uploads/t4.jpg" width="100%" alt="" /></a>
            <div class="fastion-plist mui-row">
                @foreach($data as $v)
                <div class="mui-col-xs-4">
                    <a class="item"href="detail?id={{$v['id']}}">
                        <img src=" {{$v['goods_image']}}" alt="" class="figure" /><span class="tit">{{$v['good_name']}}</span>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div> <!--mui-content end-->
</div>

<!--底部-->
@include('public.footer')

</body>
<script type="text/javascript" src=" phone/js/jquery-1.8.3.min.js" ></script>
<script src=" phone/js/fastclick.js"></script>
<script src=" phone/js/mui.min.js"></script>
<script type="text/javascript" src=" phone/js/hmt.js" ></script>
<!--插件-->
<link rel="stylesheet" href=" phone/js/swiper/swiper.min.css">
<script src=" phone/js/swiper/swiper.jquery.min.js"></script>
<!--插件-->
<script src=" phone/js/global.js"></script>
<script >
    $(function () {
        var banner = new Swiper('.banner',{
            autoplay: 5000,
            pagination : '.swiper-pagination',
            paginationClickable: true,
            lazyLoading : true,
            loop:true
        });

        mui('.pop-schwrap .sch-input').input();
        var deceleration = mui.os.ios?0.003:0.0009;
        mui('.pop-schwrap .scroll-wrap').scroll({
            bounce: true,
            indicators: true,
            deceleration:deceleration
        });
        $('.top-sch-box .fdj,.top-sch-box .sch-txt,.pop-schwrap .btn-back').on('click',function () {
            $('html,body').toggleClass('holding');
            $('.pop-schwrap').toggleClass('on');
            if($('.pop-schwrap').hasClass('on')) {;
                $('.pop-schwrap .sch-input').focus();
            }
        });

    });








</script>
</html>