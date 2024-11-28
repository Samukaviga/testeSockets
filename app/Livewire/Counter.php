<?php

namespace App\Livewire;

use App\Events\counterEvent;
use Livewire\Component;

class Counter extends Component
{

    public $counter = 0;

    protected $listeners = ['echo:counter-channel,.counter-event' => 'updateCounter'];

    public function render()
    {
        return view('livewire.counter');
    }

    public function increment()
    {
        $this->counter++; //implementa localmente
        counterEvent::dispatch($this->counter); //dispara o evento com o novo valor
    }

    public function updateCounter($data)
    {
        $this->counter = $data['counter']; // Atualiza o contador com o valor do evento
    }
}
