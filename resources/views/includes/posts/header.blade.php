<div class="card mb-3 PostsShowHeader">

    <div class="row no-gutters">
        <div class="col-1">
            <img src="{{ asset('storage/images/' . $post->user->image) }}" class="card-img" >
        </div>
        <div class="col-9">

        <a href="{{route('posts.show' , $post->user->id)}}" class="card-subtitle card-link">{{$post->user->name}}</a>
            <h6 class="card-subtitle  text-muted">1h</h6>
        </div>
        
        <div class="col-1">
            {{-- controll menu --}}

            @if($post->user_id == auth()->user()->id)
            <nav class="navbar navbar-expand-sm navbar-light sm-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  {{-- <span class="navbar-toggler-icon"></span> --}}
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <i class="fas fa-ellipsis-h"></i>	
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{route('posts.edit' , $post->id)}}">edit</a>

                        <div class="dropdown-divider"></div>
                      <button onclick="deleteAction('{{route('posts.destroy', $post->id) }}')"  class="dropdown-item" >delete</button>
                        
                      </div>
                    </li>
                  </ul>
                </div>
              </nav> 
              @endif 
              {{-- controll menu --}}
        </div>   
  
    </div>
</div>