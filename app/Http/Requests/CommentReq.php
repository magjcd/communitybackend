<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentReq extends FormRequest
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
                'comment_detail' => 'required',
                'user_id' => 'required',
                'post_id' => 'required'
            ];
        }if(request()->isMethod('put')){
            return [
                'id' => 'required',
                'comment_detail' => 'required'
            ];
        }
    }
}
