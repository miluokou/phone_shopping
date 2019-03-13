<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sign extends Model
{
    const UPDATED_AT = NULL;
    protected $table='user_sign';

    /**
     * 添加数据
     * @param $arr
     * @return mixed
     */
    public function SignInsert($arr){
        return $this->insert($arr);
    }

    /**
     * 查询所有数据
     * @return mixed
     */
    public function SignAll(){

        return $this->get();
    }

    /**
     * 查询单条数据
     * @param $where
     * @return mixed
     */
    public function SignSelect($where){

        return $this->where($where)->first();
    }



    /**
     * 修改数据
     * @param $id
     * @param $name
     * @return mixed
     */
    public function updateSign($id,$name){
        return $this->where('id','=',$id)->update($name);
    }

    /**
     * 删除数据
     * @param $id
     * @return mixed
     */
    public function deleteSign($id){
        return $this->where('id','=',$id)->delete();
    }







}
