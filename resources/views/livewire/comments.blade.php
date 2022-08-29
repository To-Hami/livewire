<div class="align-items-center align-content-center mx-auto my-auto" style=" width: 500px">
    <div class="align-items-center align-content-center" style=" position: relative;align-items: center;">
        <div class="card" style="position: absolute;top: 50px">
            <div class="card-header text-center">
                Add Comment
            </div>
                <div class="card-body">

                    <div class="input-group mb-3">
                        <form  wire:submit.prevent="addComment">
                            <input type="text" class="form-control"
                                   placeholder="Enter your comment here"
                                   aria-label="Recipient's username"
                                   aria-describedby="button-addon2"
                                   wire:model.lazy="theComment">
                            <button  class="btn btn-outline-secondary" type="submit" >Add Comment  </button>
                        </form>

                    </div>

                    @foreach($comments as $comment)
                        <div class="input-group mb-3 shadow"
                             style="border: 2px solid #8192a3 ; border-radius: 20px; padding: 10px">
                            <h5>{{$comment['creator']}}</h5> <span class="my-1 mx-2"> {{$comment['created_at']}}</span><hr >
                            <h6>
                                {{$comment['body']}}
                            </h6>
                        </div>
                    @endforeach

                </div>

        </div>
    </div>
</div>
