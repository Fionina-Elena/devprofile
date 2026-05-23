<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactFormOwner;
use App\Mail\ContactFormUser;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function store(ContactFormRequest $request)
    {
        $validated = $request->validated();

        Mail::to('filatowa.l2010@yandex.ru')->send(new ContactFormOwner($validated));
        Mail::to($validated['email'])->send(new ContactFormUser($validated));

        return response()->json([
            'message' => 'success'
        ], 200);
    }
}
