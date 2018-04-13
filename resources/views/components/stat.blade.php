@if(isset($data->$key))
<div class="col-md-3 stat-big">
  <div class="body">
    <div class="rank">#234202</div>
    <div class="value">{{ $data->$key }}</div>
    <div class="key">{{ $rename }}</div>
    <div class="donut-wrapper">
      <svg class="donut" height="100%" width="100%" viewBox="0 0 36 38">
        <!-- <circle cx="18" cy="19" r="15.91549430918954" fill="transparent" stroke="black" stroke-width="3" class="donut-shadow"></circle> -->
        <circle cx="18" cy="18" r="15.91549430918954" fill="transparent" stroke-width="3" class="donut-ring"></circle>
        <circle cx="18" cy="18" r="15.91549430918954" fill="transparent" stroke-width="3" stroke-dasharray="25 75" stroke-dashoffset="25" class="donut-segment {{ $mode }}"></circle>
      </svg>
    </div>
    <div class="icon"><i class="{{ $icon }}"></i></div>
  </div>
</div>
@endif
