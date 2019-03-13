<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssortController extends CommonController
{
    //分类视图
    public function assort(){
        return view('Assort.assort');
    }
}
