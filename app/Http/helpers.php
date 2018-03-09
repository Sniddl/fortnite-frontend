<?php

function decimal($num) {
  return number_format($num, 2);
}

function percent($num) {
  $num = $num * 100;
  return decimal($num) . "%";
}

function getTime($time) {
  $arr = [];
  if (!empty($time->years)) array_push($arr, "$time->years years");
  if (!empty($time->days)) array_push($arr, "$time->days days");
  if (!empty($time->hours)) array_push($arr, "$time->hours hours");
  if (!empty($time->minutes)) array_push($arr, "$time->minutes minutes");
  if (!empty($time->seconds)) array_push($arr, "$time->seconds seconds");
  return join(" ", $arr);
}
