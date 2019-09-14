@extends('layouts.app')
@section('content')
<div id="content">
    <form name="game">
    <div>Il numero fortunato e': <span id="numero">{{ $valore }}</span></div>
    <select name="category" >
    <option value="personaggi">Personaggi</option>
    <option value="comics">Comics</option>
    </select>
    <button onclick="play(event, document.game.category.options[document.game.category.selectedIndex].value, document.getElementById('numero').textContent);">Gioca</button>
    </form>
    <div id="feedback"></div>
</div>
@endsection