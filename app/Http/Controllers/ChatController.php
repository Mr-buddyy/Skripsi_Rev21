<?php

namespace App\Http\Controllers;

use App\Events\ChatMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    // public function message(Request $request)
    // {
    //     event(new Message($request->input('username'), $request->input('message')));
    //     return [];
    // }
    public function index()
    {
        return view('chat.index');
    }

    public function send(Request $request)
    {
        $message = $request->input('message');
        // Kirim pesan menggunakan broadcasting Laravel
        broadcast(new Message($message));
        return response()->json(['status' => 'Message sent']);
    }

    public function __invoke(Request $request)
    {
        // Logika untuk mengelola permintaan obrolan disini
    }
    public function sendMessage(Request $request)
    {
        $username = $request->input('username');
        $message = $request->input('message');

        event(new ChatMessage($username, $message));

        return response()->json(['status' => 'Message Sent!']);
    }
}
