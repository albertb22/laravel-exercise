<?php

namespace App\Http\Controllers\Api;

use App\Events\Messages\MessageCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Messages\SendMessageRequest;
use App\Models\Channel;
use App\Models\Message;
use App\Models\User;
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
        return $this->send($channel, $request->get('message'));
    }

    /**
     * Send a message to a user
     *
     * @param SendMessageRequest $request
     * @param User               $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendToUser(SendMessageRequest $request, User $user)
    {
        return $this->send($user, $request->get('message'));
    }

    /**
     * Send a message
     *
     * @param $model
     * @param $content
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function send($model, $content)
    {
        $message = new Message;
        $message->content = $content;
        $message->send_by = auth()->user()->id;

        $model->messages()->save($message);

        event(new MessageCreated($message));

        return response()->json(['success' => true]);
    }
}
