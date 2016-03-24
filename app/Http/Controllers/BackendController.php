<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use App\Employees;
use App\Config;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
	public function getIndex(){
		$msgs[] = [
			"info" => '目前关注用户数',
			"show" => DB::table('users')->where("is_delete", "0")->count(),
		];
		$msgs[] = [
			"info" => '一、二、三等奖已获奖人数',
			"show" => DB::table('users')->where("is_delete", "0")->where("is_winner", "NULL")->count(),
		];
		$msgs[] = [
			"info" => '文本消息发送条数',
			"show" => DB::table('msg_text') -> where ("is_delete", "0")->count(),
		];
		$msgs[] = [
			"info" => '第三次抽奖人数',
			"show" => DB::table('employees')->count(),
		];
		return view('backend.index') -> with ('msgs', $msgs);
	}
	public function getLotterymanagement(){
		return view('backend.lotterymanagement');
	}

	public function getScenemanagement(){
		$messages = DB::table('msg_text')->select('id', 'openid','content', 'created_at')->where('is_delete', 0)->paginate(5);
		$iter = 1;
		foreach($messages as &$message){
			$message->iter = $iter;
			$obj = DB::table('users')->select('nickname')->where('openid', $message->openid)->get();
			if (empty($obj)){
				$message->nickname = '?';
			}else{
				$message->nickname = $obj[0]->nickname;
			}
			$iter += 1;
		}
		return view ('backend.scenemanagement', ['messages' => $messages]);
	}
	public function getMessagemanagement(){
		return view ('backend.messagemanagement');
	}
	public function getShowresult(){
		return view ('backend.showresult', [
		]);
	}
	public function postFiltermsg(){
		$ids = Input::get('ids');
		$except_ids = Input::get('except_ids');
		if (DB::table('msg_text') -> whereIn('id', explode(',', $ids)) -> update(['is_delete' => -1]) >= 0 && DB::table('msg_text') -> whereIn('id', explode(',', $except_ids)) -> update(['is_delete' => 1]) >= 0){
			return "true";
		}
		return "false";
	}
        /**
         * 设置第times次微信抽奖
         */
        public function anySetconfig( ){
            
            $input = Input::all();
            $times =  $input['times'];
            $set = new Config('shake_begin_time_'.$times, $input['begin_time']);
            $set->save();
            $set = new Config('lottery_num_'.$times, $input['lottery_num']);
            $set->save();
            //摇一摇口令
            $set = new Config('shake_passwd_'.$times, $input['shake_passwd']);
            $set->save();
            $set = new Config('images_count_'.$times, $input['images_count']);
            $set->save();
            return 1;
        }
}
