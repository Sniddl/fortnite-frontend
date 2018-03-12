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


    public function verifyResults ($json) {
      if (!empty($json->data)) {
        return [
          "view" => "stats",
          "getStats" => $json,
          "solo" => $json->data->solo,
          "duo" => $json->data->duo,
          "squad" => $json->data->squad
        ];
      }
      else if (empty($json->data) && !empty($json->platforms)) {
        return [
          "view" => "wrongPlatform",
          "getStats" => $json
        ];
      }
      else {
        abort(401);
      }
    }


    public function getStats($username, $platform) {
      $client = new Client(['http_errors' => false]);
      $res = $client->request('GET', "https://fn.sniddl.com/cache/br/$username/$platform");
      $json = json_decode($res->getBody()->getContents());
      return view($this->verifyResults($json)["view"])
             ->with($this->verifyResults($json));
    }

    public function freshStats(Request $request) {
      $client = new Client(['http_errors' => false]);
      $res = $client->request('GET', "https://fn.sniddl.com/fresh/br/$request->username/$request->platform");
      return redirect("/stats/$request->username/$request->platform");
    }
}
