<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Buy;
use App\Model\Address;
use DB;
use Illuminate\Support\Facades\Input;
use RSA;

class BuyController extends Controller
{
    /**
     * 结算视图
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function buy(Request $request)
    {

        $money_all = $request->input('amp;price_all'); //接总金额
        $cart_id1 = $request->input('cart_id');

        $cart_id = array_map('intval', explode(',', $cart_id1));

        //购物车信息
        $where = [
            'user_id' => $request->session()->get('user_info.id'),
            'c.status' => 1
        ];

        $cart_list = DB::table('shop_cart as c')
            ->join('phone_goods', 'c.goods_id', '=', 'phone_goods.id')
            ->where($where)
            ->whereIn('cart_id', $cart_id)
            ->get();
        $cart_list=json_decode($cart_list,true);

        //查询默认地址信息
        $model = new Address();
        $where = [
            'user_id' => $request->session()->get('user_info.id'),
            'is_default' => 1
        ];
        $address = $model->AddressSelect($where);
        $address=json_decode($address,true);

        return view('Buy.buy', ['data' => $cart_list, 'address' => $address, 'cart_id' => $cart_id1, 'money' => $money_all]);
    }

    /**
     * 支付宝支付
     * @param Request $request
     */
    public function pay(Request $request)
    {
        $order = $request->input('order_no');
        $price = $request->input('price');
        #用户私钥
        $pri_key = 'MIIEpQIBAAKCAQEAzDYPY3RhoQvqzEKrMFgRcqCJG3zBTbVP1UBsn77bT+ziJGrIHFMoMDzEyEyE7Fak/iCL1er2tMLtwMaR9/4PJtstjII8Q6bNXEGbRjpp/nkcMWKoCNAjK2n9dtE6pGCq3LK+wiNcXFrl8VXKEg124iQ6LHJ1gL4/oaBDBxodetyMUbQArV5xjulvVZ6Y4Xr4DN8T/Eij6mzsLjTNcXovmetwGwDFwiB8v/ZSBtWFz/da3H+AmXTvqB02EauksDaSax879+rGY8Rj96pOPtu0spBED0gQ26dQIaKrE6aqgHTPcE4R2yTe/sEVMGHWd4nVdSr4jvWj21XFuaafUi0ZeQIDAQABAoIBAQC8dPN0pBXpKvdP9ALKBaxsbay6ekJmdXosYl0ce2Un+IOmegkc4r1G7v3nn35YIYn4oI6MJ1/v56jEbDyPcZ4IDOOXNSVqhYglqMIkaIoi9x/Gj7ZlE7gxO4pXWbXVtwRX0nlq7nkxHg3wz2xBhr1861PoauT3oBtXDHBvIHGuTC6X/anKcpiqqCFTPzn0/5k9g/cZ0a7TvQdd09IBuHx8lRtprFfZU3kIjuzOc2g9htQO5O1He7pljX4/QGuwd8IgdG96UD9P/ULaar6mybP8Q+glCULzViCONS9bomrTtuJf0XzLDyFR3n46uiHQERqRNh+BrbHr4IPYKg+1o291AoGBAO9tINOO8vrEaqD5jCUjDmofyMSs0ks7dypvQ8mGSfMQS7RlCIP3jQ6AaPn/D8s4ZC8yR9x7FGHcE1S3Zj7tW98/4H/4ZYVHAPlbu6+O1R27QcwgpZ3h8CkHNZXnmiNJv3St4s21j8i8bEy6eV0b5c82B8gztpqFfzQgNXNrK/0vAoGBANpY4pd7lKO7rFRIIjFbT+1qhxAhGQu2r3JJDPGPHau7Mfp8yEXDVROkZ9lIpYcM5K6dOzvj3A2KLX7PuO85UXNxt7tJwEtKhEtaCvdZMrrImDJeD0BptG1lE2FVGVSLB6n1myYGPC1AVp6gphKncN1pf/4nHoff7M8HyR6p5DnXAoGBALhTxLz7RdeH1iueU6XXqmZLmA7KmpAu9NxnksGYsGAAALiePAMVV7R9adRl6Kvk+0RWqnp1C0kX3I4RMBdsN5nVnKoI+2ezNW3EkOdkyHA+VTapP7ggVPvRQBDroIBga5SRtpX2nP7HCX285minbLKtfypDneayti7USTJVpSUjAoGBAL0aFAyr6/yuEj7gRjTG538wLo9Kiv15F5P8Lmia0VClDFDrdyvsUydy0Ln/T9SZ1whfhiiFXFShomtcjccptiAskbpz0kWi4Na9whecufHIvv+INN9NbQT9b/5xDEILMvUAkIErDz0Fpr81VP984qPvtfkweiGlTtuy231iGBX7AoGAEV7uni92Zvw6TlEMSCUVo4F8d+IrmbYK3girxd+AwNiOZMgs32d3RqKxTiWHwcxLX6A8/0XaIf5m3GHg0lXXMRDBQjwXJ0ngkuVpEVoVTnvb2hxFH7+7yNP8nP8++YI+0IBw6ZJLLT8tI5YY1G0ZvvE3H4zuaVGaecDj3OdGZ48=';
        #用户公钥
        $pub_key = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAzDYPY3RhoQvqzEKrMFgRcqCJG3zBTbVP1UBsn77bT+ziJGrIHFMoMDzEyEyE7Fak/iCL1er2tMLtwMaR9/4PJtstjII8Q6bNXEGbRjpp/nkcMWKoCNAjK2n9dtE6pGCq3LK+wiNcXFrl8VXKEg124iQ6LHJ1gL4/oaBDBxodetyMUbQArV5xjulvVZ6Y4Xr4DN8T/Eij6mzsLjTNcXovmetwGwDFwiB8v/ZSBtWFz/da3H+AmXTvqB02EauksDaSax879+rGY8Rj96pOPtu0spBED0gQ26dQIaKrE6aqgHTPcE4R2yTe/sEVMGHWd4nVdSr4jvWj21XFuaafUi0ZeQIDAQAB';
        #引入签名
        //公共请求参数
        $arr = [
            #appid
            'app_id' => '2016091700535133',
            'method' => 'alipay.trade.wap.pay',
            #同步地址
            'return_url' => 'http://www.nanyang.com/orderReturn',
            #异步地址
            'notify_url' => 'www.nanyang128.club/orderNotify',
            'charset' => 'utf-8',
            'sign_type' => 'RSA2',
            'timestamp' => date('Y-m-d H:i:s'),
            'version' => '1.0',
            'biz_content' => '',
        ];
        //业务请求参数
        $arr_params = [
            #订单名称
            'subject' => "我的订单",
            #用户唯一订单号
            'out_trade_no' => $order,
            #价格
            'total_amount' =>$price,
            'product_code' => 'QUICK_WAP_WAY'
        ];
        $arr['biz_content'] = json_encode($arr_params, JSON_UNESCAPED_UNICODE);
        ksort($arr);
        $str = urldecode(http_build_query($arr));
        $rsa = new RSA();
        $arr['sign'] = $rsa->rsaSign($str, $pri_key);
        $url = "https://openapi.alipaydev.com/gateway.do?".http_build_query($arr)."";
        header('Refresh: 0; url='.$url.'');
    }

    /**
     * 订单的同步通知
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function orderReturn(){

        //接受同步通知的数据
        $arr=Input::get();

        $where=[
            'order_no'=>$arr['out_trade_no'],
            'order_amount'=>$arr['total_amount'],

        ];
        //查询订单
        $order_info=(array)DB::table('shop_order')->where($where)->first();
        $order_info['ctime']=date('Y-m-d H:i:s',$order_info['ctime']);

        if(empty($order_info)){
            echo '订单好像走丢了！';
        }

        //支付宝交易号
        $trade_no = htmlspecialchars($arr['trade_no']);

        $save_arr=[
            'trade_no'=>$trade_no,
            'utime'=>time(),
        ];
        //修改订单流水号
        $data_save=DB::table('shop_order')->where($where)->update($save_arr);

        return view('Buy.paySuccess',['order'=>$order_info]);

    }

    /**
     * 订单的异步通知
     */
    public function orderNotify(){
     /*   #支付宝公钥
        $pub_key = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAzDYPY3RhoQvqzEKrMFgRcqCJG3zBTbVP1UBsn77bT+ziJGrIHFMoMDzEyEyE7Fak/iCL1er2tMLtwMaR9/4PJtstjII8Q6bNXEGbRjpp/nkcMWKoCNAjK2n9dtE6pGCq3LK+wiNcXFrl8VXKEg124iQ6LHJ1gL4/oaBDBxodetyMUbQArV5xjulvVZ6Y4Xr4DN8T/Eij6mzsLjTNcXovmetwGwDFwiB8v/ZSBtWFz/da3H+AmXTvqB02EauksDaSax879+rGY8Rj96pOPtu0spBED0gQ26dQIaKrE6aqgHTPcE4R2yTe/sEVMGHWd4nVdSr4jvWj21XFuaafUi0ZeQIDAQAB';
        //接受异步通知的数据
        $params=Input::get();
        $sign = $params['sign'];
        unset($params['sign']);
        unset($params['sign_type']);
        ksort($params);
        $str = urldecode(http_build_query($params));
        $rsa = new RSA();
        $stat = $rsa->rsaCheck($str, $pub_key, $sign);
        if($stat){

            $order_where=[
                'order_no'=> $params['out_trade_no']
            ];

            echo 'success';
        }else{
           echo "no";
        }
        */
        file_put_contents('/tmp/alipay.log',print_r($_POST,1),FILE_APPEND);

        //接受异步通知的数据
        $arr =Input::get();

        //接收订单号，查询数据库是否存在订单
        $order_where=[
            'order_no'=>$arr['out_trade_no']
        ];

        $order_info=DB::table('shop_order')->where($order_where)->first();
        if(empty($order_info)){
            file_put_contents('/tmp/alipay.log','order not found',FILE_APPEND);
            echo 'order not found';
            exit;
        }

        $save_arr=[
            'status'=>3,
            'utime'=>time(),
        ];
        //修改订单状态为已支付
        if(DB::table('shop_order')->where($order_where)->update($save_arr)){
            file_put_contents('/tmp/alipay.log','success',FILE_APPEND);
            echo 'success';
            exit;
        }else{
            file_put_contents('/tmp/alipay.log','fail',FILE_APPEND);
            echo 'fail';
        }

    }

}
