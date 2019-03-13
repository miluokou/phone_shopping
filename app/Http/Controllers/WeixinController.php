<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class WeixinController extends CommonController
{
    public function weixin(Request $request)
    {
        //判断是否登录
        if($this->checkUserLogin()){
            echo '您已登录';exit;

        }else{

            $code=$request->input('code');
            $appid="wxf6431bfae01ce80b";
            $secret="1a28553e0301273005de7b8eb53c2e98";

            //请求以下链接获取access_token（网页授权接口调用凭证）
            $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";

            $data=file_get_contents($url);

            $arr=json_decode($data,true);

            //拉取用户信息
            $get_user_url="https://api.weixin.qq.com/sns/userinfo?access_token={$arr['access_token']}&openid={$arr['openid']}&lang=zh_CN";

            $userinfo=file_get_contents($get_user_url);

            $arr_userinfo=json_decode($userinfo,true);

            $where=[
                'nickname'=>$arr_userinfo['nickname']
            ];

            $user_so=DB::table('weixin')->where($where)->first();

            if( $user_so){
                echo '登录成功';

                # 存储session
                session(['user_info'=>$user_so]);
                header("refresh:0,url='index'");
            }else{

                $array=[
                    'nickname'=>$arr_userinfo['nickname'],
                    'sex'=>$arr_userinfo['sex'],
                    'country'=>$arr_userinfo['country'],
                    'province'=>$arr_userinfo['province'],
                    'city'=>$arr_userinfo['city'],
                    'headimgurl'=>$arr_userinfo['headimgurl'],
                    'openid'=>$arr_userinfo['openid'],
                    'ctime'=>time(),
                ];

                $res=DB::table('weixin')->insertGetId($array);

                $where=[
                    'w_id'=>$res
                ];

                $list=DB::table('weixin')->where($where)->first();

                if($list){
                    echo '登录成功';

                    # 存储session
                    session(['user_info'=>$list]);
                    header("refresh:0,url='index'");
                }else{
                    echo '登录失败';
                    header("refresh:1,url='login'");
                }
            }
        }
    }
}
