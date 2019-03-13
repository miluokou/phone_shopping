<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    const UPDATED_AT = NULL;
    protected $table='shop_Buy';

    /**
     * 添加数据
     * @param $arr
     * @return mixed
     */
    public function BuyInsert($arr){
        return $this->insert($arr);
    }

    /**
     * 查询所有数据
     * @return mixed
     */
    public function BuyAll(){

        return $this->get();
    }

    /**
     * 查询单条数据
     * @param $where
     * @return mixed
     */
    public function BuySelect($where){

        return $this->where($where)->first();
    }



    /**
     * 修改数据
     * @param $where
     * @param $data
     * @return mixed
     */
    public function updateBuy($where,$data){
        return $this->where($where)->update($data);
    }

    /**
     * 删除数据
     * @param $id
     * @return mixed
     */
    public function deleteBuy($id){
        return $this->where('id','=',$id)->delete();
    }
}
