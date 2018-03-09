@extends('layouts.app')

@section('content')

<div class="container">
<h1>{{ $getStats->username }}</h1>
<form action="/stats/fresh" method="post">
  {{ csrf_field() }}
@foreach($getStats->platforms as $platform)

    @if ($platform === "pc")
    <a href="/stats/{{ $getStats->username }}/pc" id="windows" class="btn btn-outline-secondary no-outline"><i class="fab fa-windows"></i></a>
    @elseif ($platform ==="xb1")
    <a href="/stats/{{ $getStats->username }}/xb1" id="xbox" class="btn btn-outline-secondary no-outline"><i class="fab fa-xbox"></i></a>
    @elseif ($platform === "ps4")
    <a href="/stats/{{ $getStats->username }}/ps4" id="psn" class="btn btn-outline-secondary no-outline"><i class="fab fa-playstation"></i></a>
    @endif

@endforeach

  <button type="submit" name="username" value="{{$getStats->username}}" class="btn btn-outline-secondary no-outline" id="refresh"><i class="fas fa-sync-alt"></i> {{$getStats->last_update}}</button>
  <input type="hidden" name="platform" value="{{$getStats->current_platform}}">
</form>
</div>


<!-- SOLO STATS -->
<div class="container">
  <h1 class="display-4">Solo Stats</h1>
  <div class="row">
    @component("components.stat", ["value"=>$solo->wins, "name" => "wins"]) @endcomponent
    @component("components.stat", ["value"=>$solo->place_top_10, "name" => "placed in top 10"]) @endcomponent
    @component("components.stat", ["value"=>$solo->place_top_25, "name" => "placed in top 25"]) @endcomponent

  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>$solo->last_played, "name" => "Last Played"]) @endcomponent
  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>decimal($solo->kills_per_match), "name" => "Kills Per Match"]) @endcomponent
    @component("components.stat", ["value"=>$solo->kills, "name" => "kills"]) @endcomponent
    @component("components.stat", ["value"=>decimal($solo->kills_per_min), "name" => "Kills Per Minute"]) @endcomponent

  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>percent($solo->win_percent, 2), "name" => "Win Percent"]) @endcomponent
    @component("components.stat", ["value"=>decimal($solo->kill_death_ratio), "name" => "Kill Death Ratio"]) @endcomponent
    @component("components.stat", ["value"=>($solo->matches_played), "name" => "Matches Played"]) @endcomponent

  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>getTime($solo->avg_match_time), "name" => "Average Match Time"]) @endcomponent
  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>decimal($solo->avg_score_per_match), "name" => "Average Score Per Match"]) @endcomponent
    @component("components.stat", ["value"=>$solo->score, "name" => "score"]) @endcomponent
    @component("components.stat", ["value"=>decimal($solo->score_per_min), "name" => "Score Per Min"]) @endcomponent
  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>getTime($solo->time_played), "name" => "Time Played"]) @endcomponent
  </div>
</div>


<!-- DUO STATS -->
<div class="container">
  <h1 class="display-4">Duo Stats</h1>
  <div class="row">
    @component("components.stat", ["value"=>$duo->wins, "name" => "wins"]) @endcomponent
    @component("components.stat", ["value"=>$duo->place_top_5, "name" => "placed in top 5"]) @endcomponent
    @component("components.stat", ["value"=>$duo->place_top_12, "name" => "placed in top 12"]) @endcomponent

  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>$duo->last_played, "name" => "Last Played"]) @endcomponent
  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>decimal($duo->kills_per_match), "name" => "Kills Per Match"]) @endcomponent
    @component("components.stat", ["value"=>$duo->kills, "name" => "kills"]) @endcomponent
    @component("components.stat", ["value"=>decimal($duo->kills_per_min), "name" => "Kills Per Minute"]) @endcomponent

  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>percent($duo->win_percent, 2), "name" => "Win Percent"]) @endcomponent
    @component("components.stat", ["value"=>decimal($duo->kill_death_ratio), "name" => "Kill Death Ratio"]) @endcomponent
    @component("components.stat", ["value"=>($duo->matches_played), "name" => "Matches Played"]) @endcomponent

  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>getTime($duo->avg_match_time), "name" => "Average Match Time"]) @endcomponent
  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>decimal($duo->avg_score_per_match), "name" => "Average Score Per Match"]) @endcomponent
    @component("components.stat", ["value"=>$duo->score, "name" => "score"]) @endcomponent
    @component("components.stat", ["value"=>decimal($duo->score_per_min), "name" => "Score Per Min"]) @endcomponent
  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>getTime($duo->time_played), "name" => "Time Played"]) @endcomponent
  </div>
</div>



<!-- SQUAD STATS -->
<div class="container">
  <h1 class="display-4">Squad Stats</h1>
  <div class="row">
    @component("components.stat", ["value"=>$squad->wins, "name" => "wins"]) @endcomponent
    @component("components.stat", ["value"=>$squad->place_top_3, "name" => "placed in top 3"]) @endcomponent
    @component("components.stat", ["value"=>$squad->place_top_6, "name" => "placed in top 6"]) @endcomponent

  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>$squad->last_played, "name" => "Last Played"]) @endcomponent
  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>decimal($squad->kills_per_match), "name" => "Kills Per Match"]) @endcomponent
    @component("components.stat", ["value"=>$squad->kills, "name" => "kills"]) @endcomponent
    @component("components.stat", ["value"=>decimal($squad->kills_per_min), "name" => "Kills Per Minute"]) @endcomponent

  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>percent($squad->win_percent, 2), "name" => "Win Percent"]) @endcomponent
    @component("components.stat", ["value"=>decimal($squad->kill_death_ratio), "name" => "Kill Death Ratio"]) @endcomponent
    @component("components.stat", ["value"=>($squad->matches_played), "name" => "Matches Played"]) @endcomponent

  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>getTime($squad->avg_match_time), "name" => "Average Match Time"]) @endcomponent
  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>decimal($squad->avg_score_per_match), "name" => "Average Score Per Match"]) @endcomponent
    @component("components.stat", ["value"=>$squad->score, "name" => "score"]) @endcomponent
    @component("components.stat", ["value"=>decimal($squad->score_per_min), "name" => "Score Per Min"]) @endcomponent
  </div>
  <div class="row mt-3">
    @component("components.stat", ["value"=>getTime($squad->time_played), "name" => "Time Played"]) @endcomponent
  </div>
</div>
@endsection
