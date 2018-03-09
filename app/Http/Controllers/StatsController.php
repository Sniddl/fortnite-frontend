<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class StatsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    //     $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function stats(Request $request)
    {
        return redirect("/stats/$request->username/$request->platform");
    }




    public function getStats($username, $platform) {
      $client = new Client;
      $res = $client->request('GET', "https://fn.sniddl.com/cache/br/$username/$platform");
      $statContents = $res->getBody()->getContents();
      $jsonDecode = json_decode($statContents);
      return view('stats')->with([
        "getStats" => $jsonDecode,
        "solo" => $jsonDecode->data->solo,
        "duo" => $jsonDecode->data->duo,
        "squad" => $jsonDecode->data->squad,
      ]);
    }

    public function freshStats(Request $request) {
      $client = new Client;
      $res = $client->request('GET', "https://fn.sniddl.com/fresh/br/$request->username/$request->platform");
      return redirect("/stats/$request->username/$request->platform");

    }
}
