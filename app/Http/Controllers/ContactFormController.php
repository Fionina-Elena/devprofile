<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ContactFormController extends Controller
{
    public function store(ContactFormRequest $request)
    {
        $validated = $request->validated();

        // Прямые значения для Telegram API
        $token = '8819406686:AAHyZDmQ26-2b5Iw7ut2zvgbhDjLoQwsUvQ';
        $chatId = '6194756750';

        Log::info('ContactForm request started', [
            'token_exists' => ! empty($token),
            'token_preview' => substr($token, 0, 10).'...',
            'chatId' => $chatId,
            'validated_data' => $validated,
        ]);

        $text = "Новая заявка с портфолио! \n\n";
        $text .= 'Имя: '.$validated['name']."\n";
        $text .= 'Телефон: '.($validated['phone'] ?? 'Не указан')."\n";
        $text .= 'Email: '.$validated['email']."\n";
        $text .= 'Сообщение: '.$validated['message'];

        $url = "https://api.telegram.org/bot{$token}/sendMessage";

        Log::info('Sending to Telegram', [
            'url' => substr($url, 0, 60).'...',
            'text_preview' => substr($text, 0, 50).'...',
        ]);

        $response = Http::post($url, [
            'chat_id' => $chatId,
            'text' => $text,
        ]);

        if ($response->successful()) {
            Log::info('Message sent successfully', ['chat_id' => $chatId]);

            return response()->json(['message' => 'success'], 200);
        } else {
            Log::error('Telegram API failed', [
                'status' => $response->status(),
                'body' => $response->body(),
                'full_url' => $token ? $url : 'URL cannot be built (missing token)',
            ]);

            return response()->json([
                'message' => 'Ошибка отправки',
                'debug' => $response->body(),
            ], 500);
        }
    }
}
