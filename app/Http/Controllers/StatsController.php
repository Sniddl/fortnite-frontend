<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatsController extends Controller
{
     public function search(Request $r) {
       return redirect("/stats/$r->username");

    }

  public function stats($platform, $username) {
    $res = req([
      "method"=> "get",
      "url"=> "https://fn.sniddl.com/stats/$username"
    ]);
    $res->stats = $res->stats->pc;
    $res->selected_platform = $platform;
    return view("stats", [
      "res" => $res
    ]);
  }
}
