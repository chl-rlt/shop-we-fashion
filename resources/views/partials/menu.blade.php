

<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="/">{{config('app.name')}}</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/sale">Soldes<span class="sr-only">(current)</span></a></li>
        @if(Route::is('product.*') == false)
        @forelse($categories as $id => $name)
        <li><a href="{{url('category', $id)}}">{{$name}}</a></li>
        @empty 
        <li>Aucune catégories pour l'instant</li>
        @endforelse
        @endif
       
                
               
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </div>
</nav>



