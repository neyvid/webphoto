<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
        return [
            'name'=>'required',
            'lastname'=>'required',
            'email'=>'required|email:filter',
            'mobile'=>'required|regex:/09(0[1-5]|1[0-9]|2[0-2]|3[0-9]|9[4|8|9])-?[0-9]{3}-?[0-9]{4}$/',
            'phone'=>'required',
            'sex'=>'required',
            'address'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'نام خود وارد نمایید',
            'lastname.required'=>'نام خانوادگی خود وارد نمایید',
            'email.required'=>'ایمیل خود وارد نمایید',
            'email.email'=>'ایمیل وارد شده صحیح نمی باشد',
            'mobile.required'=>'شماره همراه خود را وارد نمایید',
            'mobile.regex'=>'شماره همراه وارد شده صحیح نمی باشد',
            'phone.required'=>'شماره تلفن ثابت خود وارد نمایید',
            'sex.required'=>'جسنیت خود وارد نمایید.',
            'address.required'=>'آدرس پستی خود را وارد نمایید',
        ];
    }
}
