<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder;
use DB;
class ElasticController extends Controller
{
    //测试
    public function elastic(){

        $esclient = \Elasticsearch\ClientBuilder::create()
            ->setHosts(["192.168.43.44:9200"])
            ->build();

        /*
        //创建索引（保存）
        $params = [
            'index' => 'my_index',
            'type' => 'my_type',
            'id' => '10',
            'body' => [
                'testField' => 'abc',
                'title'	=> '你好,从纵向即文档这个维度来看，每列代表文档包含了哪些单词，。'
            ]
        ];
        $esclient->index($params);


        //取出
        $params = [
            'index' => 'my_index',
            'type' => 'my_type',
            'id' => '10',
        ];

        $a=$esclient->get($params);
        print_r($a);
        */

        /*
        //索引
        //定义一个数组
        $data=[
            'id'=>2,
            'username'=>'秀秀',
            'email'=>'1720886861@qq.com',
            'phone'=>'13652013149'
        ];

        //索引名和类型
        $params=[
            'index' => 'my_index',
            'type' => 'my_type',
        ];

        //索引id
        $params['id']=$data['id'];

        foreach($data as $k=>$v){
            $params['body'][$k]=$v;
        }
        print_r($params);
        */

        /*
        //从数据库查询数据，循环构建数组并且在循环中请求
        $goods_data=DB::table('phone_goods')->get();
        $goods_data=json_decode(json_encode($goods_data),true);

        $params=[
            'index' => 'my_index',
            'type' => 'my_type',
        ];


        foreach($goods_data as $k=>$v){
            $params['id']=$v['id'];
            foreach($v as $kk=>$vv){
                $params['body'][$kk]=$vv;
            }
            //存入
            $esclient->index($params);

        }
        */

        //取出
        $params = [
            'index' => 'my_index',
            'type' => 'my_type',
            'id' => 3,
        ];
        $res=$esclient->get($params);
        print_r($res);

    }

    /**
     * 分词搜索
     */
    public function participle(){
        $esclient =ClientBuilder::create()
            ->setHosts(["192.168.43.44:9200"])
            ->build();
        /*检测分词是否成功
        $params = [
            'body' => [
                'text' => '天天敲代码非常高兴',
                'analyzer'=>'ik_max_word' //ik_max_word 精细  ik_smart 粗略
            ]
        ];
        $res =  $esclient->indices()->analyze($params);
        print_r($res);
        */

        /* 先创建空的索引,创建后关闭
        $params = [
            'index' => 'my_index_user1',
        ];
        $res =  $esclient->indices()->create($params);
        */

        /*再创建映射，创建成功后关闭
        $params = [
            'index' => 'my_index_user1',//索引名
            'type' => 'my_type_user1',//类型
            'body' => [
                'my_type_user1' => [
                    '_source' => [
                        'enabled' => true
                    ],
                    'properties' => [

                        'userinfo' => [
                            'type' => 'text', // 字符串型
                            'analyzer'=>'ik_max_word', //ik_max_word 最细粒度拆分 ik_smart最粗粒度拆分
                            'search_analyzer'=> 'ik_max_word'
                        ]

                    ]
                ]
            ]
        ];

        $res_s_data = $esclient->indices()->putMapping($params);

        print_r($res_s_data);
        */

        /*
        //存入
        $params = [
            'index' => 'my_indexa',
            'type' => 'my_typea',
            'body' => [
                ['index' => [ '_id' => 1]],
                [
                    'testField' => 'abc',
                    'title' => '你好,从纵向即文档这个维度来看，每列代表文档包含了哪些单词，。',
                    'content' => '中国非常强大的哈哈哈,不错,及时这个时代的步伐,研究红色呢过名生命科学'
                ],
                ['index' => [ '_id' => 2]],
                [
                    'testField' => '青山绿水',
                    'title' => '无名英雄',
                    'content' => '力量是非常强大'
                ],
                ['index' => [ '_id' => 3]],
                [
                    'testField' => 'abc',
                    'title' => '代码的力量',
                    'content' => '天天上学'
                ]
            ]
        ];

        $a=$esclient->bulk($params);
        print_r($a);
        */

        /*取出
        $params = [
            'index' => 'my_indexa',
            'type' => 'my_typea',
            'id' => '1',
        ];

        $a=$esclient->get($params);
        print_r($a);
        */

        //搜索
        $search_params = [
            'index' => 'my_index_user1',//索引名
            'type' => 'my_type_user1',//类型
            'body' => [
                'query' => [
                    'match' => [
                        'userinfo' => '访问目录'
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
                        'userinfo' => new \stdClass()
                    ]
                ]
            ]
        ];
                $res = $esclient->search($search_params);
                print_r($res);







    }





}
