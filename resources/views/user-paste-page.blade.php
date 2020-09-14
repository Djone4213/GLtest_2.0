@extends('layouts.app')

@section('title-block')Пасты пользователя@endsection


@section('content')
  @if (isset($pasteData))
    @foreach($pasteData as $pastD)
      <div class="alert alert-info">
        <h4>{{ $pastD->name }}</h4>
        <p><a href="{{ route('paste-one',$pastD->url) }}">{{ route('paste-one',$pastD->url) }}</a></p>
        <p><small>{{ $pastD->caption . ' | ' . $pastD->created_at }}</small></p>
      </div>
    @endforeach
  @else
    <div class="alert alert-danger">
      <p>Пасты не найдены</p>
    </div>
  @endif
@endsection
