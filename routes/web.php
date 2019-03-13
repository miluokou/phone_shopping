<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//商城首页
Route::get('/','IndexController@index');
Route::get('index','IndexController@index');

//分词搜索
Route::get('seek','IndexController@seek');

//个人中心
Route::get('self','SelfController@self');

//退出登录
Route::get('secede','SelfController@secede');

//个人资料
Route::get('personal','SelfController@personal');

//修改密码
Route::any('changePwd','ChangePwdController@changePwd');

//执行密码修改
Route::get('changeDo','ChangePwdController@changeDo');

//分类
Route::get('assort','AssortController@assort');

//登录
Route::get('login','LoginController@login');

//执行登录
Route::get('loginDo','LoginController@loginDo');

//注册
Route::get('sign','SignController@sign');

//执行注册
Route::get('signDo','SignController@signDo');

//验证码
Route::get('code','SignController@code');

//商城
Route::get('index_bak','Index_bakController@index_bak');

//商城列表
Route::get('list','Index_bakController@bak_list');


//商城详情页
Route::get('detail','Index_bakController@detail');

//判断用户是否通过
Route::get('checkUserLogin','CommonController@checkUserLogin');

//错误提示
Route::get('fail','CommonController@fail');

//登陆成功判断方法
Route::get('success','CommonController@success');

//判断用户是否登录
Route::get('checkUserLoginTwo','PublicController@checkUserLoginTwo');

//购物车视图
Route::get('shopCart','CartController@shopCart');

//redis缓存取出数据的购物车视图
Route::get('redisShopCart','RedisCartController@redisShopCart');

//执行添加购物车
Route::get('cartAdd','CartController@cartAdd');

//执行添加到redis缓存购物车
Route::get('redisCart','RedisCartController@redisCart');




//删除购物车数据
Route::get('cartDelete','CartController@cartDelete');

//订单
Route::get('order','OrderController@order');

//全部订单
Route::get('orderList','OrderController@orderList');

//待发货
Route::get('orderSend','OrderController@orderSend');

//待付款
Route::get('obligation','OrderController@obligation');

//待收货
Route::get('waitGoods','OrderController@waitGoods');

//待评价
Route::get('evaluate','EvaluateController@evaluate');

//去评价
Route::get('assess','EvaluateController@assess');

//地址管理
Route::get('address','AddressController@address');

//地址管理添加视图
Route::get('addressList','AddressController@addressList');

//执行地址添加
Route::get('addressDo','AddressController@addressDo');

//结算视图
Route::get('buy','BuyController@buy');

//创建订单
Route::get('order','OrderController@order');

//生成订单
Route::get('order_add','OrderController@order_add');

//修改购物车数量
Route::get('updateCart','CartController@updateCart');

//支付宝支付
Route::any('pay1','BuyController@pay');

//支付成功后同步回调
Route::any('orderReturn','BuyController@orderReturn');

//支付成功后异步通知
Route::any('orderNotify','BuyController@orderNotify');

//微信
Route::any('weixin','WeixinController@weixin');


//elasticsearch测试
Route::any('elastic','ElasticController@elastic');
//分词搜索测试
Route::any('participle','ElasticController@participle');
//api接口测试
Route::any('api','ApiController@api');
