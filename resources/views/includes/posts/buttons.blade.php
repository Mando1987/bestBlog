    {{-- post Buttons --}}
    <div class="row " style="margin-top: -15px ;margin-bottom:-12px">
    <div class="col">
    <form action="{{ route('likes.store')}} " class="likeForm"  >
        @csrf
        @php  $class      = "btn-light" @endphp
        @php  $likedInput = "no" @endphp

        @foreach ($post->likes as $like)
            @if($like->user_id == auth()->user()->id)
                @php  $class = "btn-link" @endphp
                @php  $likedInput = "yes" @endphp
                @break
            @endif
        @endforeach
        <div >
            <button type="button" class="btn {{$class}} likeButtonClass">
                <i class="far fa-thumbs-up"></i>
                like <span>@empty(!$post->likes->count()) {{$post->likes->count()}} @endempty</span>
            </button> 
        <input type="hidden" name="isLiked" value="{{$likedInput}}">
        </div>
        

        <input type="hidden" name="post_id" value="{{$post->id}}">
        @method('POST')    
    </form>
    </div>
    <div class="col">
        <button type="button" class="btn btn-light" data-toggle="collapse"
            data-target="#collapseOne{{ $loop->iteration }}" aria-expanded="true"
            aria-controls="collapseOne">
            <i class="far fa-comment-alt"></i> Comments
        </button>
    </div>
    <div class="col">
        <button type="button" class="btn btn-light ">
            <i class="fas fa-share"></i> Share
        </button>
    </div>
</div>
<hr>
{{-- post Buttons --}}