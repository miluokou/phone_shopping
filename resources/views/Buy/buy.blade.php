<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <meta name="format-detection" content="telephone=no" />
    <title>结算</title>
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
<header class="top-header fixed-header">
    <a class="icona" href="javascript:history.go(-1)">
        <img src="phone/images/left.png"/>
    </a>
    <h3>去结算</h3>
    <a class="iconb" href="shopCart">
    </a>
</header>

<div class="contaniner fixed-cont">
    <section class="to-buy">
        <header>
            <div class="now" add_id="{{$address['id']}}">
                <span><img src="phone/images/map-icon.png"/></span>
                <dl>
                    <dt>
                        <b>{{$address['consignee']}}</b>
                        <strong>{{$address['phone']}}</strong>
                    </dt>
                    <dd>{{$address['province']}}{{$address['city']}}{{$address['area']}}{{$address['address_desc']}}</dd>
                    <p>其他地址</p>
                </dl>
            </div>

<!--            <div class="to-now">-->
<!--                <div class="tonow">-->
<!--                    <label for="tonow"  onselectstart="return false" ></label>-->
<!--                    <input type="checkbox" id="tonow"/>-->
<!--                </div>-->
<!--                <dl>-->
<!--                    <dt>-->
<!--                        <b>瑾晨</b>-->
<!--                        <strong>13035059860</strong>-->
<!--                    </dt>-->
<!--                    <dd>安徽省合肥市XXXXXXXX</dd>-->
<!--                </dl>-->
<!--                <h3><a href="addressList"><img src="phone/images/write.png"/></a></h3>-->
<!--            </div>-->


        </header>
        <div class="buy-list">
            <input type="hidden" class = "cat" id="{{$cart_id}}" value="{{$cart_id}}"/>
            @foreach($data as $v )
            <ul  class="cart"  cart_id="{{$v['cart_id']}}">
                <a href="detail">
                    <figure>
                        <img src="{{$v['goods_image']}}"/>
                    </figure>
                    <li>
                        <h3>{{$v->good_name}}</h3>
							<span>
								颜色：经典绮丽款
								<br />
								尺寸：M
							</span>
                        <b>￥{{$v['goods_price']*$v['buy_number']}}</b>
                        <small>×{{$v['buy_number']}}</small>
                    </li>
                </a>
            </ul>
            @endforeach


            <dl>
                <dd>
                    <span>运费</span>
                    <small>包邮</small>
                </dd>
                <dd>
                    <span>商品总额</span>
                    <small>￥{{$money}}</small>
                </dd>
                <dt>
                    <textarea rows="4" placeholder="给卖家留言（50字以内）"></textarea>
                </dt>
            </dl>
        </div>

    </section>
    <!--底部不够-->
    <div style="margin-bottom: 9%;"></div>
</div>

<footer class="buy-footer fixed-footer">
    <p>
        <small>总金额</small>
        <b>￥{{$money}}</b>
    </p>

    <input type="button"id="payment" value="去支付"/>
</footer>

<script type="text/javascript">
    $(".to-now .tonow label").on('touchstart',function(){
        if($(this).hasClass('ton')){
            $(".to-now .tonow label").removeClass("ton")
        }else{
            $(".to-now .tonow label").addClass("ton")
        }
    })

    var layer;
    layui.use(['layer'],function(){
        layer=layui.layer;
    });

    //生成订单
    $('#payment').click(function(){
        var add_id=$('.now').attr('add_id');
        var cart_id=$('.cat').attr('id');
        location.href="order_add?add_id="+add_id+"&cart_id="+cart_id;
    });
</script>
</body>
</html>