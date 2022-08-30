<div class="align-items-center align-content-center mx-auto my-auto" style=" width: 500px"
     xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="align-items-center align-content-center" style=" position: relative;align-items: center;">
        <div class="card" style="position: absolute;top: 50px">
            <div class="card-header text-center">
                Add Comment
            </div>
            <div class="card-body">

                @if(session()->has('message'))
                    <div class="alert alert-info rounded-3 shadow">
                         {{session('message')}}
                    </div>
                @endif

                <div class=" my-3" >
                    <input type="file" wire:change="$emit('fileChooseen')" id="image">

                </div>
                    <img src="{{$image}}" class="img-thumbnail my-3" style="width: 200px">

                <div class="input-group mb-3 mx-auto" style="width: 600px !important;">
                    <form wire:submit.prevent="addComment"
                          class=" d-flex justify-content-between" style="width: 100% !important;">
                        <input type="text" class="form-control d-flex"
                               placeholder="Enter your comment here"
                               aria-label="Recipient's username"
                               aria-describedby="button-addon2"
                               wire:model="theComment" style="">

                        <button class="btn btn-primary d-flex btn-sm"
                                type="submit"><i class="fa fa-plus"></i> Add Comment
                        </button>
                    </form>
                    @error( 'theComment')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>

                @foreach($comments as $comment)
                    <div class="input-group mb-3 shadow d-flex justify-content-between"
                         style="border: 2px solid #8192a3 ; border-radius: 20px; padding: 10px">


                        <div class="" style="width: 90%">
                            <h5>{{$comment->user->name}}</h5>
                            <span class="my-1 mx-2"> {{$comment->created_at->diffForHumans()}}</span>
                            <hr>
                            <h6>
                                {{$comment['comment']}}
                            </h6>
                            <img src="{{$comment->imagePath}}" class="img-thumbnail" style="width: 100px;">
                        </div>
                        <div>
                            <i class="fa fa-remove text-danger " wire:click="remove({{$comment->id}})"></i>

                        </div>

                    </div>
                @endforeach

                {{$comments->links()}}

            </div>

        </div>
    </div>
</div>
<script>


    window.livewire.on('fileChooseen' , () => {

        let inputFile = document.getElementById('image');

        let file = inputFile.files[0];

        let reader =  new FileReader();

        reader.onloadend = () => {
            window.livewire.emit('fileUpload' , reader.result);
        };

        reader.readAsDataURL(file);
    })
</script>
