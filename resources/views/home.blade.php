@extends('layouts.master')
@section('title')
Post Page
@endsection

@section('content')


<div class="container mt-4">
    @can('edit-settings')
       <h1>HELLOW</h1>
    @endcan
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
                        {{-- post button --}}
                        @include('includes.posts.buttons' , $post)
                        {{-- post button --}}
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
