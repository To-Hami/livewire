<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Intervention\Image\ImageManagerStatic as Image;


class Comments extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';


    // listeners =======================================================
    protected $listeners = [
        'fileUpload' => 'handelFileUploade',
        'ticketSelected'
    ];


    // prams =======================================================
    //  public $comments = [];
    public $theComment, $image ,$support_ticket = 1 ,$ticketId;

    public function handelFileUploade($imageData)
    {
        $this->image = $imageData;
    }

    //function on click =============================================
    public function addComment()
    {

        //  $this->validate(['theComment'=>'required' ]);

        if ($this->theComment == '') {
            return;
        }

        $image = $this->storeImage();
        $createComment = Comment::create([
            'comment' => $this->theComment,
            'user_id' => 1,
            'image' => $image,
            'support_ticket_id' => $this->support_ticket,
        ]);

        //  $this->comments->prepend ($createComment);
        $this->theComment = '';
        $this->image = '';

        session()->flash('message', 'Your comment created successfully');

    }

    public function storeImage()
    {
        if (!$this->image) {
            return null;
        }
        $img = ImageManagerStatic::make($this->image)->encode('jpg');
        $ImageName = Str::random() . '.jpg';
        Storage::disk('public')->put($ImageName, $img);
        return $ImageName;

    }

    //  function to get data from database =============================
    public function mount()
    {

//        $comments = Comment::latest()->paginate(2);
//
//         $this->comments = $comments;
    }

    //  function validation ===========================================

    //first remove lazy from  wire:click

    public function updated($field)
    {
        $this->validateOnly($field, [
            'theComment' => 'required | max:200 | min:5'
        ]);
    }


    //public function remove  =========================================
    public function remove($commentId)
    {
        $comment = Comment::findOrfail($commentId);
        Storage::disk('public')->delete($comment->image);
        $comment->delete();
//        $this->comments = $this->comments->where('id' , '!=' , $commentId);
//        $this->comments = $this->comments->except($commentId);
        session()->flash('message', 'Your comment deleted successfully ');

    }

    // image ==========================================================

    public function image()
    {

    }

    // function to select ticket comment

    public  function ticketSelected($ticketId){
       $this->ticketId = $ticketId;

    }

    //function render =================================================
    public function render()
    {
        return view('livewire.comments', [
            'comments' => Comment::where('support_ticket_id',$this->ticketId)
                ->latest()->paginate(2)
        ]);
    }
}
