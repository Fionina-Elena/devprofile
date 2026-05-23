<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'phone' => 'nullable|string',
            'email' => 'required|email|max:50',
            'message' => 'required|string|max:200',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Заполните поле "Имя".',
            'name.max' => 'Имя должно содержать не более 50 символов.',
            'email.required' => 'Заполните поле "Email".',
            'email.email' => 'Введите корректный email.',
            'email.max' => 'Email должен содержать не более 50 символов.',
            'message.required' => 'Заполните поле "Сообщение".',
            'message.max' => 'Сообщение должно содержать не более 200 символов.',
        ];
    }
}
