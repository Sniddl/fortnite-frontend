@extends('layouts.app')

@section('content')

<div class="container">
<h1>{{ $res->username }}</h1>
<form action="/stats/fresh" method="post">
  {{ csrf_field() }}
  <?php
// @foreach($getStats->platforms as $platform)
//
//     @if ($platform === "pc")
//     <a href="/stats/{{ $getStats->username }}/pc" id="windows" class="btn btn-outline-secondary no-outline"><i class="fab fa-windows"></i></a>
//     @elseif ($platform ==="xb1")
//     <a href="/stats/{{ $getStats->username }}/xb1" id="xbox" class="btn btn-outline-secondary no-outline"><i class="fab fa-xbox"></i></a>
//     @elseif ($platform === "ps4")
//     <a href="/stats/{{ $getStats->username }}/ps4" id="psn" class="btn btn-outline-secondary no-outline"><i class="fab fa-playstation"></i></a>
//     @endif
//
// @endforeach
?>

  <button type="submit" name="username" value="{{$res->username}}" class="btn btn-outline-secondary no-outline" id="refresh"><i class="fas fa-sync-alt"></i> {{$res->last_updated}}</button>
  <input type="hidden" name="platform" value="{{$res->selected_platform}}">
</form>
</div>


<!-- SOLO STATS -->
<div class="container">
  <h1 class="display-4">Solo Stats</h1>
  <div class="row">
    @component("components.stat", ["value"=>$res->stats->solo->wins, "name" => "wins"]) @endcomponent
    @component("components.stat", ["value"=>$res->stats->solo->top10, "name" => "placed in top 10"]) @endcomponent
    @component("components.stat", ["value"=>$res->stats->solo->top25, "name" => "placed in top 25"]) @endcomponent

  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>$res->stats->solo->last_played, "name" => "Last Played"]) @endcomponent
  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>$res->stats->solo->kills_per_match, "name" => "Kills Per Match"]) @endcomponent
    @component("components.stat", ["value"=>$res->stats->solo->kills, "name" => "kills"]) @endcomponent
    @component("components.stat", ["value"=>$res->stats->solo->kills_per_minute, "name" => "Kills Per Minute"]) @endcomponent

  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>$res->stats->solo->win_percent . "%", "name" => "Win Percent"]) @endcomponent
    @component("components.stat", ["value"=>$res->stats->solo->kd, "name" => "Kill Death Ratio"]) @endcomponent
    @component("components.stat", ["value"=>$res->stats->solo->matches, "name" => "Matches Played"]) @endcomponent

  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>$res->stats->solo->average_match, "name" => "Average Match Time"]) @endcomponent
  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>$res->stats->solo->score_per_match, "name" => "Average Score Per Match"]) @endcomponent
    @component("components.stat", ["value"=>$res->stats->solo->score, "name" => "score"]) @endcomponent
    @component("components.stat", ["value"=>$res->stats->solo->score_per_minute, "name" => "Score Per Min"]) @endcomponent
  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>$res->stats->solo->time_played, "name" => "Time Played"]) @endcomponent
  </div>
</div>


<!-- DUO STATS -->
<div class="container">
  <h1 class="display-4">Duo Stats</h1>
  <div class="row">
    @component("components.stat", ["value"=>$res->stats->duo->wins, "name" => "wins"]) @endcomponent
    @component("components.stat", ["value"=>$res->stats->duo->placetop12, "name" => "placed in top 12"]) @endcomponent
    @component("components.stat", ["value"=>$res->stats->duo->top5, "name" => "placed in top 5"]) @endcomponent

  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>$res->stats->duo->last_played, "name" => "Last Played"]) @endcomponent
  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>$res->stats->duo->kills_per_match, "name" => "Kills Per Match"]) @endcomponent
    @component("components.stat", ["value"=>$res->stats->duo->kills, "name" => "kills"]) @endcomponent
    @component("components.stat", ["value"=>$res->stats->duo->kills_per_minute, "name" => "Kills Per Minute"]) @endcomponent

  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>$res->stats->duo->win_percent . "%", "name" => "Win Percent"]) @endcomponent
    @component("components.stat", ["value"=>$res->stats->duo->kd, "name" => "Kill Death Ratio"]) @endcomponent
    @component("components.stat", ["value"=>$res->stats->duo->matches, "name" => "Matches Played"]) @endcomponent

  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>$res->stats->duo->average_match, "name" => "Average Match Time"]) @endcomponent
  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>$res->stats->duo->score_per_match, "name" => "Average Score Per Match"]) @endcomponent
    @component("components.stat", ["value"=>$res->stats->duo->score, "name" => "score"]) @endcomponent
    @component("components.stat", ["value"=>$res->stats->duo->score_per_minute, "name" => "Score Per Min"]) @endcomponent
  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>$res->stats->duo->time_played, "name" => "Time Played"]) @endcomponent
  </div>
</div>



<!-- SQUAD STATS -->
<div class="container">
  <h1 class="display-4">Squad Stats</h1>
  <div class="row">
    @component("components.stat", ["value"=>$res->stats->squad->wins, "name" => "wins"]) @endcomponent
    @component("components.stat", ["value"=>$res->stats->squad->top3, "name" => "placed in top 3"]) @endcomponent
    @component("components.stat", ["value"=>$res->stats->squad->top6, "name" => "placed in top 6"]) @endcomponent

  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>$res->stats->squad->last_played, "name" => "Last Played"]) @endcomponent
  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>$res->stats->squad->kills_per_match, "name" => "Kills Per Match"]) @endcomponent
    @component("components.stat", ["value"=>$res->stats->squad->kills, "name" => "kills"]) @endcomponent
    @component("components.stat", ["value"=>$res->stats->squad->kills_per_minute, "name" => "Kills Per Minute"]) @endcomponent

  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>$res->stats->squad->win_percent . "%", "name" => "Win Percent"]) @endcomponent
    @component("components.stat", ["value"=>$res->stats->squad->kd, "name" => "Kill Death Ratio"]) @endcomponent
    @component("components.stat", ["value"=>$res->stats->squad->matches, "name" => "Matches Played"]) @endcomponent

  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>$res->stats->squad->average_match, "name" => "Average Match Time"]) @endcomponent
  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>$res->stats->squad->score_per_match, "name" => "Average Score Per Match"]) @endcomponent
    @component("components.stat", ["value"=>$res->stats->squad->score, "name" => "score"]) @endcomponent
    @component("components.stat", ["value"=>$res->stats->squad->score_per_minute, "name" => "Score Per Min"]) @endcomponent
  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>$res->stats->squad->time_played, "name" => "Time Played"]) @endcomponent
  </squad
</div>
@endsection
