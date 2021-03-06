<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Index extends Model
{
    const UPDATED_AT = NULL;
    protected $table='phone_goods';

    /**
     * 添加数据
     * @param $arr
     * @return mixed
     */
    public function IndexInsert($arr){
        return $this->insert($arr);
    }

    /**
     * 查询所有数据
     * @return mixed
     */
    public function IndexAll(){

        return $this->get();
    }

    /**
     * 查询单条数据
     * @param $where
     * @return mixed
     */
    public function IndexSelect($where){

        return $this->where($where)->first();
    }



    /**
     * 修改数据
     * @param $id
     * @param $name
     * @return mixed
     */
    public function updateIndex($id,$name){
        return $this->where('id','=',$id)->update($name);
    }

    /**
     * 删除数据
     * @param $where
     * @return mixed
     */
    public function deleteIndex($where){
        return $this->where($where)->delete();
    }
}
