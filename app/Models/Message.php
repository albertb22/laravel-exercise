<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * Get all of the owning messageable models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function messageable()
    {
        return $this->morphTo();
    }

    /**
     * Get the user who send the message
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sendBy()
    {
        return $this->belongsTo(User::class, 'send_by');
    }
}
