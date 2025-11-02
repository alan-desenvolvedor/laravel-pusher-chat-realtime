<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Message;
use Livewire\Attributes\On;
use App\Events\Messages;

class ManageMessages extends Component
{
    public $content;
    public $messages;
    
    protected $listeners = ['message-received' => 'getmessages'];

    public function mount()
    {
        $this->getmessages();
    }

    public function getmessages()
    {
        $this->messages = message::latest()->get();
    }

    public function save()
    {

        $message = message::create([
            'content' => $this->content,
            'user_id' => auth()->id(),
        ]);

        $this->content = '';

        $this->getmessages();

        Messages::dispatch($message);
    }

    public function render()
    {
        return view('livewire.manage-messages');
    }
}
