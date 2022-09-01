<?php

namespace App\Http\Livewire;

use App\Models\SupportTicket;
use Livewire\Component;

class Tickets extends Component
{

protected  $listeners = ['ticketSelected' ];


//prams =====================================================

public $active ;

public  function ticketSelected($ticket_id){
    $this->active = $ticket_id;

}



    public function render()
    {
        return view('livewire.tickets' ,[
            'tickets' =>SupportTicket::all()
        ]);
    }
}
