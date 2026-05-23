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

        // Данные отправителя (должны совпадать с подтвержденными)
        $senderEmail = 'filatowa.l2010@yandex.ru';
        $senderName = 'Елена Фионина';

        // Подготовка HTML
        $htmlOwner = view('emails.owner', ['data' => $validated])->render();
        $htmlUser = view('emails.user', ['data' => $validated])->render();

        // Используем метод sendEmail согласно документации
        $responseOwner = Http::asForm()->post('https://api.unisender.com/ru/api/sendEmail', [
            'api_key' => $apiKey,
            'email' => $senderEmail,
            'sender_name' => $senderName,
            'sender_email' => $senderEmail,
            'subject' => 'Новое сообщение "devprofile"',
            'body' => $htmlOwner,
            'list_id' => 1, //  список ID
            'format' => 'json',
            'error_checking' => 1 // Рекомендация из документации
        ]);

        // 2. Отправка КЛИЕНТУ
        $responseClient = Http::asForm()->post('https://api.unisender.com/ru/api/sendEmail', [
            'api_key' => $apiKey,
            'email' => $validated['email'],
            'sender_name' => $senderName,
            'sender_email' => $senderEmail,
            'subject' => 'Спасибо за обращение',
            'body' => $htmlUser,
            'list_id' => 1,
            'format' => 'json',
            'error_checking' => 1
        ]);

        // Логируем ответы для отладки
        \Log::info('Unisender Owner: ' . $responseOwner->body());
        \Log::info('Unisender Client: ' . $responseClient->body());

        return response()->json([
            'message' => 'success',
            'debug_owner' => $responseOwner->body(),
            'debug_client' => $responseClient->body()
        ], 200);
    }
}
