@extends('layouts.app')
@section('content')
@foreach($comics as $comic)
<div class="element-comic" data-marvel-id = '{{ $comic["idMarvel"] }}'>
    <img src="{{ $comic['imgurl'] }}" alt="{{ $comic['name'] }}">
    <p>{{ $comic['name'] }}</p>
</div>
@endforeach
@endsection