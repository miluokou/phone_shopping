<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    const UPDATED_AT = NULL;
    protected $table='shop_user_address';

    /**
     * 添加数据
     * @param $arr
     * @return mixed
     */
    public function AddressInsert($arr){
        return $this->insert($arr);
    }

    /**
     * 查询所有数据
     * @return mixed
     */
    public function AddressAll(){

        return $this->get();
    }

    /**
     * 查询单条数据
     * @param $where
     * @return mixed
     */
    public function AddressSelect($where){
        return $this->where($where)->first();
    }



    /**
     * 修改数据
     * @param $where
     * @param $data
     * @return mixed
     */
    public function updateAddress($where,$data){
        return $this->where($where)->update($data);
    }

    /**
     * 删除数据
     * @param $id
     * @return mixed
     */
    public function deleteAddress($id){
        return $this->where('id','=',$id)->delete();
    }
}
