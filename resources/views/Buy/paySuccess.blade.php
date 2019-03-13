<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <title>订单支付成功</title>
    <link rel="stylesheet" type="text/css" href="pay/css/style.css">
    <link rel="stylesheet" type="text/css" href="pay/css/shoujisc.css">
    <script type="text/javascript" src="pay/js/jquery.js"></script>
</head>

<body>

<div class="sjsc-title1">
    <h3 class="sjsc-t1l f-l"><a href="shopCart"><span><</span>订单支付成功</a></h3>
    <div style="clear:both;"></div>
</div>

<div class="qrdd-info1">
    <img src="pay/images/sjsc19.gif">
</div>

<div class="qrdd-info2">
    <div class="qrdd-xian">
        <p class="qrdd-p1">订单编号：{{$order['order_no']}}</p>
        <p class="qrdd-p1">{{$order['ctime']}}　下单</p>
    </div>
    <p class="qrdd-p2">订单金额：<span>￥{{$order['order_amount']}}</span></p>
    <div class="qrdd-tj">
        <button>查看订单</button>
        <button>发起募集</button>
    </div>
</div>


<div class="ssjg">
    <ul class="ssjg-tit1">
        <li><a href="JavaScript:;">热门推荐</a></li>
        <div style="clear:both;"></div>
    </ul>
    <ul class="ssjg-ul1" style="padding-top:0;">
        <li>
            <div class="ssjg-tu">
                <a href="#"><img src="pay/images/sjsc-07.gif"></a>
            </div>
            <h3><a href="#">OPPO R7 Plus 全网通4G手机 双卡双待</a></h3>
            <dl class="ssjg-dl1">
                <dt>
                <p class="ssjg-p1">募集价<span>￥2880.00</span></p>
                <p class="ssjg-p2">销售量<span>4680</span></p>
                </dt>
                <dd><a href="#"><img src="pay/images/sjsc-09.gif"></a></dd>
                <div style="clear:both;"></div>
            </dl>
        </li>
        <li>
            <div class="ssjg-tu">
                <a href="#"><img src="pay/images/sjsc-08.gif"></a>
            </div>
            <h3><a href="#">The new Macbook 12英寸 标配 256G...</a></h3>
            <dl class="ssjg-dl1">
                <dt>
                <p class="ssjg-p1">募集价<span>￥3880.00</span></p>
                <p class="ssjg-p2">销售量<span>4680</span></p>
                </dt>
                <dd><a href="#"><img src="pay/images/sjsc-09.gif"></a></dd>
                <div style="clear:both;"></div>
            </dl>
        </li>
        <li>
            <div class="ssjg-tu">
                <a href="#"><img src="pay/images/sjsc-07.gif"></a>
            </div>
            <h3><a href="#">OPPO R7 Plus 全网通4G手机 双卡双待</a></h3>
            <dl class="ssjg-dl1">
                <dt>
                <p class="ssjg-p1">募集价<span>￥2880.00</span></p>
                <p class="ssjg-p2">销售量<span>4680</span></p>
                </dt>
                <dd><a href="#"><img src="pay/images/sjsc-09.gif"></a></dd>
                <div style="clear:both;"></div>
            </dl>
        </li>
        <li>
            <div class="ssjg-tu">
                <a href="#"><img src="pay/images/sjsc-08.gif"></a>
            </div>
            <h3><a href="#">The new Macbook 12英寸 标配 256G...</a></h3>
            <dl class="ssjg-dl1">
                <dt>
                <p class="ssjg-p1">募集价<span>￥3880.00</span></p>
                <p class="ssjg-p2">销售量<span>4680</span></p>
                </dt>
                <dd><a href="#"><img src="pay/images/sjsc-09.gif"></a></dd>
                <div style="clear:both;"></div>
            </dl>
        </li>
        <li>
            <div class="ssjg-tu">
                <a href="#"><img src="pay/images/sjsc-07.gif"></a>
            </div>
            <h3><a href="#">OPPO R7 Plus 全网通4G手机 双卡双待</a></h3>
            <dl class="ssjg-dl1">
                <dt>
                <p class="ssjg-p1">募集价<span>￥2880.00</span></p>
                <p class="ssjg-p2">销售量<span>4680</span></p>
                </dt>
                <dd><a href="#"><img src="pay/images/sjsc-09.gif"></a></dd>
                <div style="clear:both;"></div>
            </dl>
        </li>
        <li>
            <div class="ssjg-tu">
                <a href="#"><img src="pay/images/sjsc-08.gif"></a>
            </div>
            <h3><a href="#">The new Macbook 12英寸 标配 256G...</a></h3>
            <dl class="ssjg-dl1">
                <dt>
                <p class="ssjg-p1">募集价<span>￥3880.00</span></p>
                <p class="ssjg-p2">销售量<span>4680</span></p>
                </dt>
                <dd><a href="#"><img src="pay/images/sjsc-09.gif"></a></dd>
                <div style="clear:both;"></div>
            </dl>
        </li>
        <div style="clear:both;"></div>
    </ul>
</div>



</body>
</html>
