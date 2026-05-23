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

        // Получаем настройки из переменных окружения
        $token = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');

        // Формируем красивое сообщение
        $text = 'Новая заявка с портфолио! ' . "\n\n"
            . 'Имя: ' . $validated['name'] . "\n"
            . 'Телефон: ' . ($validated['phone'] ?? 'Не указан') . "\n"
            . 'Email: ' . $validated['email'] . "\n"
            . 'Сообщение: ' . $validated['message'];

        $response = Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $text,
            'parse_mode' => 'HTML',
        ]);

        if ($response->successful()) {
            Log::info('Сообщение отправлено в Telegram', ['chat_id' => $chatId]);

            return response()->json(['message' => 'success'], 200);
        } else {
            Log::error('Ошибка Telegram API', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return response()->json([
                'message' => 'Ошибка отправки сообщения',
            ], 500);
        }
    }
}
