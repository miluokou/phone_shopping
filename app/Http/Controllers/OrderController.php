<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Cart;
use App\Model\Address;
use App\Model\OrderAddress;
use DB;
class OrderController extends Controller
{
    /**
     * 创建订单
     * @param Request $request
     */
    public function order_add(Request $request)
    {
        $add_id = $request->get('add_id');
        $cart_id = $request->get('cart_id');
        $user_id=$request->session()->get('user_info.id');

        //订单号
        $len=strlen($user_id);
        if($len<4){
            $user_id_new=str_repeat('0',4-$len).$user_id;
        }else{
            $user_id_new=$user_id % 10000;
        }

        //组合订单号：业务线+时间+用户id4位+随机数
        $order_no='1'.date('ymd').$user_id_new.mt_rand(1000,9999);

        //查询购物车数据
        $cart_model=new Cart();
        $where=[
            'cart_id'=>$cart_id,
            'user_id'=>$user_id,
            'status'=>1
        ];
        $cart_list=$cart_model->CartSelect($where)->toArray();


        //写入订单数据
        $order_insert=[];
        $order_insert['order_no']=$order_no;//订单号
        $order_insert['user_id']=$user_id;//用户id

        $order_amount=0.00;
        foreach($cart_list as $k=>$v){
            $order_amount+=$v['buy_number']*$v['add_price'];
        }

        $order_insert['order_amount']=$order_amount;//用户id
        $order_insert['status']=1;
        $order_insert['ctime']=time();

        //实例化订单Model
        $order_model=new Order();
        $order_id=$order_model->OrderInsert($order_insert);
        if(!$order_id){
            echo "订单表写入失败";
        }

        //实例化收货人地址model
        $add_model=new Address();
        $add_where=[
            'user_id'=>$user_id,
            'status'=>1
        ];

        $add_res=$add_model->AddressSelect($add_where);//查询收货地址
        $add_res=json_decode($add_res,true);

        if(empty($add_res)){
            echo '收货地址不正确';
        }

        //订单地址添加
        $order_add_insert=[];
        $order_add_insert['order_id']=$order_id;
        $order_add_insert['user_id']= $user_id;
        $order_add_insert['order_receive_name']=$add_res['consignee'];
        $order_add_insert['receive_phone']=$add_res['phone'];
        $order_add_insert['province']=$add_res['province'];
        $order_add_insert['city']=$add_res['city'];
        $order_add_insert['area']=$add_res['area'];
        $order_add_insert['receive_address']=$add_res['address_desc'];
        $order_add_insert['status']=1;
        $order_add_insert['ctime']=time();

        //实例化订单地址
        $order_add_model=new OrderAddress();
        $order_add=$order_add_model->OrderAddressInsert($order_add_insert);
        if(empty($order_add)){
            echo "订单地址写入失败";
        }else{
            header('Refresh: 0; url=pay1?order_no='.$order_no.'&price='.$order_amount);
        }

}

    //全部订单
   public function orderList(Request $request){



//        $add_id=$request->input('add_id');//地址id
//        $cart_id=$request->input('cart_id');//购物车id
//
//        $cart_id = array_map('intval', explode(',', $cart_id));
//
//        //购物车信息
//        $where = [
//            'user_id' =>$request->session()->get('user_info.id'),
//            'c.status' => 1
//        ];
//        //查询购物车数据
//        $cart_list=DB::table('shop_cart as c')
//            ->join('phone_goods','c.goods_id','=','phone_goods.id')
//            ->where($where)
//            ->whereIn('cart_id',$cart_id)
//            ->get()->toArray();
       return view('Order.orderList');
    }

    //待发货
    public function orderSend(){
        return view('Order.orderSend');
    }

    //待付款
    public function obligation(){
        return view('Order.obligation');
    }

    //待收货
    public function waitGoods(){
        return view('Order.waitGoods');
    }
}
