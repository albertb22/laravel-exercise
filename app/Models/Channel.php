<?php

namespace App\Models;

use App\Message;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    /**
     * Get all channel's messages
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function messages()
    {
        return $this->morphMany(Message::class, 'messageable');
    }
}
