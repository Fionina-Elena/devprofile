<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
// Убираем use Mail и Mailables, они больше не нужны
use Illuminate\Support\Facades\Http; // Добавляем HTTP клиент

class ContactFormController extends Controller
{
    public function store(ContactFormRequest $request)
    {
        $validated = $request->validated();

        // Получаем ключ из переменных окружения Render
        $apiKey = env('UNISENDER_API_KEY');

        // Данные отправителя (Ваша подтвержденная почта)
        $senderEmail = 'filatowa.l2010@yandex.ru';
        $senderName = 'Елена Фионина';

        // --- 1. Подготовка письма ВЛАДЕЛЬЦУ (Вам) ---

        // Берем HTML из вашего существующего шаблона resources/views/emails owner.blade.php
        $htmlOwner = view('emails.owner', ['data' => $validated])->render();

        Http::withHeaders([
            'X-API-KEY' => $apiKey,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->post('https://go.unisender.com/ru/transactional/api/v1/email/send.json', [
            "message" => [
                "recipients" => [
                    ["email" => $senderEmail] // Отправляем вам
                ],
                "subject" => 'Новое сообщение "devprofile"',
                "from_email" => $senderEmail,
                "from_name" => $senderName,
                "body" => [
                    "html" => $htmlOwner // Вставляем готовый HTML
                ]
            ]
        ]);

        // --- 2. Подготовка письма КЛИЕНТУ ---

        // Берем HTML из шаблона resources/views/emails/user.blade.php
        $htmlUser = view('emails.user', ['data' => $validated])->render();

        Http::withHeaders([
            'X-API-KEY' => $apiKey,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->post('https://go.unisender.com/ru/transactional/api/v1/email/send.json', [
            "message" => [
                "recipients" => [
                    ["email" => $validated['email']]
                ],
                "subject" => 'Спасибо за обращение',
                "from_email" => $senderEmail,
                "from_name" => $senderName,
                "body" => [
                    "html" => $htmlUser // Вставляем готовый HTML
                ]
            ]
        ]);

        return response()->json([
            'message' => 'success'
        ], 200);
    }
}
