<?php

namespace App\Livewire;

use App\Events\MessageSent;
use App\Models\Message;
use Livewire\Component;

class Chat extends Component
{
    public $messages = [];
    public $user;
    public $messageText;

   
    protected $listeners = ['echo:message-channel,.message-event' => 'updateMessage'];
   
    public function mount()
    {
        $this->messages = Message::all()->toArray(); // Carregar últimas 10 mensagens
    }

    public function render()
    {
        return view('livewire.chat');
    }

    public function sendMessage()
    {

        $this->user = auth()->check() ? auth()->user()->name : 'Anônimo';

        // Criar nova mensagem
        $message = Message::create([
            'user' => $this->user,
            'message' => $this->messageText,
        ]);

        // Enviar apenas os dados necessários para o evento
       
        MessageSent::dispatch($this->user, $this->messageText);
        
       // $this->messages = $message->toArray();

        // Limpar o campo de mensagem
        $this->messageText = '';
    }

    public function updateMessage($data)
    {
        // Adicionar a nova mensagem à coleção existente ($messages)
        $this->messages[] = [
            'user' => $data['user'],
            'message' => $data['message'],
        ];
    }
 
}
