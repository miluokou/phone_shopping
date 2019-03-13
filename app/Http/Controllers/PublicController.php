<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends CommonController{

    /**
     * 判断用户是否登录
     * @return bool|mixed|void
     */
    public function checkUserLoginTwo(){

        $user_info=session('user_info');
        if(empty($user_info)){
            echo "你没有登录";
        }else{
            echo "ok";
        }
    }
}
