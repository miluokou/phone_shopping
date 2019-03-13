<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
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
    <h3>地址添加</h3>

    <a class="text-top" >
    </a>
</header>

<div class="contaniner fixed-conta">
    <form  class="change-address" id="save">
        <ul>
            <li>
                <label class="addd">收货人：</label>
                <input type="text" value="" name="username" id="username" required="required"/>
            </li>
            <li>
                <label class="addd">手机号：</label>
                <input type="tel" value="" id="phone"  name="phone"  required="required"/>
            </li>
            <li>
                <label class="addd">所在地区：</label>
                <select id="province" name="province">
                    <option></option>
                    <option>北京</option>
                    <option>河北省</option>
                    <option>河南省</option>
                </select>
                <select id="city" name="city">
                    <option></option>
                    <option> 北京市</option>
                    <option> 张家口市</option>
                    <option> 南阳市</option>
                </select>
                <select id="area" name="area">
                    <option></option>
                    <option>昌平区</option>
                    <option>宣化区</option>
                    <option>卧龙区</option>
                </select>
            </li>
            <li>
                <label class="addd">详细地址：</label>
                <textarea required="required" id="address_desc" name="address_desc"></textarea>
            </li>
        </ul>

        <ul>
            <li class="checkboxa">
                <input type="checkbox" id="check"/>
                <label class="check" value="1" name="is_default" for="check" onselectstart="return false"  >设置为默认地址</label>
            </li>
        </ul>
        <ul>
            <li>
                <h3>删除此地址</h3>
            </li>
        </ul>
        <input type="submit" id="btn" value="保存" />
    </form>
</div>

<script src="phone/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $(".checkboxa label").on('touchstart',function(){
        if($(this).hasClass('checkd')){
            $(".checkboxa label").removeClass("checkd");
        }else{
            $(".checkboxa label").addClass("checkd");
        }
    })


    var layer;
    layui.use(['layer'],function(){
        layer=layui.layer;
    });


    //保存地址
    $('#btn').click(function(){

        //收货人验证
        var username=$('#username').val();
        if(username==''){
            layui.layer.alert('请输入收货人');
            return false;
        }

        var name=/^[\u4e00-\u9fa5]{2,4}$/
        if(!name.test(username)){
            layui.layer.alert('收货人必须由2到4位汉字组成');
            return false;
        }

        //手机号验证
        var phone=$('#phone').val();
        if(phone==''){
            layui.layer.alert('手机号不能为空');
            return false;
        }

        var tel=/^1[3,5,8,9,7]\d{9}$/
        if(!tel.test(phone)){
            layui.layer.alert('手机号必须是以13,15,17,18,19,11位纯数字组成');
            return false;
        }


        //地址验证
        var province=$('#province').val();
        var city=$('#city').val();
        var area=$('#area').val();
        var address_desc=$('#address_desc').val();

        if(province==''){
            layui.layer.alert('请选择您所在的市或省');
            return false;
        }

        if(city==''){
            layui.layer.alert('请选择您所在的市');
            return false;
        }

        if(area==''){
            layui.layer.alert('请选择您所在的县或区');
            return false;
        }

        if(address_desc==''){
            layui.layer.alert('请填写您的详细地址');
            return false;
        }

        $.get('addressDo',{
            username:username,
            phone:phone,
            province:province,
            city:city,
            area:area,
            address_desc:address_desc,
            is_default:1
            },function(data){
                console.log(data)
                if(data=='已保存'){
                    layui.layer.alert(data);
                    location.href='http://www.ny.com/addressList';
                }else{
                    layui.layer.alert('保存失败');
                    location.href='http://www.ny.com/addressList';
                }
            }

        );

    })
</script>

</body>
</html>