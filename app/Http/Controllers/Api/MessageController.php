<?php

namespace App\Http\Controllers\Api;

use App\Events\Messages\MessageCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Messages\SendMessageRequest;
use App\Models\Channel;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Send a message to a channel
     *
     * @param SendMessageRequest $request
     * @param Channel            $channel
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendToChannel(SendMessageRequest $request, Channel $channel)
    {
        $message = new Message;
        $message->content = $request->get('message');
        $message->send_by = auth()->user()->id;

        $channel->messages()->save($message);

        event(new MessageCreated($message));

        return response()->json(['success' => true]);
    }
}
