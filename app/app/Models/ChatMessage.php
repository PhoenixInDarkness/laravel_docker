<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChatMessage extends Model
{
    protected $guarded = ['id'];

    const UPDATED_AT = null;

    public function chat(): BelongsTo
    {
        return $this->belongsTo(Chat::class);
    }
}
