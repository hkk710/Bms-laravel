<!DOCTYPE html>
<html>
    <head>
        @section('title', 'Bms')
        @include('partials._head')
    </head>
    <body>
        <ul class="w3-navbar w3-top w3-orange">
            <li class="w3-right">
              @if (Auth::guest())
                <a href="{{ url('/login') }}">Login</a>
              @elseif (Auth::user())
                <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                {!! Form::open(['method' => 'POST', 'route' => 'logout', 'id' => 'logout-form']) !!}
                {!! Form::close() !!}
              @endif
            </li>
        </ul>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="{{ asset('images/1.jpg') }}" alt="..." style="width: 100%; height: 800px;">
              @if (Auth::user())
                <div class="text-center w3-display-middle"><a href="/membership" class="w3-indigo btn-lg btn">Register</a></div>
              @endif
              <div class="carousel-caption">
              </div>
            </div>
            <div class="item">
              <img src="{{ asset('images/2.jpg') }}" alt="..." style="width: 100%; height: 800px;">
              @if (Auth::user())
                <div class="text-center w3-display-middle"><a href="/membership" class="w3-indigo btn-lg btn">Register</a></div>
              @endif
              <div class="carousel-caption">
              </div>
            </div>
            <div class="item">
              <img src="{{ asset('images/3.jpg') }}" alt="..." style="width: 100%; height: 800px;">
              @if (Auth::user())
                <div class="text-center w3-display-middle"><a href="/membership" class="w3-indigo btn-lg btn">Register</a></div>
              @endif
              <div class="carousel-caption">
              </div>
            </div>
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="fa fa-arrow-left glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="fa fa-arrow-right glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </body>
</html>