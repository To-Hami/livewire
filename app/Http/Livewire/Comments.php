<?php

namespace App\Http\Livewire;

use App\Models\Comment;
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

        $createComment = Comment::create([
            'body' => $this->theComment,
            'user_id' => 1
        ]);

       $this->comments->prepend ($createComment);
        $this->theComment = '';

    }

    public  function mount(){

        $comments = Comment::all();

         $this->comments = $comments;
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
