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
<header class="page-header">
    <h3>购物车</h3>
</header>

<div class="contaniner fixed-contb">
    @foreach($cart_list as $v)
        <section class="shopcar">
            <div class="shopcar-checkbox">
                <label for="shopcar_{{$v->goods_id}}">
                    <input class="check" name="items" cart_id="{{$v->cart_id}}"  value='{{$v->goods_id}}' type="checkbox" id="shopcar_{{$v->goods_id}}"/>
                </label>
            </div>
            <figure><img src="{{$v->goods_image}}"/></figure>
            <dl>
                <dt>{{$v->good_name}}</dt>
                <dd>颜色：经典绮丽款</dd>
                <dd>尺寸：L</dd>
                <div class="add">
                    <span id="sub" class="min">-</span>
                    <input type="text" goods_id="{{$v->id}}" class="number" price="{{$v->goods_price}}" cart_id="{{$v->cart_id}}"  id="number_{{$v->goods_id}}" value="{{$v->buy_number}}" />
                    <span class="plus">+</span>
                </div>
                <h3>￥ <span class="price" id="price_{{$v->goods_id}}">{{$v->goods_price * $v->buy_number}}</span></h3>
                <small><img src="phone/images/shopcar-icon01.png" class="delete" cart_id="{{$v->cart_id}}"/></small>
            </dl>
        </section>
    @endforeach

    <!--去结算-->
    <div style="margin-bottom: 16%;"></div>

</div>

<footer class="page-footer fixed-footer">
    <div class="shop-go">
        <b id="money">0.00</b>
        <span><a href="#" id="num">去结算(0)</a></span>
    </div>
    <ul>
        <li class="active">
            <a href="index">
                <img src=" phone/images/footer01.png"/>
                <p>首页</p>
            </a>
        </li>
        <li>
            <a href="assort">
                <img src=" phone/images/footer002.png"/>
                <p>分类</p>
            </a>
        </li>
        <li>
            <a href="shopCart">
                <img src=" phone/images/footer003.png"/>
                <p>购物车</p>
            </a>
        </li>
        <li>
            <a href="self">
                <img src=" phone/images/footer004.png"/>
                <p>个人中心</p>
            </a>
        </li>
    </ul>
</footer>

</body>
</html>

<script type="text/javascript">

    var layer;
    layui.use(['layer'],function(){
        layer=layui.layer;
    });

    //减号
    $('.min').click(function(){
        changeCartNumber( 1 ,$(this) );
    })

    //加号
    $('.plus').click(function(){
        changeCartNumber( 2,$(this) );
    })

    //数量输入框失去焦点事件
    $('.number').blur(function(){

        changeCartNumber( 3,$(this) );
    })

    /**
     * 加号和减号的公众方法
     */
    function changeCartNumber( type , ele ){

        if(type==1){
            ele.parent('.add').find('.plus').prop('disabled',false);
            var input_ele= ele.next();//获取临近的下一个兄弟元素
            var number=parseInt(input_ele.val());
            number=number-1;
        }else if(type==2){
            var input_ele= ele.prev();//获取临近的前一个兄弟元素
            var number=parseInt(input_ele.val());
           number=number+1;
        }else{
            var input_ele=ele;
            var number=parseInt(input_ele.val());
        }

        input_ele.val(number);//购买数量文本框重新赋值

        var goods_id=input_ele.attr('goods_id');//商品id
        if(number==0){
            layui.layer.alert('数量不能小于0');
            return false;
        }else{
            $.get('updateCart',{
                buy_number:number,
                goods_id:goods_id
            },function(data){
                if(data=='修改成功'){
                    //计算商品的小计金额
                    var price=input_ele.attr('price');
                    price=parseFloat(price);
                    var amount=(price*number);
                    amount=number_format(amount ,2,',',3);//将金额转换成末尾带有俩位小数的金额
                    input_ele.parents('.shopcar').find('.price').text(amount);
                }else{
                    layui.layer.alert('修改失败');
                }
            });
        }
        countAndMoney();
    }


    //点击选中
        $(".shopcar-checkbox label").on('touchstart',function(){
            if($(this).hasClass('shopcar-checkd')){
                $(this).removeClass("shopcar-checkd")
            }else{
                $(this).addClass("shopcar-checkd")
            }
        })


    //单项选择
        $(".check").on('click',function(){

            countAndMoney();
        })

    //点击时可以在此计算数据  也可以单独封装成一个方法供结算时调用
        function countAndMoney(){
            var total=0;//商品的数量
            var amount=0.00;//商品的金额

            $('[name=items]').each(function(){
                if(this.checked){
                    var this_amount=$('#price_' + this.value).html();//金额
                    var this_number=$('#number_' + this.value).val();//数量

                    total+=parseInt(this_number);//数量
                    this_amount=this_amount.replace('￥','');
                    amount+=parseFloat(this_amount);//金额
                }
            });

            $('#money').text(number_format(amount,2,',',3));//金额
            $('#num').text('去结算('+total+')');
        }


    /**
     * number_format
     * @param number 传进来的数,
     * @param bit 保留的小数位,默认保留两位小数,
     * @param sign 为整数位间隔符号,默认为空格
     * @param gapnum 为整数位每几位间隔,默认为3位一隔
     * @type arguments的作用：arguments[0] == number(之一)
     */
    function number_format(number,bit,sign,gapnum){
        //设置接收参数的默认值
        var bit    = arguments[1] ? arguments[1] : 2 ;
        var sign   = arguments[2] ? arguments[2] : ' ' ;
        var gapnum = arguments[3] ? arguments[3] : 3 ;
        var str    = '' ;

        number     = number.toFixed(bit);//格式化
        realnum    = number.split('.')[0];//整数位(使用小数点分割整数和小数部分)
        decimal    = number.split('.')[1];//小数位
        realnumarr = realnum.split('');//将整数位逐位放进数组 ["1", "2", "3", "4", "5", "6"]

        //把整数部分从右往左拼接，每bit位添加一个sign符号
        for(var i=1;i<=realnumarr.length;i++){
            str = realnumarr[realnumarr.length-i] + str ;
            if(i%gapnum == 0){
                str = sign+str;//每隔gapnum位前面加指定符号
            }
        }

        //当遇到 gapnum 的倍数的时候，会出现比如 ",123",这种情况，所以要去掉最前面的 sign
        str = (realnum.length%gapnum==0) ? str.substr(1) : str;
        //重新拼接实数部分和小数位
        realnum = str+'.'+decimal;
        return realnum;
    }

    /**
     * 删除
     */
    $('.delete').click(function(){

        var cart_id=$(this).attr('cart_id');
        var ele=$(this);

        layer.confirm('确定要删除这个商品吗？',
            {icon:3,title:'提示'},
            function(index){
                $.get('cartDelete',{
                    cart_id:cart_id
                },function(data){
                    if(data == '删除成功'){
                        layui.layer.alert(data);
                        layer.close(index);
                        ele.parents('.shopcar').remove();
                        countAndMoney();
                    }else{
                        layui.layer.alert('该商品已删除');
                    }
                });
            }

        );
    })

    /**
     * 结算
     */
    $('#num').click(function(){

        var mark=0;
        var cart_id='';
        var ele=$(this);
        $('[name^=items]').each(function(){
            if($(this).prop('checked')==true){
                mark=1;
                if(cart_id==''){
                    //获取商品id
                    cart_id+=$(this).attr('cart_id');
                }else{
                    cart_id+=','+$(this).attr('cart_id');
                }

            }
        });

        if(mark==1){
            var price_all = $('#money').html();//总金额
            var url="{{action('BuyController@buy',['cart_id'=>'__CART_ID__','price_all'=>'__PRICE_ALL__'])}}";
            url=url.replace('__CART_ID__',cart_id);
            url=url.replace('__PRICE_ALL__',price_all);//总金额
            window.location.href=url;
        }else{
            layui.layer.alert('请选择您要购买的商品');
        }

    })


</script>
