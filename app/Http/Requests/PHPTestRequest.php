<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PHPTestRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'person.*.name' => 'required',
            'person.*.age'  => 'required|integer|min:18',
//            'name'=>'required|max:100',
//            'employee.*.name'=>'required|max:100',
//            'employee.*.title'=>'required|max:100'
//            'exampleInputEmail1'=>'required',
//            'exampleInputPassword1'=>'required|integer',
        ];
    }
}
