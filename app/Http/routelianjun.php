<?php
Route::get('/dangdang/wechat/choujiang',function(){
    return view('index');
});
Route::get('/result',function(){
    View::addExtension('html', 'php');
    return view('frontend.result');
});
Route::get('/specialprize',function(){
    return view('frontend.specialprize');
});
Route::get('/mychart',function(){
    return view('frontend.chartwithnav');
});
Route::get('/luckybookmagnify',function(){
    return view('frontend.booklist_magnify');
});
Route::get('/lucky',function(){
    return view('frontend.lucky');
});
Route::get('/luckybooklottery',function(){
    return view('frontend.luckybooklottery');
});
Route::get('/bubble',function(){
    View::addExtension('html', 'php');
    return view('frontend.bubble');
});
Route::controller('user', 'UserController');//微信关注用户

//按员工名单抽
Route::controller('employee','EmployeeController');
//Route::resource('employee','EmployeeController');


//图片和文本消息路由
//Route::controller('msg','MsgController');

//	return Redirect::action("EmployeeController@{$model}");
//});
