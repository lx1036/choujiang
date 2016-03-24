<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyAuthController
 *
 * @author zhanglianjun
 */

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use \Illuminate\Http\Request;

class MyAuthController extends Controller {
   
    /**
     * @Get("loginCheck")
     */
    public function loginCheck( Request $request){
        if(Auth::check() == false){
            return Redirect::guest('login');
        }
    }
}
