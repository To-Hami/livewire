<?php

namespace App\Http\Livewire;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comments extends Component
{
    public $comments = [];
    public $theComment ;

    public function addComment(){
       if($this->theComment == '') {
           return;
       }
        array_unshift($this->comments ,[
            'body' =>        $this->theComment ,
            'created_at'=>   \Carbon\Carbon::now()->diffForHumans(),
            'creator'=>     Auth::user()->name,
        ]);
        $this->theComment = '';

    }

    public function render()
    {
        return view('livewire.comments');
    }
}
