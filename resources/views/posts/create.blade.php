@extends('layouts.master')
@section('content')

<div class="container mt-5">
    <div class="row mb-5">
        <div class="col-md-8 offset-md-2">
            <div class="card p-y-0">
                <div class="card-body p-x-3 p-y-0">
                    <div class="card mb-3 postsCreate p-y-0">
                        <form id="postsCreateForm" action="{{ route('posts.store') }}" method="POST">
                            <div class="row no-gutters">
                                <div class="col-1">
                                    <img src="{{ asset('storage/images/' . auth()->user()->image) }}" class="card-img">
                                </div>
                                <div class="form-group col-11 postsCreateInput">
                                    <textarea name="post_content" class="form-control"
                                        placeholder="what's in your mind, Mando ?" oninput="autoSize(this)"
                                        rows="4"></textarea>
                                </div>
                            </div>
                                <div class="row bg-light p-2">
                                    <div class="col-9">
                                        <button type="submit" class="btn btn-primary btn-md btn-block">post</button>
                                    </div>
                                    <div class="col-3">
                                        <select class="custom-select my-1 mr-sm-2" id="" name="privacy">
                                            <option value="public" selected>public</option>
                                            <option value="private">private</option>
                                            <option value="freinds">freinds</option>
                                        </select>
                                    </div>
                                </div>
                                @csrf
                                @method('POST')
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>
</div>
</div>

@endsection
