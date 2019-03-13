<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Address;
use Illuminate\Support\Facades\Input;
use DB;
class AddressController extends Controller
{
    //地址管理视图
    public function address(){
        //查询默认地址信息
        $model=new Address();
        $where=[
            'status'=>1,
            'is_default'=>'0'
        ];
        $add=$model->AddressSelect($where)->toArray();

        return view('Address.address',['add'=>$add]);
    }


    //地址管理添加视图
    public function addressList(){
        return view('Address.addressList');
    }

    //地址添加
    public function addressDo(Request $request){
        $data=Input::get();

        $arr=[
            'consignee'=>$data['username'],
            'phone'=>$data['phone'],
            'province'=>$data['province'],
            'city'=>$data['city'],
            'area'=>$data['area'],
            'address_desc'=>$data['address_desc'],
            'is_default'=>$data['is_default'],
            'user_id'=>$request->session()->get('user_info.id'),
            'status'=>1,
            'ctime'=>time()
        ];

        $model=new Address();
        $res=$model->AddressInsert($arr);
        if($res){
            echo '已保存';
        }else{
            echo '保存失败';
        }

    }

}
