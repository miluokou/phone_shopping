<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use App\Model\Cart;
use DB;
class RedisCartController extends CommonController
{
    /**
     * 添加购物车
     * @param Request $request
     */
    public function redisCart(Request $request){

        $id = $request->input('dtl_id');
        $user= session('user_info');

        $user_arr=DB::table('user_sign')->where('username','=',$user)->first();
        $user_arr=json_decode(json_encode($user_arr),true);

        $goods = DB::table('phone_goods')->where('id', '=',$id)->first();
        $goods=json_decode(json_encode($goods),true);

        $cart = DB::table('shop_cart')->where('goods_id','=', $id)->first();

        if(empty($cart)){

            //存入哈希
            $arr=[
                'user_id'=>$user_arr['id'],
                'goods_id'=>$goods['id'],
                'good_name'=>$goods['good_name'],
                'goods_image'=>$goods['goods_image'],
                'add_price'=>$goods['goods_price'],
                'buy_number'=>1,
                'status'=>1,
                'ctime'=>time(),
            ];

            //存入哈希
            Redis::hset( md5($user_arr['id']) , $goods['id'],json_encode($arr));

            //从哈希取数据
            $redis_info =  Redis::hget(md5($user_arr['id']),$goods['id']);

            if($redis_info){
                echo "添加购物车成功";

            }else{
                echo "添加购物车失败";

            }

        }else{

            $hash_arr=Redis::hget(md5($user_arr['id']),$goods['id']);
            $num=Redis::hincrby(md5($user_arr['id']),$hash_arr['buy_number'] ,1);//修改hash数据的数量

            if($num){
                echo "添加购物车成功";
            }else{
                echo "添加购物车失败";
            }

        }
    }

    //购物车视图
    public function redisShopCart(Request $request){

        //判断是否登录
        if($this->checkUserLogin()){
            return view('Cart.redisShopCart');
        }else{
            header("refresh:1,url='login'");
        }
    }













}
