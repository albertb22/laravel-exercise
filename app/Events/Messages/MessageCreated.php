<?php

namespace App\Events\Messages;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Message
     */
    public $message;

    /**
     * Create a new event instance.
     *
     * @param Message $message
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel($this->getChannelName());
    }

    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'message.created';
    }

    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return $this->message->load([
                'sendBy' => function ($query) {
                    $query->select(['id', 'name']);
                }
            ])->toArray();
    }

    /**
     * @return string
     */
    public function getChannelName()
    {
        if ($this->message->messageable->type == 'users') {
             $channelName = $this->message->messageable->type . '.';
             $sender = $this->message->sendBy->id;
             $receiver = $this->message->messageable_id;

             if ($sender > $receiver) {
                 $channelName .= $receiver . '_' . $sender;
             } else {
                 $channelName .= $sender . '_' . $receiver;
             }

             return $channelName;
        }

        return $this->message->messageable->type . '.' . $this->message->messageable_id;
    }
}
