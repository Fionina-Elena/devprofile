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

        $token = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');

        // Собираем текст (просто строки)
        $text = "Новая заявка с портфолио! \n\n";
        $text .= "Имя: " . $validated['name'] . "\n";
        $text .= "Телефон: " . ($validated['phone'] ?? 'Не указан') . "\n";
        $text .= "Email: " . $validated['email'] . "\n";
        $text .= "Сообщение: " . $validated['message'];

        // Отправляем (БЕЗ parse_mode)
        $response = Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $text
            // 'parse_mode' => 'HTML'  
        ]);

        if ($response->successful()) {
            Log::info('Успешная отправка в Telegram');

            return response()->json(['message' => 'success'], 200);
        } else {
            // Если ошибка все еще будет, логируем её
            Log::error('Ошибка Telegram (Plain Text)', [
                'body' => $response->body()
            ]);

            return response()->json([
                'message' => 'Ошибка отправки',
                'debug' => $response->body()
            ], 500);
        }
    }
}
