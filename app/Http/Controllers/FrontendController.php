<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
	public function getIndex(){
		return view('frontend.index');
	}
	public function getShake(){
		return view('frontend.shake');
	}
	public function getMessage(){
		return view('frontend.message');
	}
	public function specialIndex(){
		return view('frontend.special');
	}
}
