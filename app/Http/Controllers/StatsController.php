<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Session;

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
        //Anything in this section works.
        return true;
      }
      else if (empty($json->data) && !empty($json->platforms)) {
        //Works when the wrong platform is selected.
        Session::flash('danger', "This username doesn't play on this platform.");
        return false;
      }
      else {
      //Anything else
        Session::flash('danger', "This username isn't connected an Epic Games Account. To connect your account go to the <a href='/help'>Help Page.</a>");
        return false;
      }
    }


    public function getStats($username, $platform) {
      $client = new Client(['http_errors' => false]);
      $res = $client->request('GET', "https://fn.sniddl.com/cache/br/$username/$platform");
      $json = json_decode($res->getBody()->getContents());
      if ($this->verifyresults($json)) {
        return view("stats")->with([
          "getStats" => $json,
          "solo" => $json->data->solo,
          "duo" => $json->data->duo,
          "squad" => $json->data->squad,
        ]);
      }
      else {
        return back();
      }
      // return view($this->verifyResults($json)["view"])
      //        ->with($this->verifyResults($json));
    }

    public function freshStats(Request $request) {
      $client = new Client(['http_errors' => false]);
      $res = $client->request('GET', "https://fn.sniddl.com/fresh/br/$request->username/$request->platform");
      Session::flash('username', $request->username);
      return redirect("/stats/$request->username/$request->platform");
    }
}
