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
        $apiKey = env('UNISENDER_API_KEY');

        $senderEmail = 'filatowa.l2010@yandex.ru';
        $senderName = 'Елена Фионина';

        // 1. Отправка ВАМ
        $responseOwner = Http::withHeaders([
            'X-API-KEY' => $apiKey,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->post('https://go.unisender.com/ru/transactional/api/v1/email/send.json', [
            "message" => [
                "recipients" => [["email" => $senderEmail]],
                "subject" => 'Новое сообщение "devprofile"',
                "from_email" => $senderEmail,
                "from_name" => $senderName,
                "body" => [
                    "html" => view('emails.owner', ['data' => $validated])->render()
                ]
            ]
        ]);

        // ЗАПИСЫВАЕМ ОТВЕТ В ЛОГ
        \Log::info('Unisender Response Owner: ' . $responseOwner->body());

        // 2. Отправка КЛИЕНТУ
        $responseClient = Http::withHeaders([
            'X-API-KEY' => $apiKey,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->post('https://go.unisender.com/ru/transactional/api/v1/email/send.json', [
            "message" => [
                "recipients" => [["email" => $validated['email']]],
                "subject" => 'Спасибо за обращение',
                "from_email" => $senderEmail,
                "from_name" => $senderName,
                "body" => [
                    "html" => view('emails.user', ['data' => $validated])->render()
                ]
            ]
        ]);

        \Log::info('Unisender Response Client: ' . $responseClient->body());

        return response()->json([
            'message' => 'success'
        ], 200);
    }
}
