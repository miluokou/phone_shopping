<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EvaluateController extends Controller
{
    //待评价
    public function evaluate(){

        return view('Evaluate.evaluate');
    }

    //去评评价
    public function assess(){
        return view('Evaluate.assess');
    }

}
