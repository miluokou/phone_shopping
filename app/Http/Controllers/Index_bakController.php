<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Index_bak;
class Index_bakController extends CommonController
{
    //商城视图
    public function index_bak(){
        return view('Index_bak.index_bak');
    }

    /**
     * 列表展示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function bak_list(){

        $back_model=new Index_bak();//实例化

        $data=$back_model->Index_bakAll()->toArray();

        return view('Index_bak.list',['std'=>$data,'title'=>'商品列表']);
    }

    /**
     *  商品详情
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function detail(Request $request){

        $id=$request->input('id');

        $back_model=new Index_bak();//实例化

        $where=['id'=>$id];

        $data=$back_model->Index_bakSelect($where)->toArray();
        return view('Index_bak.detail')
                    ->with(['title'=>'商品详情'])
                    ->with(['dtl'=>$data]);
    }


}
