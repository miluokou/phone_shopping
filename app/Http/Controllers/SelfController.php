<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SelfController extends CommonController
{
    //个人中心视图
    public function self(){

        //判断是否登录
        if($this->checkUserLogin()){

            return view('Self.self');
        }else{
            header("refresh:1,url='login'");
        }

    }

    //个人资料视图
    public function personal(){
        return view('Self.personal');
    }

    /**
     * 退出
     * @param Request $request
     */
    public function secede(Request $request){
        $request->session()->flush();
        header("refresh:0,url='login'");
    }
}
