<div>
    <div>
        <input type="text" wire:model="user" placeholder="Seu nome" />
    </div>
    <div>
        @if (!empty($messages))
        @foreach($messages as $message)
        <p><strong>{{ $message['user']  }}</strong> {{ $message['message'] }}</p>
        @endforeach
        @else
        <p>Nenhuma mensagem ainda.</p>
        @endif
    </div>
    <div>
        <input type="text" wire:model="messageText" placeholder="Digite sua mensagem" />
        <button wire:click="sendMessage">Enviar</button>
    </div>
</div>