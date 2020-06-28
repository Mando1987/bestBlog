

<div class="accordion" class="mt-3" id="accordionExample{{ $loop->iteration }}">
    <div class="card commentsCard">
        <div id="collapseOne{{ $loop->iteration }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample{{ $loop->iteration }}">
            {{-- comments body --}}
            <div class="card-body">
                {{-- Comments Create --}}
                @include('includes.comments.store')
                {{-- Comments Create --}}

                {{-- Comments Show --}}
                @include('includes.comments.show')
                {{-- Comments Show --}}
                
            </div>
        </div>
    </div>
</div>
