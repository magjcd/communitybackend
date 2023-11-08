<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpReq extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if(request()->isMethod('post')){
            return [
                'full_name' => 'required',     
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
                'cpassword' => 'required|same:password',
                'role_id' => 'required'
            ];
        }elseif(request()->isMethod('put')){
            return [
                'full_name' => 'required',     
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
                'cpassword' => 'required|same:password',
                'role_id' => 'required'
            ];
        }
    }
}
