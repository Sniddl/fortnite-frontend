<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatsController extends Controller
{
     public function search(Request $r) {
       return redirect("/stats/$r->platform/$r->username");

    }

  public function stats($platform, $username) {
    $res = req([
      "method"=> "get",
      "url"=> "https://fn.sniddl.com/stats/$platform/$username"
    ]);
    return view("stats", [
      "res" => $res
    ]);
  }
}
