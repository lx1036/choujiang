<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MsgController
 *
 * @author zhanglianjun
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\MsgImage;
use App\MsgText;
use App\Users;
use App\Employee;
use App\Winners;

class UserController extends Controller {

    /**
     * 从users表中得到用户
     * @param type $time
     * @return type
     */
    public function anyIndex() {
        $users = Users::where('is_delete', '0')->get(['headimgurl', 'nickname', 'openid'])->toJson(JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        return $users;
    }

    // 通过摇一摇名单抽奖
    public function anyDraw(Request $request) {
        $openids = $request->get('openids');
        $users = DB::table('users')->whereIn('openid', $openids)->where('is_delete', '0')->get(['headimgurl', 'nickname', 'openid']);
        return $users;
    }

    public function anyMarkwinner() {

        $ret = -1;
        $openid = Input::get('openid');
        $shakeCount = Input::get('shakecount');
        $times = Input::get('times');
        $winner = DB::table('winners')->where('openid', $openid)->get();
        if (0 == count($winner)) {
            $winner = new Winners($openid, $shakeCount, $times);
            $ret = $winner->save();
        } else {
            $ret = DB::table('winners')->where('openid', $openid)->where('times', $times)->increment('shakecount');
        }
        return $ret;
    }
    
    /**
     * 摇出抽奖名单列表展示
     * @param type $times 第几次抽奖
     * @param type $count 抽出人数
     */
    public function anyShakelist(){
        $times = Input::get('times') ;
        $count = Input::get('count') ;
        $luckyOpenids = Winners::where('times', $times)->orderBy('shakecount','desc')->take($count)->get(['openid'])->toArray();
        $list = DB::table('users')->whereIn('openid',$luckyOpenids)->where('is_delete',0)->where('is_winner',0)->get(['headimgurl', 'nickname', 'openid']);
        return $list;
    }

}
