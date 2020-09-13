@extends('layouts.app')

@section('title-block')Регистрация@endsection


@section('content')
  <h1>Регистрация</h1>

  <form action="{{ route('user-register') }}" method="post">
  @csrf
  <div class="form-group">
    <label for="name">Логин</label>
    <input type="text" class="form-control" name="name" placeholder="Введите Логин" id="name" value="{{ old('name') }}">
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="email" placeholder="Введите email" id="name" value="{{ old('email') }}">

  </div>

  <div class="form-group">
    <label for="password">Пароль</label>
    <input type="password" class="form-control" name="password" placeholder="Введите пароль" id="password">
  </div>

  <div class="form-group">
    <label for="password_confirmation">Подтверждение пароля</label>
    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Введите повторно пароль">
  </div>

  <button type="submit" class="btn btn-success">Зарегестрироваться</button>
@endsection
