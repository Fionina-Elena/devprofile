<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use Illuminate\Support\Facades\Http;

class ContactFormController extends Controller
{
    public function store(ContactFormRequest $request)
    {
        $validated = $request->validated();

        // Получаем настройки из переменных окружения
        $token = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');

        // Формируем красивое сообщение
        $text = "Новая заявка с портфолио! " . "\n\n"
            . "Имя: " . $validated['name'] . "\n"
            . "Телефон: " . ($validated['phone'] ?? 'Не указан') . "\n"
            . "Email: " . $validated['email'] . "\n"
            . "Сообщение: " . $validated['message'];

        // Отправляем в Телеграм
        Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $text,
            //'parse_mode' => 'HTML' // Чтобы работал жирный шрифт
        ]);

        // Отвечаем фронтенду, что всё ок
        return response()->json([
            'message' => 'success'
        ], 200);
    }
}
