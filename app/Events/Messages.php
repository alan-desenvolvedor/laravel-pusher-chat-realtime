<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Message;

class Messages implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $message;
    /**
     * Create a new event instance.
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
        \Log::info('Evento Messages disparado', [
            'id' => $message->id,
            'content' => $message->content,
        ]);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        // CANAL PÚBLICO
        return [
            new Channel('chat'),
        ];

        //CANAL PRÍVADO
        // é o código do id, só é permitido para o usuário id 1
        // return [
        //     new PrivateChannel('chat.'. 3),
        // ];
    }
}


// <div>
//     <button wire:click="saveClick">
//         Clique aqui
//     </button>

//     <p class="mt-2">Total de cliques: {{ $curtida }}</p>
// </div>

// @push('scripts')
// <script>
//     document.addEventListener('livewire:load', function () {
//         Echo.channel('like-network-pusher')
//             .listen('LikePusher', (e) => {
//                 // Aqui usamos emit para Livewire atualizar a view
//                 Livewire.emit('likeUpdated', e.curtida);
//             });
//     });
// </script>
// @endpush
