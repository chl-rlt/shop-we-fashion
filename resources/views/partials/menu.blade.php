<nav class="navbar navbar-default" >
  <div class="container">
    <div class="navbar-header">
      @if(Route::is('product.*') == false OR ('category.*') == false)
      <a class="navbar-brand" href="/">{{config('app.name')}}</a>
      <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
      <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
      @else
      <a class="navbar-brand" href="#">{{config('app.name')}}</a>
      <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
      <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
      @endif
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        @if(Route::is('product.*') == false)
        <li class="list-nav-front"><a href="/sale">Soldes</a></li>
        @forelse($categories as $id => $name)
        <li class="list-nav-front"><a href="{{url('category', $id)}}">{{$name}}</a></li>
        @empty
        <li>Aucune categorie pour l'instant</li>
        @endforelse
        @else
        <li><a href="{{ route('product.index') }}">Produits</a></li>
        <li><a href="{{ route('category.index') }}">Catégories</a></li>
        <li class="link-home"><a href="/">Boutique <span class="glyphicon glyphicon-heart" aria-hidden="true"></a></span></li>
        @endif
        @if(Route::is('category.*') == true)
        <style>
          .list-nav-front {
            display: none !important;
          }
        </style>
        <li><a href="{{ route('product.index') }}">Produits</a></li>

        <li><a href="{{ route('category.index') }}">Catégories</a></li>

        <li class="link-home"><a href="/">Boutique <span class="glyphicon glyphicon-heart" aria-hidden="true"></a></span></li>
        @endif
      </ul>


      <ul class="nav navbar-nav navbar-right">
        @if(Auth::check())

        <li><a href="{{route('product.index')}}">Dashboard</a></li>
        <li class="log">
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </li>

        @else
        <li class="log"><a href="{{route('login')}}">Login</a></li>
        @endif
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </div>
</nav>