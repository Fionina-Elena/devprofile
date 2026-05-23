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
        $text = "🔔 <b>Новая заявка с портфолио!</b>\n\n"
            . "👤 <b>Имя:</b> " . $validated['name'] . "\n"
            . "📞 <b>Телефон:</b> " . ($validated['phone'] ?? 'Не указан') . "\n"
            . "📧 <b>Email:</b> " . $validated['email'] . "\n"
            . "💬 <b>Сообщение:</b>\n" . $validated['message'];

        // Отправляем в Телеграм
        Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $text,
            'parse_mode' => 'HTML' // Чтобы работал жирный шрифт
        ]);

        // Отвечаем фронтенду, что всё ок
        return response()->json([
            'message' => 'success'
        ], 200);
    }
}
