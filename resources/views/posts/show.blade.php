@extends('layouts.master')
@section('title')
Post Page
@endsection

@section('content')

<div class="container mt-4">
   {{-- Create new post --}}
    {{-- @include('includes.posts.create') --}}
    
    <div class="row">
      
        @forelse($posts as $post)
             {{-- Post Content with Comments --}}
            <div class="col-md-8 offset-md-2 mb-4">

                <div class="card PostsShow">
                    {{-- post Header --}}
                      @include('includes.posts.header')
                    {{-- post Header --}}
                    <div class="card-body">
                        {{-- post Content --}}
                        <p class="card-text">
                            {{ $post->post_content }}
                        </p>
                        {{-- post Content --}}
                        <hr>
                        {{-- post Buttons --}}
                        <div class="row " style="margin-top: -15px ;margin-bottom:-12px">
                            <div class="col">
                                  <form action="" id="likeForm">
                                    <button type="button" class="btn btn-light">
                                        <i class="far fa-thumbs-up"></i> Like
                                    </button>
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
                                <button type="button" class="btn btn-primary active" aria-pressed="true">
                                    <i class="fas fa-share"></i> Share
                                </button>
                            </div>
                        </div>
                        <hr>
                        {{-- post Buttons --}}
                        {{-- post Comments --}}
                        <div class="mt-3">
                            @include('includes.comments.index')
                        </div>
                        {{-- post Comments --}}
                    </div>
                    
                </div>
            </div>
            {{-- Post Content with Comments --}}
        @empty
            
        
        @endforelse

    </div>
</div>
@endsection
