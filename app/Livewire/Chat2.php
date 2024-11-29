<?php

namespace App\Livewire;

use App\Models\Message;
use Livewire\Component;

class Chat2 extends Component
{

    public $messageText;
    public $user;
    public $messages;


    public function mount()
    {
        $this->messages = Message::all()->toArray(); 
    }

    public function render()
    {
        return view('livewire.chat2');
    }


    public function sendMessage()
    {
        if (!empty($this->messageText)) {
           
            $this->user = auth()->check() ? auth()->user()->name : 'Anônimo';

            // Criar nova mensagem
            $message = Message::create([
                'user' => $this->user,
                'message' => $this->messageText,
            ]);

            // Enviar apenas os dados necessários para o evento


            // $this->messages = $message->toArray();

            // Limpar o campo de mensagem
            $this->messageText = '';
        }
    }
}
