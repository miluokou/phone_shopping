<?php

namespace App\Http\Controllers;

use Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;
use App\Model\Index;
use DB;
class IndexController extends Controller
{
    //首页视图
    public function index(Request $request){


        //获取code
        /*$code=$request->input('code');

        $appid="wxf6431bfae01ce80b";
        $secret="1a28553e0301273005de7b8eb53c2e98";

        //请求以下链接获取access_token（网页授权接口调用凭证）
        $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";

        $json=file_get_contents($url);

        $arr=json_decode($json,true);

        //拉取用户信息
        $get_user_url="https://api.weixin.qq.com/sns/userinfo?access_token={$arr['access_token']}&openid={$arr['openid']}&lang=zh_CN";

        $userinfo=file_get_contents($get_user_url);

        $arr_userinfo=json_decode($userinfo,true);

        //抓取头像图片
        $image=file_get_contents($arr_userinfo['headimgurl']);

        //存入头像图片
        file_put_contents('./public/Uploads'.$arr['openid'].'jpg',$image);*/

        $model=new Index();
        $arr=$model->IndexAll()->toArray();

        return view('Index.index',['data'=>$arr]);
    }


    /**
     * 分词搜索
     */
    public function seek(Request $request){
        $good_name=$request->input('good_name');

        $esclient = ClientBuilder::create()
            ->setHosts(["192.168.43.44:9200"])
            ->build();

        //创建空索引
        /*$params = [
            'index' => 'my_index_user8',
        ];
       $a=$esclient->indices()->create($params);
        print_r($a);*/

        //创建映射
        /*$params = [
            'index' => 'my_index_user8',
            'type' => 'my_type_user8',
            'body' => [
                'my_type_user8' => [
                    '_source' => [
                        'enabled' => true
                    ],
                    'properties' => [

                        'good_name' => [    //要搜索的字段名字
                            'type' => 'text', // 字符串型
                            'analyzer'=>'ik_max_word', //ik_max_word 最细粒度拆分 ik_smart最粗粒度拆分
                            'search_analyzer'=> 'ik_max_word'
                        ]

                    ]
                ]
            ]
        ];

        $res = $esclient->indices()->putMapping($params);
        print_r($res);*/

        //查询数据库所有数据
        /*$data=DB::table('phone_goods')->get();
        $data=json_decode(json_encode($data),true);

        //批量索引
        $params = [
            'index' => 'my_index_user8',
            'type' => 'my_type_user8',
        ];

        foreach($data as $v){
            $params['body'][]=['index'=>['_id'=>$v['id']]];
            unset($v['id']);
            $params['body'][]=$v;
        }

        $res=$esclient->bulk($params);
        print_r($res);exit;*/

        //搜索
        $search_params = [
            'index' => 'my_index_user3',
            'type' => 'my_type_user3',
            'body' => [
                'query' => [
                    'match' => [
                        'good_name' => $good_name
                    ]
                ],
                //设置高亮
                "highlight" => [
                    "pre_tags" => [
                        '<span style="color:red">'
                    ],
                    "post_tags" => [
                        '</span>'

                    ],
                    'fields'=> [
                        'good_name' => new \stdClass()
                    ]
                ]
            ]
        ];
        $arr = $esclient->search($search_params);

        $data[]=$arr['hits']['hits'];

        $params=[];
        foreach($data as $k=>$v){
                $params=$v;
        }

//        $a=[];
//        foreach($params as $k=>$v){
//            $a=$v['_source']['good_name'];
//            print_r($a);
//        }

        return view('ElasticList.elasticList',['params'=>$params]);
    }


}
