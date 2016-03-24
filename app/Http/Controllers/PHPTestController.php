<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\PHPTestRequest;

class PHPTestController extends Controller
{
    //
    public function arrayMapTest(){
//        $arr1   = ['php', 'js'=>'js', 'laravel'];
//        $arr2   = ['array_map', 'map', 'array_map'];
//        $result1 = array_map(null, $arr1, $arr2);
        $result = array_map(function($var){
            return strtolower($var);
        }, ['PHP', 'LARAVEL', 'SYMFONY']);
//        $arr_unique1 = ['php', 'laravel', 'js', 'js', 'laravel'];
//        $arr_unique2 = [4, '4', 5, '5', 6, 5, '6', '7', '9'];
//        $arr_flip = ['php', 'laravel', 'symfony'];
        $arr_flip = ['php'=>'php','laravel'=>'laravel', 'symfony', 'php'];
//        dd(array_unique($arr_unique2, SORT_REGULAR));
        dd(array_flip(array_flip($arr_flip)));
    }

    public function getValidatorTest(){
        return view('liuxiang.validator.validator');
    }
    public function postValidatorTest(PHPTestRequest $request){
//        $this->validate($request, [
//            'exampleInputEmail1'=>'required',
//            'exampleInputPassword1'=>'required|integer',
//        ]);

//        $validator = Validator::make($request->all(), [
//            'exampleInputEmail1'=>'required',
//            'exampleInputPassword1'=>'required|integer',
//        ]);
//        if($validator->fails()){
//            return redirect('/liuxiang/laravel/validator')->withErrors($validator, 'login')->withInput();
//        }
//        $email = $request->get('exampleInputEmail1');
//        $password = $request->get('exampleInputPassword1');
//        dd('OK');
//        $email = Input::get('exampleInputEmail1');
//        $password = Input::get('exampleInputPassword1');
//        dd($email."/".$password);
        dd('OK');
    }

    public function getValidator(){
        return view('liuxiang.validator.validator');
    }

//    public function postValidator(PHPTestRequest $request){
    public function postValidator(Request $request){
//        $tmp = $request->get('name');
//        return $tmp;
        $this->validate($request, [
            'person.*.name' => 'required',
            'person.*.age'  => 'required|integer',
        ], ['person.*.name.required' => 'Required']);
        dd('form post success!!!');
    }
}
