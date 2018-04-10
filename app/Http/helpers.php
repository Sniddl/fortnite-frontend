<?php

function decimal($num) {
  return number_format($num, 2);
}

function percent($num) {
  $num = $num * 100;
  return decimal($num) . "%";
}

function req($object) {
  $method = $object["method"];
  $url = $object["url"];
  $client = new \GuzzleHttp\Client(["http_errors"=>false]);
  unset($object["method"]);
  unset($object["url"]);
  return toObject(json_decode($client->request($method, $url, $object)->getBody(), true));
}

function toObject($array) {
    $obj = new stdClass();
    foreach ($array as $key => $val) {
        $obj->$key = is_array($val) ? toObject($val) : $val;
    }
    return $obj;
}
