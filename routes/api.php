<?php

use App\Http\Controllers\ContactFormController;
use Illuminate\Support\Facades\Route;

Route::post('/contact', [ContactFormController::class, 'store']);
