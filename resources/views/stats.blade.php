@extends('layouts.app')

@section('content')

<div class="container">
<h1>{{ $getStats->username }} Stats</h1>

<form action="/stats" method="post">
  {{ csrf_field() }}
  <input type="hidden" name="username" value="{{$getStats->username}}">
@foreach($getStats->platforms as $platform)

    @if ($platform === "pc")
    <button id="windows" class="btn btn-outline-secondary no-outline" type="submit" name="platform" value="pc"><i class="fab fa-windows"></i></button>
    @elseif ($platform ==="xb1")
    <button id="xbox" class="btn btn-outline-secondary no-outline" type="submit" name="platform" value="xb1"><i class="fab fa-xbox"></i></button>
    @elseif ($platform === "ps4")
    <button id="psn" class="btn btn-outline-secondary no-outline" type="submit" name="platform" value="ps4"><i class="fab fa-playstation"></i></button>
    @endif

@endforeach
</form>

<form action="/stats" method="post">
  <button type="submit" name="username" value="{{$getStats->username}}"></button>
</form>
<h3>Wins</h3>
{{ $squad->wins }}
<h3>Kills</h3>
{{ $squad->kills }}
</div>
@endsection
