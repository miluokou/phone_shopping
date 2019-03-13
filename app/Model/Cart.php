<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    const UPDATED_AT = NULL;
    protected $table='shop_cart';

    /**
     * 添加数据
     * @param $arr
     * @return mixed
     */
    public function CartInsert($arr){
        return $this->insert($arr);
    }

    /**
     * 查询所有数据
     * @return mixed
     */
    public function CartAll(){

        return $this->get();
    }

    /**
     * 查询单条数据
     * @param $where
     * @return mixed
     */
    public function CartSelect($where){

        return $this->where($where)->get();
    }



    /**
     * 修改数据
     * @param $where
     * @param $data
     * @return mixed
     */
    public function updateCart($where,$data){
        return $this->where($where)->update($data);
    }

    /**
     * 删除数据
     * @param $id
     * @return mixed
     */
    public function deleteCart($id){
        return $this->where('id','=',$id)->delete();
    }
}
