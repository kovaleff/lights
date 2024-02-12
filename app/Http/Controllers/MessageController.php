<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\MessageType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use mysql_xdevapi\Exception;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::query()->with('messageType')->orderBy('id', 'asc')->simplePaginate(10);
        return view('messages', ['messages' => $messages]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'mess' => 'required|max:255',
        ]);
        try {
            $messageType = MessageType::query()->where('title', $validated["mess"])->first();
            if ($messageType) {
                $mess = Message::create([
                    'message_type_id' => $messageType->id
                ]);
                return response()->json([
                    'result' => 'Created'
                ], 201);
            } else {
                return response()->json([
                    'result' => 'Created failed ('
                ], 501);
            }

        } catch (Exception $e) {
            return response()->json([
                'result' => $e->getMessage()
            ], 501);
        }
    }

}
