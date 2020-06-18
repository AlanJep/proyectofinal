<?php

namespace DentalS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Routing\Route;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    // public function __construct(Route $route){
    //     $this->route=$route;
    // }

    public function authorize()
    {
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
             'usuario'=>'required',
            'password'=>'required',
            'email'=>['required',Rule::unique('users')->ignore($user->id)]
            // 'email'=>['required',Rule::unique('users')->ignore($user->id,'user_id')]
        ];
    }
}
