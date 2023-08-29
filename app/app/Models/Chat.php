<?php

namespace App\Models;

use App\Models\Frontend\Ad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chat extends Model
{
    protected $guarded = ['id'];

    public function messages(): HasMany
    {
        return $this->hasMany(ChatMessage::class);
    }

    public function ad(): BelongsTo
    {
        return $this->belongsTo(Ad::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function buyer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'buyer_id', 'id');
    }

    public function lastMessage(): string
    {
        return $this->messages->last()->created_at->format('D, d M Y, H:i');
    }
}
