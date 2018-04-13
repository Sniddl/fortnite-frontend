<form action="/stats" method="post">
  {{ csrf_field() }}
  <div class="container">
    <div class="input-group mb-3  platform-button-wrapper">
    <div class="input-group-prepend">
      <input class="platform-button" id="radio-windows" type="radio" name="platform" value="pc" required>
      <button id="windows" class="btn btn-outline-secondary no-outline" type="button" onclick="checkRadio(this)"><i class="fab fa-windows"></i></button>

      <input class="platform-button" id="radio-xbox" type="radio" name="platform" value="xb1">
      <button id="xbox" class="btn btn-outline-secondary no-outline" type="button" onclick="checkRadio(this)"><i class="fab fa-xbox"></i></button>

      <input class="platform-button" id="radio-psn" type="radio" name="platform" value="ps4">
      <button id="psn" class="btn btn-outline-secondary no-outline" type="button" onclick="checkRadio(this)"><i class="fab fa-playstation"></i></button>
    </div>
    <input type="text" class="form-control" value="{{ Session::get('username') }}" placeholder="Epic Games username..." aria-label="" name="username" aria-describedby="basic-addon1" required>
    <div class="input-group-append">
      <button class="btn btn-outline-secondary no-outline" type="submit">Submit</button>
      </div>
    </div>
    @if (Session::has('danger'))
      <div class="alert alert-danger" role="alert">
        {!! Session::get('danger') !!}
      </div>

    @endif
  </div>

</form>
