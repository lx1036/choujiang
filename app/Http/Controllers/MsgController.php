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
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\MsgImage;
use App\MsgText;
use App\Users;

class MsgController extends Controller {
    

    /**
     * new-msgs
     * @param type $time
     * @return type
     */
    public function getNewmsgs($time = 0) {
        $msgTextArr = DB::table('users')->join('msg_text', 'users.openid', '=', 'msg_text.openid')
                ->select('users.nickname', 'users.headimgurl', 'msg_text.msg_type', 'msg_text.content', 'msg_text.created_at');
        $msgImageArr = DB::table('users')->join('msg_img', 'users.openid', '=', 'msg_img.openid')
                ->select('users.nickname', 'users.headimgurl', 'msg_img.msg_type', 'msg_img.pic_url', 'msg_img.created_at');
        $msgs = $msgTextArr->union($msgImageArr)->orderBy('created_at', 'asc')->get();
        $msgArr = [];
        foreach ($msgs as $msg) {
            $msgArr[] = get_object_vars($msg);
        }

//        print_r($msgArr );
        return $msgArr;
    }

    /**
     * @param \App\Http\Controllers\Request $request
     * @return type
     */
    public function getNewimagemsgs( Request $request){
        $id = $request->get('id');
        $id = empty($id)? 0 :$id;
        $images = MsgImage::where('id','>',$id)->where('is_delete',0,'and')->orderBy('id')->get(['id','pic_url']);
       
        return $images->toJson();
//        return $images->toArray();
//        echo json_encode($new_img_arr,JSON_UNESCAPED_SLASHES);
    }
    
    public function getNewtextmsgs() {
        $sql = 'SELECT nickname,headimgurl,msg_type,content FROM users,msg_text where users.openid = msg_text.openid order by msg_text.created_at desc';
        $msgTextArr = DB::table('users')->join('msg_text', 'users.openid', '=', 'msg_text.openid')
                ->select('users.nickname', 'users.headimgurl', 'msg_text.msg_type', 'msg_text.content', 'msg_text.created_at') 		
								->where('msg_text.is_delete', '-1')
                ->orderBy('created_at', 'asc')->get();
        $msgArr = [];
        foreach ($msgTextArr as $msg) {
            $msgArr[] = get_object_vars($msg);
        }
        return $msgArr;
    }
    public function getNewtexthtmlmsgs() {
//        $sql = 'SELECT nickname,headimgurl,msg_type,content FROM users,msg_text where users.openid = msg_text.openid order by msg_text.created_at desc';
        $msgTextArr = DB::table('users')->join('msg_text', 'users.openid', '=', 'msg_text.openid')
                             ->select('users.nickname', 'users.headimgurl', 'msg_text.msg_type', 'msg_text.content', 'msg_text.created_at')
                             ->where('msg_text.is_delete', '0')
                             ->take(4)
                             ->orderBy('created_at', 'dsc')->get();
//				$tag = true;
//        foreach ($msgTextArr as &$msg) {
//					$msg->class= $tag == true ? 'right' : 'left';
//					$tag = !$tag;
//        }
//        dd($msgTextArr);
        return view('frontend.chat',['msgArr' => $msgTextArr]);
    }

}
