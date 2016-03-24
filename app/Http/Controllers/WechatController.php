<?php

namespace App\Http\Controllers;

use App\MsgImage;
use App\MsgText;
use App\Users;
use App\VoiceUsers;
use EasyWeChat\Foundation\Application;
use EasyWeChat\Message\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
//use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use League\Flysystem\Exception;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Overtrue\Wechat\Media;
use Overtrue\Wechat\Server;
use Overtrue\Wechat\User;
use Overtrue\Wechat\Menu;
use Overtrue\Wechat\MenuItem;
use Illuminate\Support\Facades\DB;


class WechatController extends Controller
{

    private $menu_service, $media_service, $server, $user, $menu, $material, $temporary;
    public function __construct(){
        $options = [
            'debug'  => true,
            'app_id' => Config::get('wechat.app_id'),
            'secret' => Config::get('wechat.secret'),
            'token'  => Config::get('wechat.token'),
        ];
        $app             = new Application($options);
        $this->server    = $app->server;
        $this->user      = $app->user;
        $this->menu      = $app->menu;
        $this->material  = $app->material;
        $this->temporary = $app->material_temporary;

    }

    public function serve(){
//        $options = [
//            'debug'  => true,
//            'app_id' => Config::get('wechat.app_id'),
//            'secret' => Config::get('wechat.secret'),
//            'token'  => Config::get('wechat.token'),
//            'log'    => [
//
//            ],
//        ];
//        $app = new Application($options);
////        $user = $app->user;
        $server_service = $this->server;
        $user_service = $this->user;
        $server_service->setMessageHandler(function ($message) use($user_service){
            switch($message->MsgType){
                case 'event':
                    switch($message->Event){
                        case 'subscribe':
                            $user = $user_service->get($message->FromUserName);
//                            file_put_contents(storage_path('logs/subsribe.log'), $message->FromUserName);
                            $affectedUserRows = Users::where('openid', $message->FromUserName)->update(['is_delete'=>0]);
                            if($affectedUserRows){
                                return "Hello，".$user->nickname."，欢迎再次回来，马上就到了当当2016年员工大会了，玩的开心哦，后面有大奖呢!";
                            }else{
                                $usersObj                 = new Users();
                                $usersObj->openid         = $message->FromUserName;
                                $usersObj->nickname       = $user->nickname;
                                $usersObj->sex            = $user->sex;
                                $usersObj->language       = $user->language;
                                $usersObj->city           = $user->city;
                                $usersObj->province       = $user->province;
                                $usersObj->country        = $user->country;
                                $usersObj->headimgurl     = $user->headimgurl;
                                $usersObj->subscribe_time = $user->subscribe_time;
                                $usersObj->groupid        = $user->groupid;
                                $usersObj->is_winner      = 0;
                                if($usersObj->save()){
                                    return "Hello，".$user->nickname."，欢迎首次关注，马上就到了当当2016年员工大会了，玩的开心哦，后面有大奖呢";
                                }
                            }
                            break;
                        case 'unsubscribe':
                                $openId = $message->FromUserName;
                                $affectedUserRows = Users::where('openid', $openId)->update(['is_delete'=>1]);
                                $affectedTextRows = MsgText::where('openid', $openId)->update(['is_delete'=>1]);
                                $affectedImageRows = MsgImage::where('openid', $openId)->update(['is_delete'=>1]);
                                if($affectedUserRows){
                                    //用户关注过
                                    if($affectedTextRows || $affectedImageRows){
                                        //用户曾经发过消息
                                    }else{
                                        //用户只是关注了还没有发消息
                                    }

                                }else{
                                    //用户首次关注
                                }
                            break;
                        case 'CLICK':
                            $media_id  = $message->EventKey;
//                            return $media_id;
                            $resources = $this->material->get($media_id);
//                            $thumb_media_ids = [];
//                            foreach ($resources as $resource) {
//                                $thumb_media_ids[] = $resource['thumb_media_id'];
//                            }
//                            $urls = $this->getNewsImageByMediaID($thumb_media_ids);
//                            $thumb_images = $this->getAllMediaImage();
//                            $images = [];
//                            foreach ($thumb_images as $key=>$thumb_image) {
//                                if($thumb_image['media_id'] == $media_id){
//                                    $images[] = $thumb_image['url'];
//                                }
//                            }
//                            $log = new Logger($media_id);
//                            $log->pushHandler(new StreamHandler(storage_path('/logs/warning.log'), Logger::WARNING));
//                            $log->addWarning('Foo');
                            $news = [];
                            foreach ($resources['news_item'] as $resource) {
//                                $log = new Logger($resource['title']);
//                                $log->pushHandler(new StreamHandler(storage_path('/logs/warning.log'), Logger::WARNING));
//                                $log->addWarning('Foo');
//                                return $urls[$resource['thumb_media_id']];
                                $news[] = new News([
                                    'title'       => $resource['title'],
                                    'description' => $resource['digest'],
                                    'url'         => $resource['url'],
                                    'image'       => $resource['thumb_url'],//fuckfuck!!!
//                                    'image'       => $thumb_images[9]['url'],
                                ]);
                            }

                            return $news;
                            break;
                        default:
                            break;
                    }
                    break;
                case 'text':
//                    $status = MsgText::create([
//                        'to_user_name' => $message->ToUserName,
//                        'openid'       => $message->FromUSerName,
//                        'msg_type'     => $message->MsgType,
//                        'content'      => $message->Content,
//                        'msg_id'       => $message->MsgId,
//                    ]);


//                    $log = new Logger($status);
//                    $log->pushHandler(new StreamHandler(storage_path('/logs/warning.log'), Logger::WARNING));
//                    $log->addWarning('Foo');

                    if($message->Content == Config::get('wechat.keyword')){
                        $url = url('/weixin/shake')."?times=".Config::get('wechat.times')."&openid=".$message->FromUserName;
                        return "<a href=\"$url\" >摇一摇抽奖,有大奖呢!!!点我!!!</a>";
                    }
                    if($message->Content == Config::get('wechat.vote_keyword')){
                        $vote_users = DB::table('voteusers')->where(['vote_name' => $message->FromUserName, 'is_delete' => 0])->get();
                        if($vote_users){
                            DB::table('voteusers')->where(['vote_name' => $message->FromUserName, 'is_delete' => 0])->update(['vote_times'=>2]);
                            return "你已经投过票了哦!!!";
                        }else{
//                            $status_voteusers = DB::table('voteusers')->insert(['vote_name' => $message->FromUserName]);
//                            if($status_voteusers){
                                $url = url('/liuxiang/vote')."?vote_times=1&open_id=".$message->FromUserName;
                                return "<a href=\"$url\">为好的节目投上一票吧!!!点我!!!</a>";
//                            }
                        }

//                        return "网络问题,请重新输入关键字吧";
                    }

                    $msg_text               = new MsgText();
                    $msg_text->to_user_name = $message->ToUserName;
                    $msg_text->openid       = $message->FromUserName;
                    $msg_text->msg_type     = $message->MsgType;
                    $msg_text->content      = $message->Content;
                    $msg_text->msg_id       = $message->MsgId;
                    $status                 = $msg_text->save();
//                    return Config::get('wechat.times').Config::get('wechat.keyword').$message->ToUserName.$message->FromUserName.$message->MsgType.$message->Content.$message->MsgId;
                    break;
                case 'image':
                    $msgImage = new MsgImage();
                    $msgImage->to_user_name = $message->ToUserName;
                    $msgImage->openid       = $message->FromUserName;
                    $msgImage->msg_type     = $message->MsgType;
//                    $msgImage->pic_url      = $message->PicUrl;
                    $downloadImg            = file_get_contents($message->PicUrl);
                    file_put_contents(public_path('/image/').$message->MsgId.'.jpg', $downloadImg);
                    $msgImage->pic_url      = '/image/'.$message->MsgId.'.jpg';
                    $msgImage->media_id     = $message->MediaId;
                    $msgImage->msg_id       = $message->MsgId;
                    $msgImage->save();
//                    return $message->PicUrl;
                    break;
                case 'voice':
                    if(empty($message->Recognition)){
                        return '语音为空,请重新讲话';
                    }
                    if($message->FromUserName == Config::get('wechat.voice_users')){
                        VoiceUsers::create([
                            'openid' => $message->FromUserName,
                            'token'  => $message->Recognition,
                        ]);
//                        DB::table('voiceusers')->insert(['openid'=>$message->FromUserName, 'token'=>$message->Recognition]);
                    }
                    return $message->Recognition;
                    break;
                default:
                    break;
            }
//            $openId = $message->FromUserName;
//            $fromUser = $user->get($openId);
//            return $message->FromUserName.$fromUser->nickname."您好！欢迎关注我!";
        });
//        return $server;
        $server_service->serve()->send();
    }
    //
//    public function serve(Server $server, User $userService){
//
//        $server->on('event', 'subscribe', function($event) use($userService){
////            return "欢迎关注";
//            $openId = $event->FromUserName;
//            $user = $userService->get($openId);
////            file_put_contents(__DIR__.'/../../../storage/logs/subsribe.log', $user->sex."\n");
//
//            $affectedUserRows = Users::where('openid', $openId)->update(['is_delete'=>0]);
//            if($affectedUserRows){
//                return "Hello，".$user->nickname."，今天是财务部2016年年会了，玩的开心哦，后面有大奖呢!";
//            }else{
//                $usersObj = new Users();
//                $usersObj->openid = $openId;
//                $usersObj->nickname = $user->nickname;
//                $usersObj->sex = $user->sex;
//                $usersObj->language = $user->language;
//                $usersObj->city = $user->city;
//                $usersObj->province = $user->province;
//                $usersObj->country = $user->country;
//                $usersObj->headimgurl = $user->headimgurl;
//                $usersObj->subscribe_time = $user->subscribe_time;
////                    $usersObj->unionid = $user->unionid;
////                    $usersObj->remark = $user->remark;
//                $usersObj->groupid = $user->groupid;
//                $usersObj->is_winner = 0;
//                $usersObj->save();
//                return "Hello，".$user->nickname."，今天是财务部2016年年会了，玩的开心哦，后面有大奖呢!";
//            }
//
//        });
//
////        $server->event('unsubscribe', function($event){
////            $openId = $event->FromUserName;
////            file_put_contents(__DIR__.'/../../../storage/logs/unsubsribe.log', "hello world"."\n");
////        });
//
//        $server->on('event', 'unsubscribe', function($event){
//            $openId = $event->FromUserName;
////            file_put_contents(__DIR__.'/../../../storage/logs/unsubsribe.log', "lixiang"."\n");
//            $affectedUserRows = Users::where('openid', $openId)->update(['is_delete'=>1]);
//            $affectedTextRows = MsgText::where('openid', $openId)->update(['is_delete'=>1]);
//            $affectedImageRows = MsgImage::where('openid', $openId)->update(['is_delete'=>1]);
//            if($affectedUserRows){
//                //用户关注过
//                if($affectedTextRows || $affectedImageRows){
//                    //用户曾经发过消息
//                }else{
//                    //用户只是关注了还没有发消息
//                }
//
//            }else{
//                //用户首次关注
//
//            }
//
//        });
//
//        $server->on('event', 'click', function($event){
//            $key = $event->EventKey;
//            $media_service = $this->mediaService();
//            $media_service->get($key);
//        });
//
//        $server->on('message', function($message) use ($userService){
////            file_put_contents(__DIR__.'/../../../storage/logs/http.log', $message->MsgType."\n");
//            switch ($message->MsgType){
////                case 'event':
//
////                    break;
//                case 'text':
////                    file_put_contents(__DIR__.'/../../../storage/logs/http.log', $message->FromUserName);
//                    $msgText = new MsgText();
//                    $msgText->to_user_name = $message->ToUserName;
//                    $msgText->openid       = $message->FromUserName;
//                    $msgText->msg_type     = $message->MsgType;
//                    $msgText->content      = $message->Content;
//                    $msgText->msg_id       = $message->MsgId;
//
//                    $openId = $message->FromUserName;
//                    $user = $userService->get($openId);
//                    $status = $msgText->save();
//                    if($status){
////                        if($msgText->content == Config::get('wechat.keyword')){
//                        if($msgText->content == env('key_word')){
//                            $url = URL::to("weixin/shake")."?times=".env('times')."&openid=".$msgText->openid;
////                            $url = URL::to("weixin/shake")."?openid=".$msgText->openid;
//                            return "<a href=\"$url\" >摇一摇抽奖</a>";
//                        }
////                        return $message->ToUserName."\n".$message->FromUserName."\n".$message->MsgId."\n".$message->Content;
//                        return "昵称:".$user->nickname."\n性别：".$user->sex;
//                    }else{
//                        return "fail";
//                    }
//
////                    $msgText->save();
////                    file_put_contents(__DIR__.'/../../../storage/logs/http.log', "wechat:".$message->Content);
//                    break;
//                case 'image':
//                    $msgImage = new MsgImage();
//                    $msgImage->to_user_name = $message->ToUserName;
//                    $msgImage->openid       = $message->FromUserName;
//                    $msgImage->msg_type     = $message->MsgType;
////                    $msgImage->pic_url      = $message->PicUrl;
//                    $downloadImg            = file_get_contents($message->PicUrl);
//                    file_put_contents(__DIR__.'/../../../public/image/'.$message->MsgId.'.jpg', $downloadImg);
//                    $msgImage->pic_url      = '/image/'.$message->MsgId.'.jpg';
//                    $msgImage->media_id     = $message->MediaId;
//                    $msgImage->msg_id       = $message->MsgId;
//                    $msgImage->save();
////                    return $message->PicUrl;
//                    break;
//                case 'voice':
//                    $msgText = new MsgText();
//                    $msgText->to_user_name = $message->ToUserName;
//                    $msgText->openid       = $message->FromUserName;
//                    $msgText->msg_type     = $message->MsgType;
//                    $msgText->content      = $message->Recognition;
//                    $msgText->msg_id       = $message->MsgId;
//                    $msgText->save();
////                    return $message->Recognition;
//                    break;
//                default:
//                    break;
//            }
//        });
//
////        $server->serve()->send();
//        return $server;
//    }


    public function getAllMenus(){
        $current_menus = $this->menu->all();
        $menus = null;
        foreach ($current_menus as $current_menu) {
            $menus = $current_menu['button'];
        }
//        dd($menus);
        return $menus;
    }

    public function postMenu(Request $request){
        $menus = $this->menuFormTidy($request);

//        $menu_service = $this->menuService();

//        $current_menus = $menu_service->get();

//        dd($current_menus);
//        $menus = Input::get('menus');
//        $menus = [
//            [
//                'name' => 'PHP',
//                'type' => 'view',
//                'url'  => 'http://www.baidu.com',
//            ],
//            [
//                'name' => 'Laravel',
//                'sub_button' => [
//                    [
//                        'name' => 'Route',
//                        'type' => 'view',
//                        'url'  => 'http://www.baidu.com',
//                    ],
//                    [
//                        'name' => 'Validation',
//                        'type' => 'view',
//                        'url'  => 'http://www.baidu.com',
//                    ],
//                ],
//            ],
//            [
//                'name' => 'JavaScript',
//                'type' => 'view',
//                'url'  => 'http://www.baidu.com',
//            ],
//        ];
//        $target = [];
//        foreach ($menus as $menu){
//            if(array_key_exists('key', $menu)){
//                $item = new MenuItem($menu['name'], $menu['type'], $menu['key']);
//            }else{
//                $item = new MenuItem($menu['name'], $menu['type'], $menu['url']);
//            }
//
//            if(!empty($menu['sub_button'])){
//                $buttons = [];
//                foreach($menu['sub_button'] as $button){
//                    if(array_key_exists('key', $button)){
//                        $buttons[] = new MenuItem($button['name'], $button['type'], $button['key']);
//                    }else{
//                        $buttons[] = new MenuItem($button['name'], $button['type'], $button['url']);
//                    }
//                }
//                $item->buttons($buttons);
//            }
//
//            $target[] = $item;
//        }

        try{
//            dd($menus);
            $this->menu->add($menus);
//            $menu_service->set($target);
            echo "Success to set Menu";
        }catch (Exception $e){
            echo "Fail to set menu".$e->getMessage();
        }

    }

    public function addMenuView(){
        return view('wechatmenu.add');
    }

    private function menuFormTidy(Request $request){
        $formAll = $request->all();
        $update_menus = [];
        $link = null;
        if($formAll['sub_menu_type'] == 'view'){
            $link = 'url';
        }else{
            $link = 'key';
        }
        if($formAll['sub_menu_grade'] != 'None'){
            $update_menus[$formAll['menu_grade']] = [
                'name' => $formAll['menu_name'],
                'sub_button' => [
                    $formAll['sub_menu_grade'] => [
                        'name'       => $formAll['sub_menu_name'],
                        'type'       => $formAll['sub_menu_type'],
                        $link        => $formAll['sub_menu_link'],
                        'sub_button' => [],
                    ],
                ],
            ];
        }else{
            $update_menus[$formAll['menu_grade']] = [
                'name' => $formAll['menu_name'],
                'type' => $formAll['menu_type'],
                $link  => $formAll['menu_link'],
                'sub_button' => [],
            ];
        }

        $current_menus = $this->getAllMenus();
//        dd($current_menus,$update_menus);

        if(array_key_exists($formAll['menu_grade'], $current_menus)){

            $current_menus[$formAll['menu_grade']]['name'] = $update_menus[$formAll['menu_grade']]['name'];
            if(!empty($update_menus[$formAll['menu_grade']]['sub_button'])){
                if(array_key_exists($formAll['sub_menu_grade'], $current_menus[$formAll['menu_grade']]['sub_button'])){
                    $tmp = $current_menus[$formAll['menu_grade']]['sub_button'][$formAll['sub_menu_grade']];
                    if($tmp['type'] == 'view'){
                        unset($tmp['url']);
                    }else{
                        unset($tmp['key']);
                    }
                    $current_link = null;
                    $tmp['name'] = $update_menus[$formAll['menu_grade']]['sub_button'][$formAll['sub_menu_grade']]['name'];
                    $tmp['type'] = $update_menus[$formAll['menu_grade']]['sub_button'][$formAll['sub_menu_grade']]['type'];
                    if($tmp['type'] == 'view'){
                        $current_link = 'url';
                    }else{
                        $current_link = 'key';
                    }
                    $tmp[$current_link]  = $update_menus[$formAll['menu_grade']]['sub_button'][$formAll['sub_menu_grade']][$link];
                    $current_menus[$formAll['menu_grade']]['sub_button'][$formAll['sub_menu_grade']] = $tmp;
                }else{
//                    dd($current_menus[$formAll['menu_grade']]['sub_button'], $update_menus[$formAll['menu_grade']]['sub_button']);
//                    $current_menus[$formAll['menu_grade']]['sub_button'] =  array_merge($current_menus[$formAll['menu_grade']]['sub_button'], $update_menus[$formAll['menu_grade']]['sub_button']);
                    $current_menus[$formAll['menu_grade']]['sub_button'] = $current_menus[$formAll['menu_grade']]['sub_button'] + $update_menus[$formAll['menu_grade']]['sub_button'];
                }
            }
        }else{
//            $current_menus = array_merge($current_menus, $update_menus);
            $current_menus = $current_menus + $update_menus;
        }

//        dd($current_menus);
        return $current_menus;
//        return $update_menus;
    }

    private function menuService(){
        $this->menu_service = new Menu(Config::get('wechat.app_id'), Config::get('wechat.secret'));
        return $this->menu_service;
    }

    private function mediaService(){
        $this->media_service = new Media(Config::get('wechat.app_id'), Config::get('wechat.secret'));
        return $this->media_service;
    }

    public function getAllMedia(){
//        $media_service = $this->mediaService();
        $medias = $this->material->lists('news');
//        $medias = $this->material->get('sczA1nlb7trp7YNGjXOZfMvQXUf-eWgwJuOAnJM3-ec');
//        $medias = $this->material->get('ygjO_UgXpX3m9ZogNtHHT2UZirx0ccPXvMBsUcHXBtE');
        dd($medias);
//        $medias = $this->material->lists('image');
//        dd($medias['item']);
//        $medias        = $media_service->lists('news');
        $result = [];
        foreach ($medias['item'] as $media) {
            $result[] = $media['url'];
        }
        dd($result);
    }

    public function getAllMediaImage(){
        $medias = $this->material->lists('image');
//        dd($medias);
        $result = [];
        foreach ($medias['item'] as $key=>$media) {
            $result[] = [
                'media_id' => $media['media_id'],
                'name'     => $media['name'],
                'url'      => $media['url'],
            ];
        }
//        dd($result);
        return $result;
    }

    public function getNewsImageByMediaID($media_ids = [])//ygjO_UgXpX3m9ZogNtHHT19y0s5GEMU-8gqrLUZcNOo,ygjO_UgXpX3m9ZogNtHHT1v2gf1Fhga6kyNFuxeJ7_8
    {
//        $media_ids = ['ygjO_UgXpX3m9ZogNtHHT19y0s5GEMU-8gqrLUZcNOo', 'ygjO_UgXpX3m9ZogNtHHT1v2gf1Fhga6kyNFuxeJ7_8'];
        $medias = $this->material->lists('image');
//        dd($medias);
        $result = [];
        foreach ($medias['item'] as $key=>$media) {
            $result[$media['media_id']] = [
                'media_id' => $media['media_id'],
                'name'     => $media['name'],
                'url'      => $media['url'],
            ];
        }
        $urls = [];
        foreach ($media_ids as $media_id) {
            if(array_key_exists($media_id, $result)){
                $urls[$media_id] = $result[$media_id]['url'];
            }
        }
//        foreach ($result as $item) {
//            if($item['media_id'] == $media_id){
//                return $item['url'];
//            }
//        }
        return $urls;
    }

    public function getAllUsers(){
        $all_users = $this->user->lists();
        $new_users = $all_users['data']['openid'];
        $open_id   = DB::table('users')->where(['is_delete' => 0])->lists('openid');
//        dd($open_id);
        $result    = [];
//        dd(count($open_id));
//        dd(count($new_users) - count($open_id));
//        dd($open_id);
//        dd($new_users);
        foreach ($new_users as $item) {
            if(!in_array($item, $open_id)){
                $result[] = $item;
            }
        }

        foreach ($result as $item) {
            $user   = $this->user->get($item);
            Users::create([
                'openid'     => $item,
                'nickname'   => $user->nickname,
                'sex'        => $user->sex,
                'language'   => $user->language,
                'city'       => $user->city,
                'province'   => $user->province,
                'country'    => $user->country,
                'headimgurl' => $user->headimgurl,
//                'unionid'    => $user->unionid,
//                'remark'     => $user->remark,
                'groupid'    => $user->groupid,
            ]);
        }
        return "OK";

//        $filter    = function($data)use($new_users, &$result){
//            if(in_array($data, $new_users)){
//                $result[] = $data;
////                array_push($result, $data);
//            }
//        };
//        array_map($filter, $open_id);
//        dd($result);
    }
}
