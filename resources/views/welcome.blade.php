@extends('layouts.app')

@section('content')
<form class="" action="index.html" method="post">
  <div class="container">
    <div class="input-group mb-3">
    <div class="input-group-prepend">
      <input class="no-opacity" id="radio-windows" type="radio" name="platform" value="windows">
      <button id="windows" class="btn btn-outline-secondary no-outline" type="button" onclick="checkRadio(this)"><i class="fab fa-windows"></i></button>

      <input class="no-opacity" id="radio-xbox" type="radio" name="platform" value="xbox">
      <button id="xbox" class="btn btn-outline-secondary no-outline" type="button" onclick="checkRadio(this)"><i class="fab fa-xbox"></i></button>

      <input class="no-opacity" id="radio-psn" type="radio" name="platform" value="psn">
      <button id="psn" class="btn btn-outline-secondary no-outline" type="button" onclick="checkRadio(this)"><i class="fab fa-playstation"></i></button>
    </div>
    <input type="text" class="form-control" placeholder="Search" aria-label="" aria-describedby="basic-addon1">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary no-outline" type="submit">Submit</button>
      </div>
    </div>
  </div>

</form>
@endsection
