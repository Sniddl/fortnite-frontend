@extends('layouts.app')

@section('content')

<div class="container">
<h1>{{ $res->username }}</h1>

@foreach($res->platforms as $platform)

    @if ($platform === "pc")
    <a href="/stats/{{$platform}}/{{ $res->username }}" id="windows" class="btn btn-outline-secondary no-outline @if($res->selected_platform === $platform) selected @endif"><i class="fab fa-windows"></i></a>
    @elseif ($platform ==="xb1")
    <a href="/stats/{{$platform}}/{{ $res->username }}" id="xbox" class="btn btn-outline-secondary no-outline @if($res->selected_platform === $platform) selected @endif"><i class="fab fa-xbox"></i></a>
    @elseif ($platform === "ps4")
    <a href="/stats/{{$platform}}/{{ $res->username }}" id="psn" class="btn btn-outline-secondary no-outline @if($res->selected_platform === $platform) selected @endif"><i class="fab fa-playstation"></i></a>
    @endif

@endforeach


</div>


<div class="container">
  <div class="row">
    @foreach($res->stats as $modeName => $mode)
      <h1 class="col-md-12">{{ $modeName }}</h1>
      @component("components.stat", ["data" => $mode, "mode" => $modeName, "icon" => "fal fa-trophy-alt", "key"=>"wins", "rename" => "Wins"]) @endcomponent
      @component("components.stat", ["data" => $mode, "mode" => $modeName, "icon" => "fas fa-trophy", "key"=>"top3", "rename" => "Top 3"]) @endcomponent
      @component("components.stat", ["data" => $mode, "mode" => $modeName, "icon" => "fas fa-trophy", "key"=>"top5", "rename" => "Top 5"]) @endcomponent
      @component("components.stat", ["data" => $mode, "mode" => $modeName, "icon" => "fas fa-trophy", "key"=>"top6", "rename" => "Top 6"]) @endcomponent
      @component("components.stat", ["data" => $mode, "mode" => $modeName, "icon" => "fas fa-trophy", "key"=>"top12", "rename" => "Top 12"]) @endcomponent
      @component("components.stat", ["data" => $mode, "mode" => $modeName, "icon" => "fas fa-trophy", "key"=>"top10", "rename" => "Top 10"]) @endcomponent
      @component("components.stat", ["data" => $mode, "mode" => $modeName, "icon" => "fas fa-trophy", "key"=>"top25", "rename" => "Top 25"]) @endcomponent
      @component("components.stat", ["data" => $mode, "mode" => $modeName, "icon" => "fal fa-crosshairs", "key"=>"kills_per_match", "rename" => "Kills/Match"]) @endcomponent
      @component("components.stat", ["data" => $mode, "mode" => $modeName, "icon" => "fal fa-crosshairs", "key"=>"kills", "rename" => "Kills"]) @endcomponent
      <!-- kill per minute will go here when time stats are fixed -->
      @component("components.stat", ["data" => $mode, "mode" => $modeName, "icon" => "fas fa-trophy", "key"=>"win_percent", "rename" => "Win%"]) @endcomponent
      @component("components.stat", ["data" => $mode, "mode" => $modeName, "icon" => "fal fa-crosshairs", "key"=>"kd", "rename" => "K/D"]) @endcomponent
      @component("components.stat", ["data" => $mode, "mode" => $modeName, "icon" => "fal fa-gamepad", "key"=>"matches", "rename" => "Matches"]) @endcomponent
      <!-- average match will go here when time stats are fixed -->
    @endforeach
  </div>
</div>

@endsection
