<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LotteryDrawHelper
 *
 * @author zhanglianjun
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Employee;

class LotteryDrawHelper extends Controller{
    
    // 全体员工抽奖
    public function simpleDraw( $number = 1){
        $total = Employee::all()->toJson();
        return $total;
    }
}
