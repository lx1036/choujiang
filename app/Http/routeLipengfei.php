<?php
/**
  设置摇一摇
 */

Route::any('/weixin/shake', function(){
	return view('WeChatWeb.shake');
});
Route::controller('/backend', 'BackendController');
Route::controller('/frontend', 'FrontendController');
Route::get('/special', function(){ return view('frontend.special');});
//Route::any('/shake', function(){ return view('frontend.shake'); });
Route::any('/{index?}', function(){ return view('frontend.index'); });
