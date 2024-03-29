<nav class="navbar navbar-expand-lg navbar-dark default-color navbar-custom">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </li>
                @else
                    <li class="nav-item">
                        <a  class="nav-link" href="/transactions" class="dropdown-item">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="{{route('history')}}" class="dropdown-item">History</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="{{route('currency_exchange')}}" class="dropdown-item">Currency Exchange</a>
                    </li>
               
                    <li class="nav-item dropdown">
                        <a  class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="/uploads/avatars/{{ Auth::user()->avatar }}" alt="" style="width: 32px; height: 32px; border-radius:50%; cursor:pointer" class="rounded-circle">
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">   
                            <div class="dropdown-divider"></div>
                            <a href="/users/{{Auth::user()->id}}">Profile</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>