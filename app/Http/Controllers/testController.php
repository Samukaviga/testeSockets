<?php

namespace App\Http\Controllers;

use App\Events\NewChatMessageEvent;
use App\Events\privateWebSocketsEvent;
use App\Events\testWebSocketsEvent;
use Illuminate\Http\Request;

class testController extends Controller
{
    //

    public function teste() {
        /*event( new testWebSocketsEvent());
        exit();*/

        testWebSocketsEvent::dispatch();

    }

    public function private() {
        /*event( new testWebSocketsEvent());
        exit();*/

        privateWebSocketsEvent::dispatch();

    }

    public function check() {
        return view('checkingWebsockets');
    }

    public function broadcast(Request $request)
    {
        if (! $request->filled('message')) {
            return response()->json([
                'message' => 'No message to send'
            ], 422);
        }

        //  Sanitize input

        event(new NewChatMessageEvent($request->message, $request->user));

        return response()->json([], 200);
    }


    public function chat()
    {
        return view('viewMessage');
    }

    function viewChat()
    {
        return view('chat');
    }
}
