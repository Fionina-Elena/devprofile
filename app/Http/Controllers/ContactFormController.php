<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use Illuminate\Support\Facades\Http;

class ContactFormController extends Controller
{
    public function store(ContactFormRequest $request)
    {
        $validated = $request->validated();
        $apiKey = env('UNISENDER_API_KEY'); // Ключ 6i3p7...

        $senderEmail = 'filatowa.l2010@yandex.ru';
        $senderName = 'Елена Фионина';

        $htmlOwner = view('emails.owner', ['data' => $validated])->render();
        $htmlUser = view('emails.user', ['data' => $validated])->render();

        // Используем V5 API (стандартный адрес)
        $responseOwner = Http::withHeaders([
            'X-API-KEY' => $apiKey,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->post('https://api.unisender.com/ru/v5/transactional/email/send', [
            "message" => [
                "recipients" => [["email" => $senderEmail]],
                "subject" => 'Новое сообщение "devprofile"',
                "from_email" => $senderEmail,
                "from_name" => $senderName,
                "body" => [
                    "html" => $htmlOwner
                ]
            ]
        ]);

        // 2. Отправка КЛИЕНТУ
        $responseClient = Http::withHeaders([
            'X-API-KEY' => $apiKey,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->post('https://api.unisender.com/ru/v5/transactional/email/send', [
            "message" => [
                "recipients" => [["email" => $validated['email']]],
                "subject" => 'Спасибо за обращение',
                "from_email" => $senderEmail,
                "from_name" => $senderName,
                "body" => [
                    "html" => $htmlUser
                ]
            ]
        ]);

        return response()->json([
            'message' => 'success',
            'debug_owner' => $responseOwner->body(),
            'debug_client' => $responseClient->body()
        ], 200);
    }
}
