<div class="col-4  align-items-center
align-content-center mx-auto border-2 rounded-3"
     style="border: 2px solid #F7F7F7;
 ">
    <h3>Hello in support ticket</h3>
    <div class="tickets">
        @foreach($tickets as $ticket)

            <div class="{{$active == $ticket->id ? 'bg-info' : ''}}"
                 style="width: 90% ;cursor: pointer" wire:click="$emit('ticketSelected' ,{{$ticket->id}})">
                <h6 style="border: 2px solid #a09fab;
                        border-radius: 4px;
                        padding: 10px;">
                    {{$ticket['questions']}}
                </h6>
            </div>
        @endforeach
    </div>
</div>
