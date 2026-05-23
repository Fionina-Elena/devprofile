<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use Illuminate\Support\Facades\Http;

class ContactFormController extends Controller
{
    public function store(ContactFormRequest $request)
    {
        $validated = $request->validated();
        $apiKey = env('UNISENDER_API_KEY');

        $senderEmail = 'filatowa.l2010@yandex.ru';
        $senderName = 'Елена Фионина';

        // 1. Отправка ВАМ (Владельцу)
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

        // Возвращаем ответ ВМЕСТЕ с отладочной информацией от Unisender
        return response()->json([
            'message' => 'success',
            'debug_owner' => $responseOwner->body(),
            'debug_client' => $responseClient->body()
        ], 200);
    }
}
