@extends('layouts.app')

@section('title-block')Редактирование пасты@endsection

@section('content')
  @if (isset($pasteData))
    <form action="{{ route('paste-update', $pasteData->url) }}" method="post">
    @csrf
    <div class="form-group">
      <label for="paste">Паста</label>
      <textarea name="paste" id="paste" class="form-control" rows="8" placeholder="Введите пасту">{{ $pasteData->paste }}</textarea>
    </div>

    <div class="form-group">
      <label for="id_syntax">Синтаксис</label>
      <select name="id_syntax" id="id_syntax" class="form-control">
        @foreach($syntaxes as $synt)
          <option value="{{ $synt->id }}" @if($pasteData->id_syntax == $synt->id) selected @endif>{{ $synt->caption }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="id_expiration">Срок пасты</label>
      <select name="id_expiration" id="id_expiration" class="form-control">
        @foreach($expirations as $expir)
          <option value="{{ $expir->id }}" @if($pasteData->id_expiration == $expir->id) selected @endif>{{ $expir->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="exposure">Доступность Пасты</label>
      <select name="exposure" id="exposure" class="form-control">
        <option value="1" @if($pasteData->exposure == 1) selected @endif>Для всех</option>
        <option value="2" @if($pasteData->exposure == 2) selected @endif>По ссылке</option>
        @if (auth()->check())
          <option value="3" @if($pasteData->exposure == 3) selected @endif>Для Автора</option>
        @endif
      </select>
    </div>

    <div class="form-group">
      <label for="name">Название пасты</label>
      <input type="text" name="name" placeholder="Введите название пасты" id="name" class="form-control" value="{{ $pasteData->name }}">
    </div>

    <button type="submit" class="btn btn-success">Сохранить</button>
  @endif
@endsection
