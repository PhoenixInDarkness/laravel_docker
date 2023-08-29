<?php

namespace App\Http\Controllers;

use App\Events\PusherSend;
use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\Frontend\Ad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $chatsAsBuyer = Chat::where('buyer_id', Auth::id())->get();
        $chatsAsOwner = Chat::where('owner_id', Auth::id())->get();

        return view('chat.index')->with(['buyerChats' => $chatsAsBuyer, 'ownerChats' => $chatsAsOwner]);
    }

    public function show(string $slug)
    {
        $ad = Ad::where('slug', $slug)->first();

        if ($ad->owner_id === Auth::id()) {
            return redirect()->route('home');
        }

        $chat = Chat::where([
            'ad_id' => $ad->id,
            'owner_id' => $ad->owner_id,
            'buyer_id' => Auth::id(),
        ])->first() ??
            Chat::create([
                'ad_id' => $ad->id,
                'owner_id' => $ad->owner_id,
                'buyer_id' => Auth::id(),
                'channel' => $slug . '_' . Auth::id()
            ]);

        $messages = $chat->messages()->limit(20)->get();

        return view('chat.show')->with([
            'ad' => $ad,
            'owner' => User::find($ad->owner_id),
            'buyer' => Auth::user(),
            'role' => 'buyer',
            'chat' => $chat,
            'messages' => $messages
        ]);
    }

    public function send(Request $request)
    {
        $chat = Chat::find($request->chat_id);

        if (is_null($chat) || $request->message === '') {
            return response(status: 404)->json();
        }

        event(new PusherSend(htmlspecialchars($request->message), $chat->channel, $request->from));

        ChatMessage::create([
            'chat_id' => $request->chat_id,
            'sender' => $request->sender_id,
            'message' => htmlspecialchars($request->message)
        ]);

        $chat->updated_at = now();
        $chat->save();

        return response()->json();
    }

    public function list($slug)
    {
        $ad = Ad::where('slug', $slug)->first();

        $chats = Chat::where('ad_id', $ad->id)->orderBy('updated_at', 'DESC')->get();

        return view('chat.list')->with(['ad' => $ad, 'chats' => $chats]);
    }

    public function showForOwner(string $slug, User $user)
    {
        $ad = Ad::where('slug', $slug)->first();
        $chat = Chat::where(['ad_id' => $ad->id, 'buyer_id' => $user->id])->first();
        $messages = $chat->messages()->limit(20)->get();

        return view('chat.show')->with([
            'ad' => $ad,
            'owner' => Auth::user(),
            'buyer' => $user,
            'role' => 'owner',
            'chat' => $chat,
            'messages' => $messages
        ]);
    }

    public function data(Chat $chat)
    {
        $messages = $chat->messages;
        $messages->each(function ($message) {
            $message->sender = $message->sender === Auth::id() ? 'self' : 'external';
            unset($message['id']);
            unset($message['chat_id']);
            unset($message['created_at']);
        });

        return response()->json($messages);
    }
}
