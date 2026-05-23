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

        //  HTML
        $htmlOwner = view('emails.owner', ['data' => $validated])->render();
        $htmlUser = view('emails.user', ['data' => $validated])->render();

        // 1. Отправка мне
        $responseOwner = Http::asForm()->post('https://api.unisender.com/ru/api/sendEmail', [
            'api_key' => $apiKey,
            'email' => $senderEmail,
            'sender_name' => $senderName,
            'sender_email' => $senderEmail,
            'subject' => 'Новое сообщение "devprofile"',
            'body' => $htmlOwner,
            'list_id' => 1 // Используем ID списка, который был у вас на скриншоте
        ]);

        // 2. Отправка КЛИЕНТУ
        $responseClient = Http::asForm()->post('https://api.unisender.com/ru/api/sendEmail', [
            'api_key' => $apiKey,
            'email' => $validated['email'],
            'sender_name' => $senderName,
            'sender_email' => $senderEmail,
            'subject' => 'Спасибо за обращение',
            'body' => $htmlUser,
            'list_id' => 1
        ]);

        // Возвращаем ответ для отладки
        return response()->json([
            'message' => 'success',
            'debug_owner' => $responseOwner->body(),
            'debug_client' => $responseClient->body()
        ], 200);
    }
}
