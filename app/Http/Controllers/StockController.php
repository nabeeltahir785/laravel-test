<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockController extends Controller
{
    public function getTokenInformaiton(){
        $data =  $this->sendCurlRequest("AMZN");
        if( !(array)($data->{'Global Quote'})){
            return response()->json(["status"=>false,"message"=>"No Data Found","data"=>[]]);
        }
        return response()->json(["status"=>true, "message"=>"", "data"=>$data->{'Global Quote'}]);
    }

    public function sendCurlRequest($query){
        $url = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=".$query."&apikey=".env('API_KEY');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_HTTPGET, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close ($ch);
        return json_decode($response);
    }
}
