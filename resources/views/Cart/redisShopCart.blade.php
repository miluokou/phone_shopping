<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>购物车</title>
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
<header class="page-header">
    <h3>购物车</h3>
</header>

<div class="contaniner fixed-contb">
    <section class="shopcar">
        <div class="shopcar-checkbox">
            <label for="shopcar_2" onselectstart="return false"><input name="shopcar[]" value='111' type="checkbox" id="shopcar_2"/></label>

        </div>
        <figure><img src="phone/images/shopcar-ph01.png"/></figure>
        <dl>
            <dt>超级大品牌服装，现在买只要998</dt>
            <dd>颜色：经典绮丽款</dd>
            <dd>尺寸：L</dd>
            <div class="add">
                <span>-</span>
                <input type="text" value="3" />
                <span>+</span>
            </div>
            <h3>￥653.00</h3>
            <small><img src="phone/images/shopcar-icon01.png"/></small>
        </dl>
    </section>
    <section class="shopcar">
        <div class="shopcar-checkbox">
            <label for="shopcar_5" onselectstart="return false"><input  name="shopcar[]" value='222' type="checkbox" id="shopcar_5"/></label>

        </div>
        <figure><img src="phone/images/shopcar-ph01.png"/></figure>
        <dl>
            <dt>超级大品牌服装，现在买只要998</dt>
            <dd>颜色：经典绮丽款</dd>
            <dd>尺寸：L</dd>
            <div class="add">
                <span>-</span>
                <input type="text" value="3" />
                <span>+</span>
            </div>
            <h3>￥653.00</h3>
            <small><img src="phone/images/shopcar-icon01.png"/></small>
        </dl>
    </section>
    <!--去结算-->
    <div style="margin-bottom: 16%;"></div>

</div>
<script type="text/javascript">

    //点击选中
    $(".shopcar-checkbox label").on('touchstart',function(){
        if($(this).hasClass('shopcar-checkd')){
            $(this).removeClass("shopcar-checkd")
        }else{
            $(this).addClass("shopcar-checkd")
        }

    })

    //点击时可以在此计算数据  也可以单独封装成一个方法供结算时调用
    $("input[name='shopcar[]']").on('change',function(){
        $.each($('input:checkbox'),function(){
            if(this.checked){
                alert($(this).val());
            }
        });
    })

</script>

<footer class="page-footer fixed-footer">
    <div class="shop-go">
        <b>合计：￥108.90</b>
        <span><a href="buy.html">去结算（2）</a></span>
    </div>
    <ul>
        <li>
            <a href="index">
                <img src="phone/images/footer001.png"/>
                <p>首页</p>
            </a>
        </li>
        <li>
            <a href="assort">
                <img src="phone/images/footer002.png"/>
                <p>分类</p>
            </a>
        </li>
        <li class="active">
            <a href="redisShopCart">
                <img src="phone/images/footer03.png"/>
                <p>购物车</p>
            </a>
        </li>
        <li>
            <a href="self">
                <img src="phone/images/footer004.png"/>
                <p>个人中心</p>
            </a>
        </li>
    </ul>
</footer>


</body>
</html>