@extends('layouts.app')

@section('title-block')paste-view @endsection


@section('content')
  @if (isset($pasteData))
    <h1>{{ $pasteData->name }}</h1>
    @if($pasteData->id_user != 0)
      <p><small><a href="{{ route('user-pastes',$pasteData->user_name) }}">{{ $pasteData->user_name }}</a></small></p>
    @else
        <p><small>Guest</small></p>
    @endif
    @if ((auth()->check()) && (auth()->user()->id == $pasteData->id_user))
      <a href="{{ route('paste-update', $pasteData->url) }}"><button class="btn btn-warning">Редактировать</button></a>
      <a href="{{ route('paste-delete', $pasteData->url) }}"><button class="btn btn-danger">Удалить</button></a>
    @endif
    <div class="alert alert-info">
      <pre><code class="{{ $pasteData->code_name }}">{{ $pasteData->paste}}</code></pre>
      <p><small>{{ $pasteData->created_at}}</small></p>
    </div>
  @else
    <div class="alert alert-danger">
      <p>Паста не найдена</p>
    </div>
  @endif
@endsection

@section('java-content-head')
  <link rel="stylesheet"
    href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.2.0/build/styles/default.min.css">
@endsection

@section('java-content')
  <script src="/js/highlight.pack.js"></script>
  <script>hljs.initHighlightingOnLoad();</script>
@endsection
