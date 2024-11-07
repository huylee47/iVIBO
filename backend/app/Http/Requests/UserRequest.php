<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = $this->route('id'); 
    
        return [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $userId, 
            'email' => 'required|email|unique:users,email,' . $userId, 
            // 'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', Chưa có view thêm ảnh
            'avatar' => 'required',
            'address' => 'nullable|string|max:500',
            'phone_number' => 'required|string|max:10', 
            'password' => 'required|string|min:6',
        ];
    }
    
}
