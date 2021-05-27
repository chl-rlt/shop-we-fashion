
<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      @if(Route::is('product.*') == false OR ('category.*') == false)
        <a class="navbar-brand" href="/">{{config('app.name')}}</a>
      @else 
      <a class="navbar-brand" href="#">{{config('app.name')}}</a>
      @endif
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
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
            <li><a href="/"><span class="glyphicon glyphicon-heart" aria-hidden="true"></a></span></li>   
        @endif  
        @if(Route::is('category.*') == true)
        <style> .list-nav-front{display:none!important;}</style>
            <li><a href="{{ route('product.index') }}">Produits</a></li>

            <li><a href="{{ route('category.index') }}">Catégories</a></li>
            
            <li><a href="/"><span class="glyphicon glyphicon-heart" aria-hidden="true"></a></span></li>     
        @endif 
        </ul>
       
      
      <ul class="nav navbar-nav navbar-right">
        @if(Auth::check())
        
        <li><a href="{{route('product.index')}}">Dashboard</a></li>
        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
            </form>
        </li>
                
        @else
        <li><a href="{{route('login')}}">Login</a></li>
        @endif
        </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </div>
</nav>



