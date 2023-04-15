<?php

namespace App\Http\Controllers;

use App\Events\Chat;
use App\Models\Conversation;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Conversation::all();
        return view('chat', compact('messages'));
    }

    public function getMessage()
    {
        $messages = Conversation::all();
        $output = '';
        if ($messages) {

            foreach ($messages as $message) {
                $output .= "<div class='card d-inline-block ps-4 pe-5 mb-2'> <strong>" . $message->username . "</strong><p>" . $message->message . "</p></div><br>";
            }
        }
        return Response($output);
    }

    public function store(Request $request)
    {
        $data = new Conversation;
        $data->message = $request->message;
        $data->username = $request->username;
        $data->save();
        event(new Chat($request->username, $request->message));
        return response()->json(['message' => 'message saved successfully']);
    }
}
