<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommonController extends Controller
{
    /**
     * 判断用户是否登录
     */
    protected function checkUserLogin()
    {
        $arr = Session::get('user_info');/*Session('user_info');*/
        if (empty($arr)) {
            return false;
        } else {
            return $arr;
        }
    }

    protected function getUid()
    {
        return $_SESSION['user_info']['id'];
    }

    /**
     * 错误提示
     * @param $error_msg
     */
    public function fail($error_msg)
    {
        $this->ajaxReturn([
            'status' => 1,
            'msg' => $error_msg,
        ]);
    }

    /**
     * 登录成功
     * @param string $error_msg
     * @param array $data
     */
    public function success($error_msg = 'ok', $data = [])
    {
        //$this->success();
        $this->ajaxReturn([
            'status' => 1000,
            'msg' => $error_msg,
            'data' => $data
        ]);
    }


    protected function etUid(Request $request)
    {
        return $request->session()->get('user_info.id');
    }


}
