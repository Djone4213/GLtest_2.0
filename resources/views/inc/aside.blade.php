

@section('aside')
  <div class="aside">
    <h4>10 последних паст</h4>
    @isset($listPaste)
      @foreach($listPaste as $el)
        <div class="">
          <a href="{{ route('paste-one', $el->url) }}">{{ $el->name }}</a>
          <p>{{ $el->caption . ' | ' . $el->created_at }}</p>
        </div>
      @endforeach
    @endisset

    @if (auth()->check())
      @isset($userListPaste)
      <h4>10 моих паст</h4>
        @foreach($userListPaste as $el)
          <div class="">
            <a href="{{ route('paste-one', $el->url) }}">{{ $el->name }}</a>
            <p>{{ $el->caption . ' | ' . $el->created_at }}</p>
          </div>
        @endforeach
      @endisset
    @endif

  </div>
