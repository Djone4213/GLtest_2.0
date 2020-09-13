<!-- <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">GLTest</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="{{ route('home') }}">Главная страница</a>

  </nav>
</div> -->


<div class="blog-masthead">
  <div class="container">
    <nav class="nav blog-nav">
      <a class="nav-link active" href="{{ route('home') }}">Главная страница</a>
      @if (auth()->check())
        <a class="nav-link ml-auto" href="{{ route('logout')}}">{{auth()->user()->name}}</a>
      @else
        <a class="nav-link ml-auto" href="{{ route('login')}}">Войти</a>
      @endif
    </nav>
  </div>

</div>
