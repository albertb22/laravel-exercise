<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    /**
     * @var array
     */
    protected $appends = [
        'active'
    ];

    /**
     * Get all channel's messages
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function messages()
    {
        return $this->morphMany(Message::class, 'messageable');
    }

    /**
     * @return bool
     */
    public function getActiveAttribute() {
        return false;
    }
}
