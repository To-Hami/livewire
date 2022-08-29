<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $number = 1;
    public function increment(){
        $this->number ++;
    }

    public function decrement(){
        $this->number --;
    }
    public function render()
    {
        return view('livewire.counter',[
            'number' => $this->number
        ]);
    }
}
