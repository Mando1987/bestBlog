{{-- comments : create new comment--}}
<div class="card mb-3 commentsCreate">
    <div class="row no-gutters">
        <div class="col-1">
            <img src="{{ url('images/user.jpg') }}" class="card-img" >
        </div>
        <div class="col-11">
            <form id="commentsCreateForm" action="{{ route('comments.store') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="form-group col-11 commentsCreateInput">
                    <div class="row">
                       <div class="col-11">
                          <textarea class="form-control" name="comment_content" placeholder="Write a comment..." oninput="autoSize(this)" rows="1"
                        ></textarea> 
                       </div>
                         <div class="col-1">
                            
                             <button type="submit" class="btn btn-info"><i class="fas fa-paper-plane" aria-hidden="true"></i></button>
                         </div>
                    </div>
                    
                        
                </div>
            </form>
        </div>
    </div>
</div>
