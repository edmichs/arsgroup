<!-- Navigation -->
<nav class="navbar navbar-light bg-light ">
  <div class="container">
    <a class="navbar-brand" href="#"><img src="{{ asset('img/ARS-4-1024x158.png') }}" alt="Logo" width="100px" srcset=""></a>
    <div class="text-right">
    @guest
    <a href="{{ route('login') }}" class="btn btn-light">Se connecter</a>
    @endguest
    @auth
    <a class=" align-right btn btn-light" href="{{ url('/') }}">Acceuil</a>
    <a class="align-right btn btn-light" href="#">Mes devis</a>
    <a class="align-right btn btn-light" href="{{ route('projet_add_path') }}">Mes projets</a>
    <a class="align-right btn btn-light" href="{{ route('logout') }}"  onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
    </form>
    @endauth

    </div>
  </div>

</nav>

<!-- Masthead -->

