<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostReq extends FormRequest
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
                'post_detail' => 'required',
                'user_id' => 'required'
            ];
        }elseif(request()->isMethod('put')){
            return [
                'id' => 'required',
                'post_detail' => 'required',
                'user_id' => 'required'
            ];
        }
    }
}
