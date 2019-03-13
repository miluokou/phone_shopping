<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Sign;
class SignController extends CommonController
{
    //注册视图
    public function sign(){
        return view('Sign.sign');
    }

    /**
     * 获取手机验证码
     * @param Request $request
     */
    public function code(Request $request){
        $phone=$request->input('phone');
        $rand = rand(1000,9999);
        date_default_timezone_set('GMT');
        #手机号码
        $phone = $phone;
        #短信签名名称
        $signName = '南阳';
        #AccessKeyID
        $appid =  'LTAIBF7twUfg61r9';
        #AccessKeySecret
        $secret = 'jS3K3t2esEbPARQV7rXA8niT2mn1re';
        #模板code
        $tplid = 'SMS_139244685';
        $tplParam = json_encode(['code' => $rand]);//随机验证码
        $params = [
            'AccessKeyId' => $appid,
            'Timestamp'   => date('Y-m-d\TH:i:s\Z'),
            'SignatureMethod'=>'HMAC-SHA1',
            'SignatureVersion'=> '1.0',
            'SignatureNonce'  => uniqid(),//随机码
            //'Signature' => ''
            'Format'      => 'JSON',
            //业务参数
            'Action'       => 'SendSms',
            'Version'     => '2017-05-25',
            'RegionId'    => 'cn-hangzhou',
            'PhoneNumbers' => $phone,//接收号码
            'SignName'      => $signName,//签名
            'TemplateCode'  => $tplid,//模板id
            'TemplateParam' => $tplParam,

        ];
        //排序
        ksort($params);
        //http_build_query($params)
        $str = '';
        foreach($params as $k => $v){
            $str .= urlencode($k) . '=' . urlencode($v) . '&';
        }
        $str = substr($str,0,-1);
        $str = str_replace(['+','*','%7E'],['%20','%2A','~'],$str );
        $new_str = 'GET&' . urlencode('/') . '&' . urlencode($str);
        $sign = base64_encode(hash_hmac('sha1', $new_str, $secret . '&',true));
        $sign = urlencode($sign);
        $url = 'http://dysmsapi.aliyuncs.com/?Signature=' . $sign . '&'.  $str;
        echo file_get_contents($url);
        //将验证码存入session
        $request->session()->put('code',$rand);
    }

    /**
     * 执行注册
     * @param Request $request
     */
    public function signDo(Request $request){
        //取session数据
        $code_session=$request->session()->get('code');

        $username=$request->input('username');
        $phone=$request->input('phone');
        $code=$request->input('code');
        if($code!=$code_session){
            echo '验证码不正确，请重新获取';
            header("refresh:1,url='sign'");
        }
        $pwd=$request->input('password');
        $password=md5( $pwd);
        $time=time();
        $arr=['username'=>$username,'phone'=>$phone,'code'=>$code,'password'=>$password,'ctime'=>$time];

        $sign_model=new Sign();//实例化

        $res=$sign_model->SignInsert($arr);

        if($res){
            echo '注册成功';
            header("refresh:1,url='login'");
        }else{
            echo '注册失败';
            header("refresh:1,url='sign'");
        }

    }

}
