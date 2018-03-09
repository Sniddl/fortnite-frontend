@extends('layouts.app')

@section('content')
<form action="/stats" method="post">
  {{ csrf_field() }}
  <div class="container">
    <div class="input-group mb-3">
    <div class="input-group-prepend">
      <input class="no-opacity" id="radio-windows" type="radio" name="platform" value="pc" required>
      <button id="windows" class="btn btn-outline-secondary no-outline" type="button" onclick="checkRadio(this)"><i class="fab fa-windows"></i></button>

      <input class="no-opacity" id="radio-xbox" type="radio" name="platform" value="xb1" required>
      <button id="xbox" class="btn btn-outline-secondary no-outline" type="button" onclick="checkRadio(this)"><i class="fab fa-xbox"></i></button>

      <input class="no-opacity" id="radio-psn" type="radio" name="platform" value="ps4" required>
      <button id="psn" class="btn btn-outline-secondary no-outline" type="button" onclick="checkRadio(this)"><i class="fab fa-playstation"></i></button>
    </div>
    <input type="text" class="form-control" placeholder="Search" aria-label="" name="username" aria-describedby="basic-addon1">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary no-outline" type="submit">Submit</button>
      </div>
    </div>
  </div>

</form>
@endsection
