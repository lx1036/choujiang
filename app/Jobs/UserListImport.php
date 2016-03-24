<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/2/1
 * Time: 下午5:57
 */

namespace App\Jobs;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Files\ExcelFile;

class UserListImport extends ExcelFile
{
    private $request;
    public function __construct(Request $request){
        $this->request = $request;
    }

    public function getFileInstance(){
        $file = $this->request->file('excel');
        if($file->isValid()){
            return $file;
        }
    }

    public function getFile(){
        $file = $this->getFileInstance();
        $file->move(storage_path('app'), $this->getFileName());
        return storage_path('app').'/'.$this->getFileName();
    }

    public function getFileName(){
        $file = $this->getFileInstance();
        $file->getClientOriginalName();
    }

    public function importExcel(){
        Excel::load($this->getFile(), function($reader){

        });
    }
}