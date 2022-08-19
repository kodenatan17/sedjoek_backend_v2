<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TransactionRequest extends FormRequest
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
            'users_id' => 'required|exists:users_id,id',
            'address' => 'required|max:255',
            'status' => 'in:PENDING,SUCCESS,CANCELED,FAILED,SHIPPING,SHIPPED'            
        ];
    }
}