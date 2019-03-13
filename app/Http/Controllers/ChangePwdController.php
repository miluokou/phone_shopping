<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ChangePwdController extends Controller
{
    //修改视图
    public function changePwd(){
        return view('ChangePwd.changePwd');
    }

    //执行密码修改
    public function changeDo(Request $request){

        $pwd=$request->input('pwd');//原密码
        $pwd=md5($pwd);

        $pwd_new=$request->input('pwd_new');//新密码
        $pwd_new=md5($pwd_new);

        $psd=$request->input('psd');//确认密码
        $psd=md5($pwd);

        $user_id=$request->session()->get('user_info.id');
        $where=[
            'id'=>$user_id
        ];
        //查询用户数据
        $res=(array)DB::table('user_sign')->where($where)->first();

        if($pwd!=$res['password']){
            echo '原密码不正确，请您核实后重新输入';
        }

        $change=DB::table('user_sign')->where(['id'=>$user_id])->update(['password'=>$pwd_new]);

        if( $change){
            echo "修改成功";
            header("refresh:1 url='login'");

        }else{
            echo "修改失败";
            header("refresh:1 url='changePwd'");
        }

    }
}
