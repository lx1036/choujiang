<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/1/16
 * Time: 下午6:24
 */
Route::get('/debug_backtrace', function () {
//    return view('welcome');
//    return "<h1>刘祥</h1>";
    return debug_backtrace();
});
//Route::group(['middleware' => ['web']], function () {
//    //
//});


//////////////////////////<<Laravel Application Development Blueprints>>书籍练习/////////////////////
Route::get('/liuxiang/url', function(){
    return view('liuxiang.url.form');
});
Route::post('/url', 'UrlController@createUrl');
Route::get('/liuxiang/{hash}',function($hash) {
    //我们会根据hash的值，来查询数据库中对应的链接并保存在$link变量中
    $link = Link::where('hash','=',$hash)
        ->first();
    //如果存在，则跳转到对应的链接
    if($link) {
        return Redirect::to($link->url);
        //如果没有，则返回相关的错误信息
    } else {
        return Redirect::to('/')
            ->with('message','失效的链接');
    }
})->where('hash', '[0-9a-zA-Z]{6}');
//////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////微信开发////////////////////////////////
Route::any('/wechat', 'WechatController@serve');

Route::controller('prize', 'UploadController');

Route::get('liuxiang/vote', 'UploadController@getVote');
Route::get('liuxiang/click/vote', 'UploadController@getVoteResult');
Route::post('liuxiang/vote', 'UploadController@postVote');

Route::get('liuxiang/wechat/getallmenus', 'WechatController@getAllMenus');
Route::post('/liuxiang/wechat/menu', 'WechatController@postMenu');
//Route::get('/liuxiang/menu/menu', 'WechatController@getMenu');
Route::get('/liuxiang/wechat/media', 'WechatController@getAllMedia');
Route::get('/liuxiang/wechat/mediaids', 'WechatController@getNewsImageByMediaID');
Route::get('/liuxiang/wechat/mediaimage', 'WechatController@getAllMediaImage');
Route::get('liuxiang/wechat/chart', 'UploadController@getChart');
Route::get('liuxiang/wechat/highchart', 'UploadController@getHighCharts');
Route::get('liuxiang/wechat/ajaxhighchart', function(){
    return view('liuxiang.highchart.sample1');
});
Route::get('/liuxiang/wechat/prizevoicestop', 'UploadController@getPrizeVoiceStop');


Route::get('liuxiang/button/chart', 'UploadController@getChartButton');
Route::get('liuxiang/wechat/luckyperson', 'UploadController@getLuckyPerson');
Route::get('liuxiang/wechat/specialprizeperson', 'UploadController@getSpecialPrizePerson');
Route::get('liuxiang/wechat/allusers', 'WechatController@getAllUsers');
Route::get('/liuxiang/button/resetvoteusers', function () {
    \Illuminate\Support\Facades\DB::table('voteusers')->truncate();
//    \Illuminate\Support\Facades\DB::table('voteusers')->update(['is_delete'=>1]);
    dd('成功重置投票人员!!!');
});
Route::get('/liuxiang/button/resetvoteitem', function () {
//    \Illuminate\Support\Facades\DB::table('votes')->truncate();
    \Illuminate\Support\Facades\DB::table('votes')->update(['vote_count'=>0]);
    dd('成功重置投票节目!!!');
});

Route::get('liuxiang/config/test', function () {
    $item_name = \Illuminate\Support\Facades\Config::get('wechat.item_name');
    dd($item_name[0]);
});

Route::get('liuxiang/wechat/luckbook', 'UploadController@getLuckBook');
Route::post('liuxiang/wechat/luckbook', 'UploadController@postLuckBook');
Route::get('liuxiang/wechat/luckbookresult', 'UploadController@getLuckBookResult');
Route::get('liuxiang/wechat/prizeresult', 'UploadController@getPrizeResult');
Route::get('liuxiang/wechat/allluckybooks', 'UploadController@getAllLuckyBooks');
Route::get('liuxiang/wechat/testallluckybooks', 'UploadController@getTestAllLuckyBooks');

Route::get('liuxiang/wechat/ajaxwall', 'UploadController@getAjaxWechatWall');
Route::get('liuxiang/wechat/wall', function(){
    return view('frontend.wechatwall');
});


Route::get('task', function(){
    return view('task.tasklist');
});

Route::get('/upload', function(){
   return view('liuxiang.files.upload');
});
Route::post('/upload', 'UploadController@uploadtest');

Route::post('/liuxiang/shake/tokensetting', 'UploadController@tokenSetting');
Route::post('/liuxiang/shake/tokendelete', 'UploadController@tokenDelete');
/*Route::group(['prefix'=>'/liuxiang/shake/toggle'], function(){
    if(!empty(\Illuminate\Support\Facades\Input::get('start'))){
//        return "start";
//        Route::post('/', 'UploadController@shakeToggle');
        Route::get('/toggle', function(){
            return 'start';
        });
    }else{
//        return "close";
//        Route::post('/', 'UploadController@shakeToggle');
        Route::get('/toggle', function(){
            return 'close';
        });
    }
    Route::get('/toggle', function(){
        return 'llll';
    });
//    return "fail";
});*/
Route::post('/liuxiang/shake/toggle', 'UploadController@shakeToggle');
Route::get('/liuxiang/wechattoken', function(){
    dd(Hash::make('choujiang'));

    $env_file = base_path('.env');
    if(!file_exists($env_file)){
        return "file doesnot exist!";
    }
    $env_data = parse_ini_file($env_file);
    $key_word = ['key_word'=>'文化'];
    $env_data = array_merge($env_data, $key_word);
    foreach($env_data as $key=>$value){
        $env_data[$key] = $key.'='.$value;
    }
    $content  = implode($env_data, "\n");
    \Illuminate\Support\Facades\File::put($env_file, $content);
    return "OK";
});
Route::get('liuxiang/gettoken', 'UploadController@getToken');

//Route::group(['middleware'=>'web'], function(){
    Route::get('liuxiang/laravel/validator', 'PHPTestController@getValidatorTest');
    Route::post('liuxiang/laravel/validator', 'PHPTestController@postValidatorTest');
    Route::get('liuxiang/laravel/test/validator', 'PHPTestController@getValidator');
    Route::post('liuxiang/laravel/test/validator', 'PHPTestController@postValidator');
//});
////
/////////////////////02310801/////////////////////////////////
Route::get('02310801', function(){
    return view('liuxiang.bootstrap.3DGallery');
});

///////////////////////////卖场需求/////////////////////
Route::get('salemarket/bookspecial', function(){
    return view('liuxiang.salemarket.bookspecial.tasklist');
});

//卖场服务器列表
Route::get('develop/serverlist', function(){
    return view('liuxiang.serverlist');
});

//////////////////////////////////////////////////////////////
Route::get('liuxiang/hello', function(){
    return "Hello World";
});
Route::get('ng-app', function(){
    $view = require_once(resource_path('liuxiang/angularjs').'/hello.html');
   return $view;
//    return view('liuxiang.angularjs.hello');
});

Route::get('liuxiang/phptest', function(){
//    $a = 'world';
//    if(true){
//        $a = 'hellodd';
//    }
//    $i = 1;
//    while($i < 10){
//        $i += 1;
//        $b  = $i;
//    }
//    var_dump($b);
});
Route::get('liuxiang/liuxiang', 'UrlController@test');
//Route::get('user', 'WechatController@');
Route::get('/liuxiang/css3', function () {
    $date = date('Y-m-d H:i:s');
    dd($date);
    $current_time = strtotime(date('Y-m-d H:i:s'));
    $end_time     = strtotime('2016-3-16 24:00:00');
    dd($current_time, $end_time);

//    return view('liuxiang.css3.css3test01');
});

Route::get('liuxiang/highcharts', function () {
    return view('liuxiang.highchart.sample1');
});

Route::get('liuxiang/wechat/curl', function () {
//    $phoneNumber ="13912345678";
//    $message = "testMessage";
//    $curlPost = "phone=".urlencode($phoneNumber)."&message=".$message;
//    $ch=curl_init();
//    curl_setopt($ch,CURLOPT_URL,'http://micronet.site/liuxiang/wechat/curlpost');
//    curl_setopt($ch,CURLOPT_HEADER,0);
//    curl_setopt($ch,CURLOPT_RETURNTRANSFER,0);
//    curl_setopt($ch,CURLOPT_POST,1);
//    curl_setopt($ch,CURLOPT_POSTFIELDS,$curlPost);
//    $data = curl_exec($ch);
//    curl_close($ch);
//    if($data){
//        return "OKKKK";
//    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://micronet.site/liuxiang/wechat/curlpost');
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec();
    curl_close();
    var_dump($data);


});


Route::post('liuxiang/wechat/curlpost', function () {
    if(!empty($_POST)){
        var_dump($_POST);
    }
    return "null";
});
Route::get('liuxiang/pdotest', function () {
    $dsn      = 'mysql:dbname=test;host=choujiangdb.mysqldb.chinacloudapi.cn';
    $user     = 'choujiangdb%dell1950';
    $password = 'Dang@dang123';
    $dbh      = null;
    try{
        $dbh  = new PDO($dsn, $user, $password);
    }catch(PDOException $e){
        echo "Connection failed: ".$e->getMessage();
    }
    for($i=0; $i<10; $i++){
//        $sql  = 'INSERT INTO msgtexttext(id, name) VALUE (:id, :name)';
        $sql  = 'INSERT INTO `msgtexttext`(name) VALUE (:name)';
        $data = [
//            ':id'    => '',
            ':name'  => 'user_'.$i,
        ];
        $sth      = $dbh->prepare($sql);
        $dbresult = $sth->execute($data);
        echo 'insert:'.$dbresult.'<br>';
//        if(!$sth->execute($data)){
//            return 'Fail to insert database';
//        }
    }
//    $sql_new  = 'INSERT INTO msgtexttext(id, name) VALUE (:id, :name)';
    $sql_new  = 'INSERT INTO `msgtexttext`(name) VALUE (:name)';
    $data_new = [
//        ':id'    => '',
        ':name'  => 'user_new',
    ];
    $sth     = $dbh->prepare($sql_new);
    $sth->execute($data_new);
    $last_id = $dbh->lastInsertId();
    echo 'last id:'.$last_id;

});

Route::get('/liuxiang/wechat/getallwechatimg', 'UploadController@getAllWechatImg');
Route::get('emoji', function () {
    return view('liuxiang.emoji');
});

