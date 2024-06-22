<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('frontend.contact');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        Mail::send('email.contact', $data, function ($message) use ($data) {
            $message->to('xinchao0511@gmail.com')
                    ->subject('Contact Form Submission');
        });

        return back()->with('success', 'Thank you for contacting us!');
    }
}
