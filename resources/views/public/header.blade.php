<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>首页</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <script src=" phone/js/rem.js"></script>
    <link href=" phone/iconfont/iconfont.css" rel="stylesheet">
    <link href=" phone/css/mui.min.css" rel="stylesheet">
    <link href=" phone/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href=" phone/css/base.css"/>
    <link rel="stylesheet" type="text/css" href=" phone/css/style.css"/>
    <link href="phone/layui/css/layui.css" rel="stylesheet" type="text/css" />
    <script src="phone/layui/layui.all.js"></script>
    <script src="phone/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<header class="mui-bar mui-bar-nav" id="header">
    <div class="top-sch-box flex-col">
        <div class="centerflex">
            <i class="fdj iconfont icon-search"></i>
            <div class="sch-txt"></div>
            <span class="shaomiao"><i class="iconfont icon-saoma"></i></span>
        </div>
    </div>
    <a class="btn" href="">
        <i class="iconfont icon-tixing"></i>
    </a>
    <a class="btn" href="shopcar.html">
        <i class="iconfont icon-cart"></i>
    </a>
</header>

<div id="main" class="mui-clearfix">
    <!-- 搜索层 -->
    <div class="pop-schwrap">
        <div class="ui-scrollview">
            <div class="mui-bar mui-bar-nav clone">
                <a class="btn btn-back" href="javascript:;"></a>
                <div class="top-sch-box flex-col">
                    <div class="centerflex">
                        <input class="sch-input mui-input-clear" type="text" name="good_name"  />
                    </div>
                </div>
                <a class="mui-btn mui-btn-primary sch-submit" href="javascript:;" id="seek">搜索</a>
            </div>
            <div class="scroll-wrap">
                <div class="mui-scroll">
                    <div class="sch-cont">
                        <div class="section ui-border-b">
                            <div class="tit"><i class="iconfont icon-hot"></i>热门搜索</div>
                            <div class="tags">
                                <span class="tag">外套</span><span class="tag">连衣裙</span><span class="tag">运动鞋</span><span class="tag">睡衣</span>
                                <span class="tag actice">外套</span><span class="tag">连衣裙</span><span class="tag">运动鞋</span><span class="tag">睡衣</span>
                                <span class="tag">外套</span><span class="tag actice">连衣裙</span><span class="tag">运动鞋</span>
                            </div>
                        </div>
                        <div class="section">
                            <div class="tit"><i class="iconfont icon-time"></i>最近搜索</div>
                            <div class="tags">
                                <span class="tag">外套</span><span class="tag">连衣裙</span><span class="tag">运动鞋</span><span class="tag">睡衣</span>
                                <span class="tag">外套</span><span class="tag">连衣裙</span><span class="tag">运动鞋</span><span class="tag">睡衣</span>
                                <span class="tag">外套</span><span class="tag">连衣裙</span><span class="tag">运动鞋</span>
                            </div>
                        </div>
                    </div>
                    <div class="sch-clear">
                        <a href="javascript:void"><i class="iconfont icon-shanchu"></i>清除搜索历史</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    var layer;
    layui.use(['layer'],function(){
        layer=layui.layer;
    });

    $('#seek').click(function(){
        //搜索的关键字
        var good_name=$('[name=good_name]').val();
        if(good_name==''){
            layui.layer.alert('请您填写要搜索的商品');
            return false;
        }else{
            $.get('seek',{
                good_name:good_name
            },function(data){
                if(data){
                    location.href='http://www.phone.com/seek';
                }else{
                    layui.layer.alert('您搜索的商品不存在，请重新搜索');
                }
            });
        }
    })
</script>