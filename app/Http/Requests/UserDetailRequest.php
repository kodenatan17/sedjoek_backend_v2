<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserDetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name_full' => 'required|max:255',
            'ktp' => 'required|unique',
            'ktp_address' => 'required|max:255',
            'home_address' => 'required|max:255',
            'status_residence' => 'required',
            'profession' => 'required|max:255',
            'closest_family_phone' => 'required|integer',
            'closest_family_name' => 'required|max:255',
            'closest_family_relation' => 'required',
            'users_id' => 'required|exists:users,id',
            'emergency_surename' => 'required|max:255',
            'emergency_address' => 'required|max:255',
            'image_ktp' => 'required|image',
            'image_kk' => 'required|image',
        ];
    }
}
