<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="{{ asset('fonts/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/css/solid.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body>

    @include('includes.navbar')

    <div class="container" id="app">

        @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        
        @hasSection('content')

            @yield('content')

        @else
            <h1>No Content To View</h1>
        @endif
    </div>





  <!-- Modal -->
  <div class="modal fade" id="deleteAction" tabindex="-1" role="dialog" aria-labelledby="deletePostLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deletePostLabel">delete post</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure delete, this item ? 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          <form id="formDeleteAction" action="" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">delete</button>
            @method('DELETE')
          </form>
          
        </div>
      </div>
    </div>
  </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
