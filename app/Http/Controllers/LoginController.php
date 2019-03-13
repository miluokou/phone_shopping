<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use App\Model\Sign;
class LoginController extends CommonController
{
    //登录视图
    public function login(){
        return view('Login.login');
    }

    /**
     * 执行登录
     */
    public function loginDo(Request $request){

        //判断是否登录
        if($this->checkUserLogin()){
            echo "<script>alert('您已登录')</script>";
            header("refresh:0,url='index'");

        }else{

            $name=$request->input('username');
            $pwd=$request->input('password');
            $pwd=md5($pwd);
            $where=['username'=>$name,'password'=>$pwd];

            //取出redis
            $names=Redis::get('name');
            $psd=Redis::get('pwd');
            $id=Redis::get('id');

            //判断是否能能从redis中取出数据
            if($name==$names && $pwd==$psd){

                echo "<script>alert('登录成功')</script>";

                $request->session()->put('user_info',$id);//存入session
                $request->session()->put('user_info',$names);//存入session
                //$request->session()->put('user_info',$psd);//存入session
                header("refresh:0,url='index'");

                //设置redis的过期时间（1小时后自动删除，跳到登录页面）
                Redis::EXPIRE('name',60);
                Redis::EXPIRE('pwd',60);

            }else{
                //实例化
                $login_model=new Sign();
                $arr=$login_model->SignSelect($where);
                $arr=json_decode(json_encode($arr),true);
                if(empty($arr)){
                    echo '该用户不存在，请先注册';
                    header("refresh:1,url='sign'");
                }else{
                    if($pwd==$arr['password']){
                        echo '登录成功';

                        //存入redis
                        Redis::set('name',$name);
                        Redis::set('pwd',$pwd);
                        Redis::set('id',$arr['id']);

                        $request->session()->put('user_info',$arr);//存入session
                        header("refresh:0,url='index'");
                    }else{
                        echo "账号或者密码有误";
                        header("refresh:1,url='login'");
                    }
                }
            }
        }
    }
}
