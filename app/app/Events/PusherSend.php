<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class PusherSend implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $message;
    private string $channel;
    public string $from; // owner, buyer

    public function __construct($message, $channel, $from)
    {
        $this->message = $message;
        $this->channel = $channel;
        $this->from = $from;
        Log::debug('[Pusher] Construct');
    }

    public function broadcastOn(): array
    {
        Log::debug('[Pusher] Broadcast on');
        return [$this->channel];
    }

    public function broadcastAs(): string
    {
        return 'new-message';
    }
}
