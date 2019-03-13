<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    const UPDATED_AT = NULL;
    protected $table='shop_order_address';

    /**
     * 添加数据
     * @param $arr
     * @return mixed
     */
    public function OrderAddressInsert($arr){
        return $this->insert($arr);
    }

    /**
     * 查询所有数据
     * @return mixed
     */
    public function OrderAddressAll(){

        return $this->get();
    }

    /**
     * 查询单条数据
     * @param $where
     * @return mixed
     */
    public function OrderAddressSelect($where){

        return $this->where($where)->first();
    }



    /**
     * 修改数据
     * @param $where
     * @param $data
     * @return mixed
     */
    public function updateOrderAddress($where,$data){
        return $this->where($where)->update($data);
    }

    /**
     * 删除数据
     * @param $id
     * @return mixed
     */
    public function deleteOrderAddress($id){
        return $this->where('id','=',$id)->delete();
    }
}
