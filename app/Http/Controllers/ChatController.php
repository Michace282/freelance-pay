<?php

namespace App\Http\Controllers;


use App\Models\Chat;
use App\Models\Deal;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function getMessages($dealId)
    {
        $messages = Chat::where('deal_id', $dealId)->orderBy('created_at')->get();
        return response()->json($messages);
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'deal_id' => 'required|integer',
            'message' => 'required|string',
            'message_type' => 'required|in:system,user',
        ]);

        $chat = new Chat();
        $chat->deal_id = $request->deal_id;
        $chat->sender_id = auth()->id();
        $chat->message = $request->message;
        $chat->message_type = $request->message_type;
        $chat->save();

        return response()->json(['success' => true]);
    }

    public function sendMessageAdmin(Request $request)
    {
        $request->validate([
            'deal_id' => 'required|integer',
            'message' => 'required|string',
            'message_type' => 'required|in:admin',
        ]);

        $chat = new Chat();
        $chat->deal_id = $request->deal_id;
        $chat->sender_id = auth()->id();
        $chat->message = $request->message;
        $chat->message_type = $request->message_type;
        $chat->save();

        return response()->json(['success' => true]);
    }

    public function sendSystemMessage($dealId, $message, $sender_id = 0)
    {
        $chat = new Chat();
        $chat->deal_id = $dealId;
        $chat->sender_id = 1; // Идентификатор администратора системы (или можно использовать другое значение)
        $chat->message = $message;
        $chat->message_type = 'system';
        $chat->save();

        return response()->json(['success' => true]);
    }
}