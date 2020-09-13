@extends('layouts.app')

@section('title-block')Авторизация@endsection


@section('content')
  <h1>Авторизация</h1>

  <form action="{{ route('user-login') }}" method="post">
  @csrf
  <div class="form-group">
    <label for="name">Логин</label>
    <input type="text" class="form-control" name="name" placeholder="Введите Логин" id="name" value="{{ old('name') }}">
  </div>

  <div class="form-group">
    <label for="password">Пароль</label>
    <input type="password" class="form-control" name="password" placeholder="Введите пароль" id="password">
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-success">Войти</button>
    <a href="{{ route('register') }}">Регистрация</a>
    </div>

  <div class="form-group">
    <a class="btn btn-primary" role="button" href="{{ route('auth.social', 'facebook') }}" title="Facebook">
      <i class="fa fa-2x fa-facebook-square">Войти через FaceBook</i>
    </a>
  </div>
@endsection
