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

        $token = config('telegram.bot_token');
        $chatId = config('telegram.chat_id');

        $text = "Новая заявка с портфолио! \n\n";
        $text .= 'Имя: ' . $validated['name'] . "\n";
        $text .= 'Телефон: ' . ($validated['phone'] ?? 'Не указан') . "\n";
        $text .= 'Email: ' . $validated['email'] . "\n";
        $text .= 'Сообщение: ' . $validated['message'];

        $response = Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $text,
        ]);

        if ($response->successful()) {
            return response()->json([
                'message' => 'success'
            ], 200);
        } else {
            Log::error('Telegram API error', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return response()->json([
                'message' => 'Ошибка отправки',
            ], 500);
        }
    }
}
