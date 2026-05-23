<?php

use App\Http\Controllers\ContactFormController;
use Illuminate\Support\Facades\Route;

Route::post('/contact', [ContactFormController::class, 'store']);

// Диагностический endpoint для проверки переменных окружения
Route::get('/debug-env', function () {
    return [
        'token_env' => env('TELEGRAM_BOT_TOKEN') ? substr(env('TELEGRAM_BOT_TOKEN'), 0, 10).'...' : 'null',
        'token_server' => isset($_SERVER['TELEGRAM_BOT_TOKEN']) ? substr($_SERVER['TELEGRAM_BOT_TOKEN'], 0, 10).'...' : 'null',
        'token_getenv' => getenv('TELEGRAM_BOT_TOKEN') ? substr(getenv('TELEGRAM_BOT_TOKEN'), 0, 10).'...' : 'null',
        'chatId_env' => env('TELEGRAM_CHAT_ID'),
        'chatId_server' => $_SERVER['TELEGRAM_CHAT_ID'] ?? 'null',
        'chatId_getenv' => getenv('TELEGRAM_CHAT_ID'),
        'log_channel' => env('LOG_CHANNEL'),
        'app_env' => env('APP_ENV'),
        'app_debug' => env('APP_DEBUG'),
        'all_env_keys' => array_keys(array_filter($_ENV, fn ($k) => str_starts_with($k, 'TELEGRAM'), ARRAY_FILTER_USE_KEY)),
    ];
});
