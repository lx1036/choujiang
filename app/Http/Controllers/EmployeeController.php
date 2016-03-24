<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmployeeController
 *
 * @author zhanglianjun
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Employees;
use Illuminate\Support\Facades\Log;
use Monolog\Handler\StreamHandlerTest;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


class EmployeeController extends Controller {

    /**
     * 加limit参数时，不洗牌，返回limit个数默认顺序列表
     * 不加limit时用于按员工名单抽奖
     * @return type
     */
    public function anyIndex(Request $request) {
//        $employees = Employees::where('wintimes', '!=',-1)->where('wintimes', '!=',2)->where('wintimes', '!=',3)->get(['id','number', 'name', 'department'])->toArray();
        $employees = Employees::where(['wintimes'=>0])->get(['id','number', 'name', 'department'])->toArray();
        shuffle($employees);
        return json_encode($employees, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    // 考虑到名字可能输错一个字的情况todo
    public function anySearch(Request $request) {
        $name = $request->get('name');
        $emp = Employees::where('name', 'like', '%' . $name . '%')->get(['number', 'name', 'department', 'wintimes']);
        return $emp;
    }

    /**
     * 被滤掉的员工名单
     */
    public function anyOut() {
        return Employees::where('wintimes', '<', 0)->get(['number', 'name', 'department', 'wintimes']);
    }

    //特等奖设wintimes=2,无参get,有参set
    public function anySetspecial(Request $request){
        $ret = -1;
        $numbers = $request->get('numbers');
        $grade   = $request->get('grade');
        if(!empty($numbers)){
            $numbers = explode(',', $numbers);

            $ret = DB::table('employees')->whereIn('number', $numbers)->update(['wintimes'=>2]);
        }else{
            return Employees::where('wintimes', 2)->get(['number', 'name', 'department', 'wintimes']);
        }
        //貌似总是0
        return $ret;
    }
    /**
     * 微信抽奖的中奖者从员工名单中过滤掉
     * 获奖次数加1，参数员工号，逗号隔开
     * 标记为-1不再参与抽奖
     * @param Request $request
     */
    public function anyFilter(Request $request) {
        $ret = -1;
        $numbers = $request->get('numbers');
        if(!empty($numbers)){
            $numbers = explode(',', $numbers);
            $ret = DB::table('employees')->whereIn('number', $numbers)->update(['wintimes'=>-1]);
        }
        //貌似总是0
        return $ret;
    }

    /*
     * 幸运奖150人，分3次抽，设置wintimes=5
     */
    public function anySetlucky(Request $request){
        $ret = -1;
        $ids = $request->get('ids');
        if(!empty($ids)){
            $ret = DB::table('employees')->whereIn('id', $ids)->update(['wintimes'=>3]);
        }else{
            $ret = DB::table('employees')->where('wintimes', 3)->get(['number', 'name', 'department']);
        }
        //貌似总是0
        return $ret;
    }

    /**
     * without arguments, reset wintimes to 0 for all
     * 带参数number时，reset特定员工
     */
    public function anyReset( Request $request ) {
        $ret = -1;
        $numbers = $request->get('numbers');
        if(!empty($number)){
            $ret = Employees::whereIn('number',$numbers)->where(['wintimes'=>-1])->update(['wintimes' => 0]);
        }else{
            $ret = DB::table('employees')->update(['wintimes' => 0]);
        }
        return $ret;
    }
/*************luckybooks表************/
    //幸运书单参与人
    public function anyLuckybooklist(){
        $data =  DB::table('luckybooks')->where('is_delete',0)->get(['id','number','name','book_name_1','book_name_2']);
        return $data;
    }
    //书单中奖者列表
    public function anyLuckybookwinners(){
        return DB::table('luckybooks')->where('is_delete',2)->get(['number','name','book_name_1','book_name_2']);
    }
    //设置书单中奖人is_delete设为2
    public function anySetluckybooklist(Request $req){
         
        $ids = $req->get('ids');
        DB::table('luckybooks')->where('is_delete',0)->whereIn('id',$ids)->update(['is_delete'=>2]);
        return 'Success';
    }
    public function anyResetluckybooklist(){
        $ret = DB::table('luckybooks')->where('is_delete',2)->update(['is_delete'=>0]);
        return $ret? '重置成功':'重置失败';
    }
/****************************/

    public function postSetPrize(Request $request)
    {
        $numbers = $request->get('numbers');
        $grade   = $request->get('grade');
//        $log = new Logger(gettype($numbers));
//        $log->pushHandler(new StreamHandler(storage_path('/logs/warning.log'), Logger::WARNING));
//        $log->addWarning('Foo');
        switch ($grade){
            case 'Three':
                 DB::table('employees')->where('number', $numbers)->update(['wintimes'=>3]);
                break;
            case 'Two':
                DB::table('employees')->where('number', $numbers)->update(['wintimes'=>2]);
                break;
            case 'One':
                DB::table('employees')->where('number', $numbers)->update(['wintimes'=>1]);
                break;
            case 'Special':
                DB::table('employees')->where('number', $numbers)->update(['wintimes'=>4]);
                break;
            case 'LuckyPerson':
                DB::table('employees')->whereIn('id', $numbers)->update(['wintimes'=>5]);
                break;
            default:
                break;
        }

        return 'Success';
    }
    
}
