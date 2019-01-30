<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Channel;

class ChannelController extends Controller
{
    /**
     * Display listing of resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Channel::all());
    }

    /**
     * Get all messages for a channel
     *
     * @param Channel $channel
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMessages(Channel $channel)
    {
        $messages = $channel->messages()->with([
            'sendBy' => function ($query) {
                $query->select(['id', 'name']);
            },
        ])->orderBy('created_at')->get();

        return response()->json($messages);
    }
}
