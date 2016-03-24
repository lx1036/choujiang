<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;

class UrlController extends Controller
{
    //
    public function createUrl(){
        $rules = array(
            'link' => 'required|url'
        );
        //运行验证
        $validation = Validator::make(\Illuminate\Support\Facades\Input::get('link'),$rules);

        //如果验证失败，则返回主页面并提示错误信息
        if($validation->fails()) {
            return Redirect::to('/liuxiang/url')
                ->withInput()
                ->withErrors($validation);
        } else {
            //在数据库中存在是否有已经存在数据
            $link = Link::where('url','=',\Illuminate\Support\Facades\Input::get('link'))
                ->first();
            //如果存在，则把数据输出到视图中
            if($link) {
                return Redirect::to('/')
                    ->withInput()
                    ->with('link',$link->hash);
                //如果没有则创建数据
            } else {
                //首先创建一个新的hash值
                do {
                    $newHash = Str::random(6);
                } while(Link::where('hash','=',$newHash)->count() > 0);
                //然后把数据存入到数据中对应的字段中
                Link::create(array(
                    'url'	=> Input::get('link'),
                    'hash'	=> $newHash
                ));
                //最后把hash传递给视图
                return Redirect::to('/')
                    ->withInput()
                    ->with('link',$newHash);
            }
        }
    }

    public function test(){
        return "hello";
//        Input::all();
        $fruits = ['apple', 'apple'];
        foreach ($fruits as $fruit) {

        }

        foreach ($fruits as $fruit) {

        }
//        Lang::get()


//        return view('')
    }
}
