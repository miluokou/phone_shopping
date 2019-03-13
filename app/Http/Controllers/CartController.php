<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Model\Cart;
class CartController extends CommonController
{

    //添加购物车
    public function cartAdd(Request $request)
    {

        $id = $request->input('dtl_id');
        $user = session('user_info');

        $goods = DB::table('phone_goods')->where('id', '=',$id)->first();
        $cart = DB::table('shop_cart')->where('goods_id','=', $id)->first();

        if (empty($cart)) {
            $arr = [
                'user_id' => $user['id'],
                'goods_id' => $goods->id,
                'add_price' => $goods->goods_price,
                'buy_number' => 1,
                'status' => 1,
                'ctime' => time(),
            ];
            $res = DB::table('shop_cart')->insert($arr);
            if ($res) {
                echo "添加购物车成功";

            } else {
                echo "添加购物车失败";
            }
        } else {
            $res1 = DB::table('shop_cart')
                ->where('cart_id', $cart->cart_id)
                ->update(['buy_number' => $cart->buy_number + 1]);
            if ($res1) {
                echo "添加购物车成功";
            } else {
                echo "添加购物车失败";
            }
        }
    }


    //购物车视图
    public function shopCart()
    {
        $cart_list=DB::table('shop_cart')
            ->join('phone_goods',function($join){
                $join->on('shop_cart.goods_id','=','phone_goods.id')
                    ->where('phone_goods.status','=',1);
            })
            ->get()->toArray();

        //判断是否登录
        if($this->checkUserLogin()){
            return view('Cart.shopCart',['cart_list'=>$cart_list]);
        }else{
            header("refresh:1,url='login'");
        }

    }

    //删除购物车数据
    public function cartDelete(Request $request){

        $id=$request->input('cart_id');

        $where=[
            'cart_id'=>$id,
            'user_id'=>1,
            'status'=>1
        ];

        $cart_where=[
            'status'=>2,
            'utime'=>time()
        ];

        $model=new Cart();
        $delete=$model->updateCart($where,$cart_where);
        if($delete){
            echo "删除成功";
        }else{
            echo "删除失败";
        }

    }

   //修改购物车数量
    public function updateCart(Request $request){
        $buy_number=$request->input('buy_number');
        $goods_id=$request->input('goods_id');

        if($buy_number===''){
            echo '您要购买的数量不正确';
        }
        //实例化购物车
        $cart_model=new Cart();
        $cart_where=[
            'goods_id'=>$goods_id,
            'user_id'=>$request->session()->get('user_info.id'),
            'status'=>1
        ];
        $cart_info=$cart_model->CartSelect($cart_where);

        if(empty($cart_info)){
           echo '要修改的商品未找到';
        }


        $save_data=[];
        $save_data['buy_number']=$buy_number;
        $save_data['utime']=time();
        $info = DB::table('shop_cart')->where(['goods_id'=>$goods_id])->update(['buy_number'=>$buy_number]);
        if($info){
           echo '修改成功';
        }else{
           echo '修改失败';
        }
    }

}
