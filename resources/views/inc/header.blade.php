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
        <div class="dropdown open ml-auto">
          <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{auth()->user()->name}}
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ route('user-pastes',auth()->user()->name)}}">Мои пасты</a>
            <a class="dropdown-item" href="{{ route('logout')}}">Выйти</a>
          </div>
        </div>
      @else
        <a class="btn btn-outline-primary  ml-auto" href="{{ route('login') }}">Войти</a>
      @endif
    </nav>
  </div>

</div>
