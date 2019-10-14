@extends('layouts.app')
@section('content')
@foreach($chars as $char)
<div class="element-comic" data-id='{{ $char["_id"] }}' data-marvel-id = '{{ $char["idMarvel"] }}'>
    <img src="{{ $char['imgurl'] }}" alt="{{ $char['name'] }}">
    <p>{{ $char['name'] }}</p>
</div>
@endforeach
@endsection