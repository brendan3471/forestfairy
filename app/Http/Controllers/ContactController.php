<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Handle the contact form submission.
     */
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        try {
            $adminEmail = env('ADMIN_EMAIL', 'hello@forestfairyhoney.co.nz');
            
            Mail::to($adminEmail)->send(new ContactMessageMail(
                $request->name,
                $request->email,
                $request->subject,
                $request->message
            ));

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Failed to send contact message: ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => 'Failed to send message.'], 500);
        }
    }
}
