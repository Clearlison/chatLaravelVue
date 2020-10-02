<?php

namespace App\Http\Controllers\Chat;

use App\Events\Chat\MessageCreated;
use App\Http\Controllers\Controller;
use App\Models\Chat\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat.index');
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $message = $user->messages()->create([
            "body" => $request->body,
            "user_id" => auth()->id()
        ]);

        $message['user'] = $user;

        broadcast(new MessageCreated($message))->toOthers();

        return response()->json($message, 201);

    }

    public function messages(Message $message)
    {
        $messages = $message->with('user')
                            ->orderBy('id', 'asc')
                            ->limit(50)
                            ->latest()
                            ->get();

        

        return response()->json($messages);
    }
}
